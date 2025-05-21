<?php

namespace Slotgen\SlotgenGatesOfOlympus;

use App\Repositories\SeamlessRepository;
use File;
use Slotgen\SlotgenGatesOfOlympus\Models\GatesOfOlympusPlayer;
use Slotgen\SlotgenGatesOfOlympus\Models\SlotgenGatesOfOlympusConfig;


class SlotgenGatesOfOlympus
{
    public static function getIp($request)
    {
        foreach (['HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR'] as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $ip;
                    }
                }
            }
        }

        return $request->ip(); // it will return server ip when no client ip found
    }

    public static function getGame()
    {
        // $api_url = route('web.gatesofolympus.site.launch');
        $gamePrivateFolder = storage_path('app/private/gates_of_olympus');
        $gameFile = $gamePrivateFolder . '/ncashgame.json';
        if (File::exists($gameFile)) {
            $gameContent = File::get($gameFile);
            $gameInfo = (object) json_decode($gameContent, true);
            $gameFolder = $gameInfo->game_folder;
            $gameName = $gameInfo->title;
            $logo_url = url('uploads/games/' . $gameFolder . '/gatesofolympus-logo.png');
        } else {
            $gameFolder = '';
            $gameName = 'Waiting for upload';
            $logo_url = url('uploads/games/gamenotfound.png');
        }
        $resData = (object) [
            // 'launch' => $api_url,
            'launch' => '',
            'title' => $gameName,
            'logo' => $logo_url,
            'name' => 'gatesofolympus',
        ];

        return $resData;
    }

    public static function checkPlayer($player)
    {
        if ($player) {
            $launchData = [
                'uuid' => $player->token,
                'name' => $player->name,
                'balance' => $player->wallet->balance,
                'is_seamless' => false,
            ];
        } else {
            $launchData = [
                'uuid' => '',
                'user_name' => 'guest',
                'balance' => 50000,
                'is_seamless' => true,
            ];
        }

        return $launchData;
    }

    public static function LaunchGameRes($launchGameRes)
    {
        $launchGame = (object) $launchGameRes['data'];
        $sessionId = $launchGame->session_id;
        $language = $launchGame->language;
        $gameFolder = $launchGame->game_folder;
        // $myPublicFolder = url('/uploads/games');
        $myPublicFolder = url('/uploads/games/' . $language);
        $gamePath = $myPublicFolder . '/' . $gameFolder . '/index.html?token=' . $sessionId;

        $resData = [
            'player_name' => 'guest',
            'session_id' => $sessionId,
            'game_folder' => $gameFolder,
            'game_name' => '',
            'gamePath' => $gamePath,
        ];

        return [
            'success' => true,
            'data' => $resData,
        ];
    }

    public static function LaunchGame($launchData)
    {
        $setting = (object) SlotgenGatesOfOlympusConfig::first();
        $USE_SEAMLESS = $launchData['is_seamless'];
        $path = storage_path('app/private/gates_of_olympus');
        if (! File::exists($path . '/ncashgame.json') || ! File::exists($path . '/game_rule.json')) {
            return [
                'success' => false,
                'data' => [],
            ];
        }
        $game_file = file_get_contents($path . '/ncashgame.json');
        $gameData = (object) json_decode($game_file, true);
        $game_rule = file_get_contents($path . '/game_rule.json');
        $gameRule = (object) json_decode($game_rule, true);
        $gameName = 'gates_of_olympus';
        $seamless = new SeamlessRepository;
        $gameFolder = $gameData->game_folder;
        $currTime = \Carbon\Carbon::now()->toDateTimeString();
        if ($USE_SEAMLESS) {
            $userPlayer = (object) $launchData;
            $credit = $launchData['balance'];
        } else {
            $userPlayer = auth()->user();
            $credit = $seamless->myWallet();
        }

        $pay = $gameRule->feature_in[0]['pay'];
        $featureIn = explode(',', $pay);
        $featureOut = $gameRule->feature_out;
        $select = isset($featureOut[3]['data']) ? $featureOut[3]['data'] : null; // debug cant find featureOut null
        $dataType = 'normal';
        SlotgenGatesOfOlympus::spinConfig($path, $dataType);
        if (count($featureOut) > 2) { // debug featureOut null
            for ($i = 0; $i < count($featureOut); $i++) {
                if ($featureIn[1] == $featureOut[$i]['name']) {
                    for ($j = 1; $j < 6; $j++) {
                        if (isset($select['select' . $j . '_free_spin'])) {
                            $multi[] = [
                                'index' => $j,
                                'free_num' => $select['select' . $j . '_free_spin'],
                                'multiply_1' => $select['select' . $j . '_multiply_1'],
                                'multiply_2' => $select['select' . $j . '_multiply_2'],
                                'multiply_3' => $select['select' . $j . '_multiply_3'],
                                'multiply_4' => $select['select' . $j . '_multiply_4'],
                            ];
                        } else {
                            break;
                        }
                    }
                }
            }
        }
        $multiSelect = isset($multi) ? $multi : [];
        if (count($multiSelect) > 0) {
            for ($i = 1; $i < count($multi) + 1; $i++) {
                $dataType = "feature_$i";
                SlotgenGatesOfOlympus::spinConfig($path, $dataType);
            }
        } else {
            $dataType = 'feature';
            SlotgenGatesOfOlympus::spinConfig($path, $dataType);
        }
        $userName = ! empty($player) ? $player : 'guest_01';
        $wallet = ! empty($credit) ? $credit : 0;
        if ($USE_SEAMLESS) {
            $wallet = $credit;
        }
        if ($USE_SEAMLESS) {
            $playerId = isset($userPlayer->name) ? $userPlayer->name : '';
            $userName = isset($userPlayer->name) ? $userPlayer->name : 'guest';
        } else {
            $playerId = isset($userPlayer->id) ? $userPlayer->id : '';
            $userName = isset($userPlayer->name) ? $userPlayer->name : 'guest';
        }
        if ($USE_SEAMLESS) {
            $user = SlotgenGatesOfOlympus::PlayerEntityId($userName);
        } else {
            $user = SlotgenGatesOfOlympus::PlayerEntityId($playerId);
        }

        $game_file = file_get_contents($path . '/bet_setting.json');
        $betSetting = (object) json_decode($game_file, true);
        // $valueCurr = isset($launchData['currency']) ? $launchData['currency'] : '';
        $valueCurr = isset($setting->currency) ? $setting->currency : '';
        $currency = (object) $gameData->currency;
        if ($valueCurr != '') {
            foreach ($betSetting as $value) {
                if ($value['currency']['code'] == $valueCurr) {
                    $currency = (object) $value['currency'];
                }
            }
        }
        
        if (! $user) {
            if ($gameName) {
                $agentId = isset($userPlayer->agent_id) ? $userPlayer->agent_id : -1;
                $homeUrl = isset($userPlayer->home_url) ? $userPlayer->home_url : url('/');
                $baseBet = (float) $gameData->credit_line;
                $betSize = (float) $gameData->bet_size;
                $betLevel = (int) $gameData->bet_level;
                $lineNum = (int) $gameData->line_num;
                $curPrefix = $currency->prefix;
                $curSuffix = $currency->suffix;
                $curThousand = $currency->thousand;
                $curDecimal = $currency->decimal;
                $defBetSize = $currency->betsize ? $currency->betsize : [0.01, 0.03, 0.05];
                $defBetLevel = isset($gameData->default_bet_level) ? $gameData->default_bet_level : [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
                $buyFeature = isset($gameData->buy_feature) ? $gameData->buy_feature : 0;
                $betAmount = $baseBet * $betLevel * $defBetSize[0];
                $ssData = (object) [
                    'base_bet' => $baseBet,
                    'bet_size' => $betSize,
                    'freespin' => 0,
                    'bet_level' => $betLevel,
                    'linenum' => $lineNum,
                    'currency_prefix' => $curPrefix,
                    'currency_suffix' => $curSuffix,
                    'currency_thousand' => $curThousand,
                    'currency_decimal' => $curDecimal,
                    'size_list' => $defBetSize,
                    'level_list' => $defBetLevel,
                    'parent_id' => 0,
                    'multiply_select' => $multiSelect,
                    'free_spin_index' => 0,
                    // ** New multiply control
                    'multiply_continuous' => false,
                    'last_multiply' => 0,
                    'fileName' => '',
                    'lineIndex' => 1,
                    'multi_reel1' => 0,
                    'multi_reel2' => 0,
                    'multi_reel3' => 0,
                    'buy_feature' => $buyFeature,
                    'total_freespin' => 0,
                    'betamount' => $betAmount,
                    'freespin_win' => 0,
                    'total_multi' => 1,
                    'free_mode' => false,
                    'home_url' => $homeUrl,

                ];

                $data = [
                    'credit' => $credit,
                    'client_ip' => '-',
                    'device_info' => '-',
                    'last_login' => $currTime,
                    'player_uuid' => $playerId,
                    'user_name' => $userName,
                    'session_data' => $ssData,
                    'is_seamless' => $USE_SEAMLESS,
                    'nextrun_feature' => 0,
                    'return_feature' => 0,
                    'return_normal' => 0,
                    'agent_id' => $agentId,
                ];
                $playerData = new GatesOfOlympusPlayer;
                $playerData->fill($data);
                $playerData->save();
                $user = GatesOfOlympusPlayer::where('uuid', $playerData->uuid)->first();
                // dd($user);
                if (! $playerData) {
                    $errors[] = 'token cant create';
                }
            } else {
                $errors[] = 'Game is not found';
            }
        }

        $sessionData = (object) $user->session_data;
        $betSize = $sessionData->betamount;
        $betSizeList = $gameData->default_bet_size;
        $language = isset($launchData->language) ? $launchData->language : 'en';
        if (! in_array($betSize, $betSizeList)) {
            $sessionData->betamount = $betSizeList[0];
            $user->session_data = $sessionData;
            $user->save();
        }
        $response = [
            'player_name' => $user->user_name,
            'session_id' => $user->uuid,
            'balance' => $user->credit,
            'game_folder' => $gameFolder,
            'game_name' => $gameName,
            'language' => $language,
        ];

        return [
            'success' => true,
            'data' => $response,
        ];
    }
    public static function spinConfig($path, $type = 'normal')
    {
        $res = false;
        $spinConfigName = $type . '__spin.json';
        $spinConfigFolder = $type . '__spin';
        $folderPath = "$path/$spinConfigFolder/";
        if (file_exists($folderPath)) {
            $privatePath = "$path/$spinConfigName";
            if (file_exists($privatePath)) {
                $spinContent = file_get_contents("$path/$spinConfigName");
                $res = json_decode($spinContent, true);
            } else {
                $gamePath = "$path/ncashgame.json";
                $game_file = file_get_contents($gamePath);
                $gameData = (object) json_decode($game_file, true);
                $minFeatureWin = isset($gameData->min_feature_win) ? (float) $gameData->min_feature_win : 0;
                $res = [];
                $spinFilePath = scandir($folderPath);
                $minWinScan = 0;
                for ($i = 2; $i < count($spinFilePath); $i++) {
                    $fileName = $spinFilePath[$i];
                    if ($fileName != '.DS_Store') {
                        $fileContent = file_get_contents($folderPath . '/' . $fileName);
                        $count = count(preg_split("/[\n]/", $fileContent)) - 1;
                        $nameArr = preg_split('/[_]/', $fileName);
                        $win = (float) $nameArr[2];
                        $res[] = [
                            'win' => $win,
                            'count' => $count,
                            'file' => $fileName,
                        ];
                        $minWinScan = $minWinScan > 0 ? ($minWinScan > $win ? $win : $minWinScan) : $win;
                    }
                }
                $fh = fopen($privatePath, 'w');
                fwrite($fh, json_encode($res));
                fclose($fh);
                $minFeatureWin = $minFeatureWin > 0 ? ($minFeatureWin < $minWinScan ? $minWinScan : $minFeatureWin) : $minWinScan;
                $gameData->min_feature_win = $minFeatureWin;
                $fh = fopen($gamePath, 'w');
                fwrite($fh, json_encode($gameData));
                fclose($fh);
            }
        }

        // dd(123);
        return $res;
    }

    public static function PlayerEntityId($playerId)
    {
        $playerId = GatesOfOlympusPlayer::where('player_uuid', $playerId)->first();

        return $playerId;
    }
}
