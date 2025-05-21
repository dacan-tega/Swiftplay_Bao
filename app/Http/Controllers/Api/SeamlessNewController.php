<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Agent;
use App\Models\Order;
use App\Models\User;
use App\Repositories\SeamlessRepository;
use App\Helpers\Core;
use File;

class SeamlessNewController extends Controller
{
    public function getgames(Request $request)
    {
        // $configPrivate = storage_path('private/config.json');
        // $apiConfig = File::get($configPrivate);
        // $apiInfo = (object) json_decode($apiConfig, true);
        $operatorId = isset($request['OperatorId']) ? $request['OperatorId'] : "";
        $hashRe = isset($request['Hash']) ? $request['Hash'] : "";
        $launchGame = Agent::get()->toarray();
        $agentId = -1;
        $checkOperator = false;
        for ($i = 0; $i < count($launchGame); $i++) {
            if ($launchGame[$i]['operator_id'] == $operatorId) {
                $checkOperator = true;
                $agentId = $i;
                $currency = $launchGame[$i]['currency'];
                $token = $launchGame[$i]['token'];
                $hash = md5("OperatorId=$operatorId$token");
                if ($hashRe == $hash) {
                    $checkOperator = true;
                    break;
                } else {
                    return [
                        'success' => false,
                        'ErrorMessage' => 'Invalid Hash',
                        'Error Code' => 1,
                    ];
                }
            } else {
                return [
                    'success' => false,
                    'ErrorMessage' => 'Invalid OperatorId',
                    'Error Code' => 6,
                ];
            }
        }
        if ($checkOperator) {
            $games = Game::select('name', 'uuid', 'image', 'id')
                ->get()
                ->toarray();
            $resAgent = [];
            foreach ($games as $game) {
                $resAgent[] = [
                    "gameName" => $game['name'],
                    "gameId" => $game['uuid'],
                    "gameTypeID" => "slot",
                    "platform" => "MOBILE,WEB",
                    "technology" => "html5",
                    "typeDescription" => "Slot Game",
                    "demoGameAvailable" => true,
                    "aspectRatio" => "16:9",
                    "technologyID" => "H5",
                    "gameIdNumeric" => $game['id'],
                    "image" => url('/storage/uploads/' . $game['image']),
                ];
            }
            return [
                'success' => true,
                'Games' => $resAgent,
                'Error Code' => 0,
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Agent Not Found!',
                'error_code' => 405,
            ];
        }
    }

    public function check(Request $request)
    {
        // $configPrivate = storage_path('private/config.json');
        // $apiConfig = File::get($configPrivate);
        // $apiInfo = (object) json_decode($apiConfig, true);
        $operatorId = isset($request['OperatorId']) ? $request['OperatorId'] : "";
        $hashRe = isset($request['Hash']) ? $request['Hash'] : "";
        $referenceId = isset($request['ReferenceId']) ? $request['ReferenceId'] : "";
        $order = Order::where(['transaction_id' => $referenceId])->first();
        $launchGame = Agent::get()->toarray();
        $agentId = -1;
        $checkOperator = false;
        for ($i = 0; $i < count($launchGame); $i++) {
            if ($launchGame[$i]['operator_id'] == $operatorId) {
                $checkOperator = true;
                $agentId = $i;
                $currency = $launchGame[$i]['currency'];
                $token = $launchGame[$i]['token'];
                $hash = md5("OperatorId=$operatorId&ReferenceId=$referenceId$token");
                if ($hashRe == $hash) {
                    $checkOperator = true;
                    break;
                } else {
                    return [
                        'success' => false,
                        'ErrorMessage' => 'Invalid Hash',
                        'Error Code' => 1,
                    ];
                }
            } else {
                return [
                    'success' => false,
                    'ErrorMessage' => 'Invalid OperatorId',
                    'Error Code' => 6,
                ];
            }
        }
        if ($checkOperator) {
            if ($order) {
                $gameUuid = $order->game_uuid;
                $games = Game::where("type", $gameUuid)->first();
                $class = $games->provider_service;
                // $nameClass = $class . $games->type . "\Models" . $games->type . "SpinLogs";
                $nameClass = "$class$games->type\Models\\$games->type" . "SpinLogs";
                $hisDetail = $nameClass::where('transaction_id', $referenceId)->select('id', 'uuid', 'betamount', 'balance', 'total_bet', 'win_amount', 'transaction_id', 'multipy', 'player_id', 'created_at', 'parent_id')->first();
                $uuid = $hisDetail->uuid;
                if ($hisDetail) {
                    return [
                        "ErrorCode" => 0,
                        "Bet" => $hisDetail->betamount,
                        "Amount" => $hisDetail->win_amount,
                        "RoundId" => $hisDetail->parent_id,
                        "Status" => "completed",
                        "ReferenceId" => $hisDetail->transaction_id,
                    ];
                    // return [
                    //     'success' => true,
                    //     'url' => $hisDetail,
                    //     "ErrorCode" => 0,
                    // ];
                } else {
                    return [
                        'success' => false,
                        'message' => 'History Not Found!',
                        "Error Code" => 7,
                    ];
                }
            } else {
                return [
                    'success' => false,
                    'message' => 'Transaction Not Found!',
                    "Error Code" => 7,
                ];
            }
        } else {
            return [
                'success' => false,
                'message' => 'Agent Not Found!',
                'error_code' => 405,
            ];
        }
    }

    public function historyAgent(Request $request)
    {
        $id = microtime();
        // $configPrivate = storage_path('private/config.json');
        // $apiConfig = File::get($configPrivate);
        // $apiInfo = (object) json_decode($apiConfig, true);
        $operatorId = isset($request['OperatorId']) ? $request['OperatorId'] : "";
        $launchGame = Agent::get()->toarray();
        $agentId = -2;
        $checkOperator = false;
        for ($i = 0; $i < count($launchGame); $i++) {
            if ($launchGame[$i]['token'] == $operatorId) {
                $checkOperator = true;
                $agentId = $i;
                $currency = $launchGame[$i]['currency'];
                break;
            }
        }
        if ($checkOperator) {
            $from = $request['from'] ? $request['from'] : \Carbon\Carbon::now()->startOfDay()->toDateTimeString();
            $to = $request['to'] ? $request['to'] : \Carbon\Carbon::now()->endOfDay()->toDateTimeString();;
            $user = isset($request['user_name']) ? $request['user_name'] : "";
            $game = isset($request['GameId']) ? $request['GameId'] : "";
            $page = isset($request['page']) ? $request['page'] : 1;
            $userName = $user != "" ? $user . '_' . $agentId : "";
            $histories = Order::where('created_at', '<=', $to)
                ->where('created_at', '>=', $from)
                ->where('agent_id', $agentId);
            // ->select('session_id', 'transaction_id', 'game_uuid','type', 'amount', 'bet_amount','profit','balance','created_at');


            if (!empty($game)) {
                $histories = $histories->where('game_uuid', $game);
            }

            if (!empty($userName)) {
                $histories = $histories->where('session_id', $userName);
            }
            $histories = $histories
                // ->select('session_id as user_id', 'transaction_id', 'game_uuid as game_id','type as result', 'amount as win_amount', 'bet_amount','profit','balance as last_balance','created_at')
                ->orderBy('created_at', 'desc')->paginate(100, ['session_id as user_id', 'transaction_id', 'game_uuid as game_id', 'type as result', 'amount as win_amount', 'bet_amount', 'profit', 'balance as last_balance', 'created_at'], 'page', $page);
            // $result = [];
            // foreach ($histories as $hitory) {
            //     $result[] = [
            //         'user_id' => $hitory['session_id'],
            //         'transaction_id' => $hitory['transaction_id'],
            //         'game_id' => $hitory['game_uuid'],
            //         'result' => $hitory['type'],
            //         'win_amount' => $hitory['amount'],
            //         'bet_amount' => $hitory['bet_amount'],
            //         'profit' => $hitory['profit'],
            //         'last_balance' => $hitory['balance'],
            //         'created' => $hitory['created_at'],
            //     ];
            // }
            return [
                'success' => true,
                'items' => $histories,
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Agent Not Found!',
                'error_code' => 405,
            ];
        }
    }

    public function historyDetail(Request $request)
    {
        // $configPrivate = storage_path('private/config.json');
        // $apiConfig = File::get($configPrivate);
        // $apiInfo = (object) json_decode($apiConfig, true);
        $operatorId = isset($request['OperatorId']) ? $request['OperatorId'] : "";
        $launchGame = Agent::get()->toarray();
        $agentId = -1;
        $checkOperator = false;
        for ($i = 0; $i < count($launchGame); $i++) {
            if ($launchGame[$i]['token'] == $operatorId) {
                $checkOperator = true;
                $agentId = $i;
                $currency = $launchGame[$i]['currency'];
                break;
            }
        }
        if ($checkOperator) {
            $ReferenceId = isset($request['ReferenceId']) ? $request['ReferenceId'] : "";
            $order = Order::where(['transaction_id' => $ReferenceId])->first();
            if ($order) {
                $gameUuid = $order->game_uuid;
                $games = Game::where("type", $gameUuid)->first();
                $class = $games->provider_service;
                // $nameClass = $class . $games->type . "\Models" . $games->type . "SpinLogs";
                $nameClass = "$class$games->type\Models\\$games->type" . "SpinLogs";
                $hisDetail = $nameClass::where('transaction_id', $ReferenceId)->select('id', 'uuid', 'betamount', 'balance', 'total_bet', 'win_amount', 'transaction_id', 'multipy', 'player_id', 'created_at')->first();
                $uuid = $hisDetail->uuid;
                if ($hisDetail) {
                    return [
                        'success' => true,
                        'url' => $hisDetail,
                    ];
                } else {
                    return [
                        'success' => false,
                        'message' => 'History Not Found!',
                        'error_code' => 407,
                    ];
                }
            } else {
                return [
                    'success' => false,
                    'message' => 'Transaction Not Found!',
                    'error_code' => 408,
                ];
            }
        } else {
            return [
                'success' => false,
                'message' => 'Agent Not Found!',
                'error_code' => 405,
            ];
        }
    }

    public function getlaunchurl(Request $request)
    {
        $operatorId = isset($request['OperatorId']) ? $request['OperatorId'] : "";
        $hashRe = isset($request['Hash']) ? $request['Hash'] : "";
        $tokenId = isset($request['token']) ? $request['token'] : "";
        $AgentConfig = Agent::get()->toarray();
        $launchGame = Agent::get()->toarray();
        $agentId = -1;
        $checkOperator = false;
        $currency = "THB";
        $language = isset($request->Language) ? $request->Language : 'en';
        $CurrencyOp = isset($request->Currency) ? $request->Currency : 'en';
        $playerId = isset($request->token) ? $request->token : 'en';
        $gameId = $request['GameId'];
        for ($i = 0; $i < count($launchGame); $i++) {
            if ($launchGame[$i]['operator_id'] == $operatorId) {
                $checkOperator = true;
                $agentId = $i;
                $currency = $launchGame[$i]['currency'];
                $homeUrl = $launchGame[$i]['home_url'];
                $token = $launchGame[$i]['token'];
                $secretKey = $launchGame[$i]['token'];
                $operator = $launchGame[$i]['operator_id'];
                // $hash = md5("Currency=$CurrencyOp&GameId=$gameId&Language=$language&OperatorId=$operatorId$token");
                // $hash = md5("token=$playerId$operator");
                // $hash = md5("token=$playerId");
                // if ($hashRe == $hash) {
                //     $checkOperator = true;
                //     break;
                // } else {
                //     return [
                //         'success' => false,
                //         'ErrorMessage' => 'Invalid Hash',
                //         'Error Code' => 1,
                //     ];
                // }
            } else {
                return [
                    'success' => false,
                    'ErrorMessage' => 'Invalid OperatorId',
                    'Error Code' => 6,
                ];
            }
        }
        $homeUrl = isset($request['home_url']) ? $request['home_url'] : $homeUrl;
        if ($checkOperator) {
            // $gameId = "fortunetiger";
            $games = Game::where('uuid', $gameId)->first();
            if ($games) {
                $class = $games->provider_service;
                $nameClass = $class . $games->type . "\Http\Controllers\Site\GameController";
                $playerClass = "$class$games->type\Models\\$games->type" . "Player";
                $launchClass = "$class$games->type\\" . "Slotgen$games->type";

                $userAgent = $request->user_name;
                $userName = $agentId == '' ? $tokenId : $tokenId . '_' . $operatorId;
                $player = $playerClass::where('player_uuid', $userName)->first();
                // $homeUrl = isset($userPlayer->home_url) ? $userPlayer->home_url : url('/');
                // $hash = md5("OperatorId=$operatorId&PlayerId=$playerId$secretKey");
                $hash = md5("token=$playerId$secretKey");
                if ($player) {
                    $launchData = [
                        'uuid' => $player->uuid,
                        'name' => $player->player_uuid,
                        'balance' => $player->credit,
                        'is_seamless' => true,
                        'agent_id' => $player->agent_id,
                        'currency' => $currency,
                        'language' => $language,
                        'home_url' => $homeUrl,
                    ];
                } else {
                    $core = new Core();
                    $data = [
                        'action' => 'load_wallet',
                        'user_name' => $userAgent,
                        "OperatorId" => $operator,
                        "token" => $playerId,
                        "Hash" => $hash,
                    ];
                    // $configPrivate = storage_path('private/config.json');
                    // $apiConfig = File::get($configPrivate);
                    // $apiInfo = (object) json_decode($apiConfig, true);
                    // $launchGame = $apiInfo->agent;
                    $launchGame = Agent::get()->toarray();
                    $infoAgent = (object) $launchGame[$agentId];
                    $apiAgent = $infoAgent->api;
                    $apiAgentAu = $apiAgent . '/authentication';
                    // $agentcyRes = $core->sendCurl($data, $apiAgentAu);
                    $agentcyRes = (object) $core->sendCurl($data, $apiAgentAu);
                    if ($agentcyRes->ErrorMessage == "Success") {
                        // $agent = (object) $agentcyRes->data;
                        $agent = $agentcyRes;
                        $wallet = $agent->Balance;
                        $currency = $agent->Currency;
                        $launchData = [
                            'uuid' => '',
                            'name' => $userName,
                            'balance' => $wallet,
                            'is_seamless' => true,
                            'agent_id' => $agentId,
                            'currency' => $currency,
                            'language' => $language,
                            'home_url' => $homeUrl,
                        ];
                    } else {
                        return [
                            'success' => false,
                            'message' => 'Invalid Token',
                            'ErrorCode' => 1,
                        ];
                    }
                }

                $gameNameFolder = $games->technology;
                $launchGameRes = SeamlessNewController::LaunchGame($launchData, $playerClass, $launchClass, $gameNameFolder);

                if ($launchGameRes['success']) {
                    $resLaunch = SeamlessNewController::LaunchGameRes($launchGameRes);
                    $resData = [
                        'LaunchURL' => $resLaunch['data']['gamePath'],
                        'success' => true,
                        'Error Code' => 0,
                    ];

                    if ($resData['success']) {
                        return $resData;
                    } else {
                        return [
                            'success' => false,
                            'message' => 'Game Code Not Found!',
                            'error_code' => 408,
                        ];
                    }
                }
            } else {
                return [
                    'success' => false,
                    'message' => 'Game Not Found!',
                    'error_code' => 404,
                ];
            }
        } else {
            return [
                'success' => false,
                'message' => 'Agent Not Found!',
                'error_code' => 405,
            ];
        }
    }

    public static function LaunchGameRes($launchGameRes)
    {
        $launchGame = (object) $launchGameRes['data'];
        $sessionId = $launchGame->session_id;
        $language = isset($launchGame->Language) ? $launchGame->Language : 'en';
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

    public static function LaunchGame($launchData, $playerClass, $launchClass, $gameNameFolder)
    {
        $USE_SEAMLESS = $launchData['is_seamless'];
        $path = storage_path("app/private/$gameNameFolder");
        if (!File::exists($path . '/ncashgame.json') || !File::exists($path . '/game_rule.json')) {
            return [
                'success' => false,
                'data' => [],
            ];
        }
        $game_file = file_get_contents($path . '/ncashgame.json');
        $gameData = (object) json_decode($game_file, true);
        $game_rule = file_get_contents($path . '/game_rule.json');
        $gameRule = (object) json_decode($game_rule, true);
        $gameName = $gameNameFolder;
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
        $launchClass::spinConfig($path, $dataType);
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
                $launchClass::spinConfig($path, $dataType);
            }
        } else {
            $dataType = 'feature';
            $launchClass::spinConfig($path, $dataType);
        }
        $userName = !empty($player) ? $player : 'guest_01';
        $wallet = !empty($credit) ? $credit : 0;
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
            $user = $launchClass::PlayerEntityId($userName);
            // dd($userPlayer);
        } else {
            $user = $launchClass::PlayerEntityId($playerId);
        }

        $game_file = file_get_contents($path . '/bet_setting.json');
        $betSetting = (object) json_decode($game_file, true);
        $valueCurr = isset($launchData['currency']) ? $launchData['currency'] : '';
        $currency = (object) $gameData->currency;
        if ($valueCurr != "") {
            foreach ($betSetting as $value) {
                if ($value['currency']['code'] == $valueCurr) {
                    $currency = (object) $value['currency'];
                }
            }
        }
        // dd($USE_SEAMLESS);
        if (!$user) {
            if ($gameName) {
                if ($gameName == "dice") {
                    $agentId = isset($userPlayer->agent_id) ? $userPlayer->agent_id : -1;
                    $maxBet = isset($userPlayer->max_bet) ? $userPlayer->max_bet : 5000;
                    $homeUrl = isset($userPlayer->home_url) ? $userPlayer->home_url : url('/');
                    $baseBet = isset($gameData->credit_line) ? (float) $gameData->credit_line : 1;
                    $betSize = isset($gameData->bet_size) ? (float) $gameData->bet_size : 1;
                    $betLevel = isset($gameData->bet_level) ? (int) $gameData->bet_level : 1;
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
                        'bet_size' => $defBetSize[0],
                        "is_seamless" => false,
                        "user_name" => "guest6152",
                        "balance" => $credit,
                        "bet_level" => 1,
                        "is_finished" => true,
                        "win_amount" => 0,
                        "bet_size" => 1,
                        "betamount" => $betAmount,
                        "is_win" => true,
                        "total_multi" => 1,

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
                        'agent_id' => $agentId,
                    ];
                    $playerData = new $playerClass();
                    $playerData->fill($data);
                    $playerData->save();
                    $user = $playerClass::where('uuid', $playerData->uuid)->first();
                    // dd($user);
                    if (!$playerData) {
                        $errors[] = 'token cant create';
                    }
                } else {
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
                        'cpl' => $betLevel,
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
                        'home_url' => $homeUrl,

                    ];

                    $deviceInfo = isset($launchData['device_info']) ? $launchData['device_info'] : "";
                    $clientIp = isset($launchData['client_ip']) ? $launchData['client_ip'] : "";
                    $data = [
                        'credit' => $credit,
                        'device_info' => $deviceInfo,
                        'client_ip' => $clientIp,
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
                    $playerData = new $playerClass();
                    $playerData->fill($data);
                    $playerData->save();

                    $user = $playerClass::where('uuid', $playerData->uuid)->first();
                    // dd($user);
                    if (!$playerData) {
                        $errors[] = 'token cant create';
                    }
                }
            } else {
                $errors[] = 'Game is not found';
            }
        }

        $sessionData = (object) $user->session_data;
        $betSize = $sessionData->betamount;
        $betSizeList = $gameData->default_bet_size;
        $language = isset($launchData->Language) ? $launchData->Language : "en";
        if (!in_array($betSize, $betSizeList)) {
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
            'language' => $language
        ];

        return [
            'success' => true,
            'data' => $response,
        ];
    }

    public static function LaunchAllGames(Request $request)
    {
        $games = Game::all();
        $token = $request->input('remember_token');

        // Validate từng biến
        if (empty($token)) {
            return response()->json([
                'status' => false,
                'message' => 'Remember token is required.'
            ]);
        }
        $user = User::where('remember_token', $token)->first();
        $launchGames = [];
        foreach ($games as $game) {
            $class = $game->provider_service;
            $nameClass = $class . $game->type . "\Http\Controllers\Site\GameController";
            $apiUrl = "https://apollo.slotgen.com/api/$game->uuid/v1";
            if (class_exists($nameClass)) {
                $playerClass = "$class$game->type\Models\\$game->type" . "Player";
                $userId = $user->id;
                $player = $playerClass::where('player_uuid', $userId)->first();
                if ($player) {
                    $launchGames[] = [
                        'game_name' => $game->name,
                        'token' => $player->uuid,
                        // 'api_url' => $apiUrl,
                    ];
                } else {
                    $nameClass = $class . $game->type . "\Http\Controllers\Site\GameController";
                    $gamePathJson = $nameClass::launchGameApi($user);
                    $res = (object) $gamePathJson['data'];
                    $launchGames[] = [
                        'game_name' => $game->name,
                        'token' => $res->session_id,
                        // 'api_url' => $apiUrl,
                    ];
                }
            } else {
                echo "Class not found: " . $nameClass . "\n";
            }
        }
        return response()->json([
            'success' => true,
            'launch_games' => $launchGames,
        ]);
    }
}
