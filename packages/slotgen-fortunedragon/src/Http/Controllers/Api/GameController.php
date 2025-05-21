<?php

namespace Slotgen\SlotgenFortuneDragon\Http\Controllers\Api;

use App\Helpers\Core;
use App\Models\Agent;
use App\Models\ConfigAgent;
use App\Models\Game;
use App\Models\User;
use App\Repositories\SeamlessRepository;
use File;
use Illuminate\Http\Request;
use Slotgen\SlotgenFortuneDragon\Helpers\Common;
use Slotgen\SlotgenFortuneDragon\Http\Controllers\AppBaseController;
use Slotgen\SlotgenFortuneDragon\Models\FortuneDragonPlayer;
use Slotgen\SlotgenFortuneDragon\Models\FortuneDragonSpinLogs;
use Slotgen\SlotgenFortuneDragon\Models\SlotgenFortuneDragonConfig;
use Slotgen\SlotgenFortuneDragon\SlotgenFortuneDragon;
use Illuminate\Support\Facades\Log;

class GameController extends AppBaseController
{
    public static function launchGameApi()
    {
        $AppBaseController = new AppBaseController();
        $gameFile = null;
        $gamePrivateFolder = storage_path('app/private/fortune_dragon');
        if (!File::exists($gamePrivateFolder)) {
            return $AppBaseController->sendError('error', 'Game Not Found');
        }
        $player = auth()->user();
        $playerUsername = isset($player->user_name) ? $player->user_name : 'Guest Player';
        $launchData = SlotgenFortuneDragon::checkPlayer($player);
        $launchGameRes = SlotgenFortuneDragon::LaunchGame($launchData);
        if ($launchGameRes['success']) {
            $resData = SlotgenFortuneDragon::LaunchGameRes($launchGameRes);
            if ($resData['success']) {
                return $AppBaseController->sendResponse($resData['data'], 'Launch game success');
            } else {
                return $AppBaseController->sendError('error', 'Can Not Launch Game');
            }
        } else {
            return $AppBaseController->sendError('error', 'Invalid Launch Game');
        }
    }

    public function launchGame(Request $request)
    {
        $req = (object) $request->all();
        $checkLaunchGame = false;
        $token = isset($req->token) ? $req->token : "";
        $language = isset($req->language) ? $req->language : "en";
        $configPrivate = storage_path('private/config.json');
        $apiConfig = File::get($configPrivate);
        $apiInfo = (object) json_decode($apiConfig, true);
        $launchGame = $apiInfo->agent;
        $agentId = "";
        for ($i = 0; $i < count($launchGame); $i++) {
            if ($launchGame[$i]['token'] == $token) {
                $checkLaunchGame = true;
                $agentId = $i;
                $currency = $launchGame[$i]['currency'];
            }
        }

        $userName = $agentId == "" ? $req->user_name : $req->user_name . '_' . $agentId;
        if ($checkLaunchGame) {
            $player = FortuneDragonPlayer::where('player_uuid', $userName)->first();
            if ($player) {
                $launchData = [
                    'uuid' => $player->uuid,
                    'name' => $player->player_uuid,
                    'balance' => $player->credit,
                    'is_seamless' => true,
                    'agent_id' => $player->agent_id,
                    'currency' => $currency,
                    'language' => $language,
                ];
            } else {
                $launchData = [
                    'uuid' => '',
                    'name' => $userName,
                    'balance' => 0,
                    'is_seamless' => true,
                    'agent_id' => $agentId,
                    'currency' => $currency,
                    'language' => $language,
                ];
            }
            // $myPublicFolder = url('/uploads/games/' . $language);
            // $gamePath = [];
            $launchGameRes = SlotgenFortuneDragon::LaunchGame($launchData);
            if ($launchGameRes['success']) {
                // $launchGame = (object) $launchGameRes['data'];
                // $sessionId = $launchGame->session_id;
                // $gameFolder = $launchGame->game_folder;
                // $gamePath = $myPublicFolder . '/' . $language . '/' . $gameFolder . '/index.html?token=' . $sessionId;
                $resLaunch = SlotgenFortuneDragon::LaunchGameRes($launchGameRes);
                $resData = [
                    'url' => $resLaunch['data']['gamePath'],
                    'success' => true,
                ];

                // $resData = [
                //     'url' => $gamePath,
                // ];
                // return $gamePath;
                if ($resData['success']) {
                    return $this->sendResponse($resData, 'Launch game success');
                } else {
                    return $this->sendError('error', 'Can Not Launch Game');
                }
                // return redirect()->to($gamePath);
            } else {
                return $this->sendError('Error', 404);
                // return $this->sendError($launchGameRes['message']);
            }
        } else {
            return $this->sendError('Error', 406);
            // return $this->sendError($launchGameRes['message']);
        }
    }

    public function history(Request $request)
    {
        $gamePrivateFolder = storage_path('app/private/fortune_dragon');
        $game_rule = File::get($gamePrivateFolder . '/ncashgame.json');
        $gameInfo = (object) json_decode($game_rule, true);
        $gameName = $gameInfo->game_folder;
        $api_url = route('api.fortunedragon.v1.root');
        $request = $request->all();
        $token = $request['token'];

        return view('slotgen-fortunedragon::api.history', compact('token', 'api_url', 'gameName'));
    }

    public function GameAction(Request $request)
    {
        $adjustRatio = (object) SlotgenFortuneDragonConfig::first();
        //###############
        $SIGNUP_BONUS = $adjustRatio->sign_bonus; //Total bet of new player, it make player easy win at first time.
        $SIGN_FEATURE_CREDIT = $adjustRatio->sign_feature_credit; //When total bet reach this value he can access freespin, use 0 to disable
        $SIGN_FEATURE_SPIN = $adjustRatio->sign_feature_spin; //When total number of spin reach this value he can access freespin, use 0 to disable
        $USE_RTP = $adjustRatio->use_rtp;
        $SYSTEM_RTP = $USE_RTP ? $adjustRatio->system_rtp : 0; // Percentage of credit return to player (normal spin & free spin) (USE_RTP = true) (%)
        $SHARE_FEATURE = $adjustRatio->feature_winvalue; // Percentage of credit return to player when have free spin (USE_RTP = true) (%)
        // ####### RATIO CONFIG ###################
        $ACCESS_FEATURE_RATIO = $adjustRatio->feature_ratio; //Percentage of access feature chance (%)
        $EASY_WIN_RATIO = $adjustRatio->win_ratio; // WIN/LOSS ratio (%)
        $MAX_BET = $adjustRatio->max_bet;
        $BET_SIZE = $adjustRatio->bet_size;
        $sizeList = explode(",", $BET_SIZE);
        $baseBet = $adjustRatio->base_bet;
        $BASE_LEVEL = $adjustRatio->bet_level;
        $betLevel = explode(",", $BASE_LEVEL);
        // ####### ####### ###################

        $USE_SEAMLESS = false;
        $success = false;
        $p = (object) $request->all();
        // $path = __DIR__ . "/../../../../resources/private";
        $path = storage_path('app/private/fortune_dragon');
        // $gameName = isset($p->game) ? $p->game : null;
        $gameName = 'Fortune Dragon';
        $getHeader = $request->header();
        $token = isset($getHeader['X-Ncash-Token']) ? $getHeader['X-Ncash-Token'] : (isset($getHeader['X-Ncash-token']) ? $getHeader['X-Ncash-token'] : (isset($getHeader['x-ncash-token']) ? $getHeader['x-ncash-token'] : 'wrong-key'));
        $game_file = file_get_contents($path . '/ncashgame.json');
        $gameData = (object) json_decode($game_file, true);
        $game_rule = file_get_contents($path . '/game_rule.json');
        $gameRule = (object) json_decode($game_rule, true);
        $gameRuleIcon = json_decode($game_rule, true);
        $seamless = new SeamlessRepository;
        $gameFolder = $gameData->game_folder;
        $currTime = \Carbon\Carbon::now()->toDateTimeString();
        $currDate = \Carbon\Carbon::now();
        $sessionPlayer = FortuneDragonPlayer::where('uuid', $token)->first();
        $page = isset($p->page) ? $p->page : null;
        $act = isset($p->action) ? $p->action : null;
        $time = isset($p->time) ? $p->time : null;
        // $inputDate = \Carbon\Carbon::parse($time);

        // $inputDate = date('Y-m-d h:i', strtotime($time));
        // $diffNum = $currDate->diffInMinutes($inputDate);

        // var_dump($inputDate);
        // var_dump($currDate->toDateTimeString());
        // var_dump(date('ymdhi', strtotime($a1)));
        // var_dump($inputDate->format('ymdhi'));

        // var_dump($diffNum);

        $from = isset($p->from) ? date('Y-m-d 00:00:00', strtotime($p->from)) : date('Y-m-d 00:00:00', strtotime($currTime));
        $to = isset($p->to) ? date('Y-m-d 23:59:59', strtotime($p->to)) : date('Y-m-d 23:59:59', strtotime($currTime));
        $lang = isset($p->lang) ? $p->lang : 'en';
        // $lang = "pt";
        $langInfo = (object) Common::loadLanguage($lang);
        $errorMess = (object) $langInfo->error_message;
        $history = (object) $langInfo->history;
        $historyTitle = $history;
        // var_dump($history->normal_spin);
        if ($sessionPlayer) {
            $USE_SEAMLESS = $sessionPlayer->is_seamless;
            $checkAgent = $sessionPlayer->agent_id;
            $USE_SEAMLESS = $checkAgent != -1 ? $USE_SEAMLESS : false;
            if ($act === 'session' || $act === 'spin' || $act === 'load_session' || $act === 'buy') {
                if ($USE_SEAMLESS) {
                    $userNameAgent = $sessionPlayer->player_uuid;
                    $numberAgent = $sessionPlayer->agent_id;
                    $apiLaunch = Agent::get()->toarray();
                    $infoAgent = (object) $apiLaunch[$numberAgent];
                    $apiAgent = $infoAgent->api;
                    $core = new Core;
                    $userNameAgentArr = explode('_', $userNameAgent);
                    $userNameAgentArrNew = array_slice($userNameAgentArr, 0, count($userNameAgentArr) - 1);
                    $userNameAgentNew = implode('_', $userNameAgentArrNew);
                    $userName = rtrim($userNameAgent, '_' . $numberAgent);
                    $operatorId = $infoAgent->operator_id;
                    $secretKey = $infoAgent->token;
                    $playerUuid = $sessionPlayer->uuid;
                    $apiGetBalance = $apiAgent . '/balance';
                    $hash = md5("OperatorId=$operatorId&PlayerId=$userNameAgentNew$secretKey");
                    $data = [
                        // 'action' => 'load_wallet',
                        // 'user_name' => $userNameAgentNew,
                        'OperatorId' => $operatorId,
                        'PlayerId' => $userNameAgentNew,
                        'Hash' => $hash,
                    ];
                    $agentcyRes = $core->sendCurl($data, $apiGetBalance);
                    // $agent = (object) $agentcyRes->data;
                    $agent = (object) $agentcyRes;
                }
                $sessionPlayer = (object) $sessionPlayer;
                $agentId = '-1';
                if ($USE_SEAMLESS) {
                    $wallet = $agent->Balance;
                    $userPlayer = FortuneDragonPlayer::where('player_uuid', $userNameAgent)->first();
                    $agentId = $userPlayer->agent_id;
                } else {
                    $playerUuid = $sessionPlayer->player_uuid;
                    $userPlayer = User::where('id', $playerUuid)->first();
                    // $userPlayer = $userPlayer != null ? $userPlayer : $sessionPlayer;
                    if ($userPlayer) {
                        $wallet = $userPlayer->wallet->balance;
                    } else {
                        $wallet = $sessionPlayer->credit;
                    }
                }
                $sessionPlayer->credit = $wallet;
                $sessionPlayer->save();
                $betLevelConfigAgent = "";
                $baseBetConfigAgent = "";
                $sizeListConfigAgent = "";

                if ($agentId != -1) {
                    $gameName = "Fortune Dragon";
                    $agentIdNew = $agentId + 1;
                    $AgentConfig = Agent::where('id', $agentIdNew)->first();
                    $MAX_BET = isset($AgentConfig->max_bet) ? $AgentConfig->max_bet : $MAX_BET;
                    $Agent = ConfigAgent::where('game_name', $gameName)->where('agent_id', $agentIdNew)->first();
                    // $MAX_BET = $ssData->max_bet == 0 ? $MAX_BET : $ssData->max_bet;
                    $MAX_BET = isset($Agent->max_bet) ? $Agent->max_bet : $MAX_BET;
                    $MIN_BET = isset($Agent->min_bet) ? $Agent->min_bet : 0;
                    $betLevelConfigAgent = isset($Agent->bet_level) ? $Agent->bet_level : "";
                    $betLevelConfigAgent = $betLevelConfigAgent != "" ? explode(",", $betLevelConfigAgent) : "";
                    $baseBetConfigAgent = isset($Agent->base_bet) ? $Agent->base_bet : "";
                    // $baseBetConfigAgent = explode(",", $baseBetConfigAgent);
                    $sizeListConfigAgent = isset($Agent->bet_size) ? $Agent->bet_size : "";
                    $sizeListConfigAgent = $sizeListConfigAgent != "" ? explode(",", $sizeListConfigAgent) : "";
                }
            }
            if ($act === 'load_session') {
                $ssData = null;
                if ($sessionPlayer) {

                    $ssData = (object) $sessionPlayer->session_data;
                    $inputTime = null;

                    try {
                        $inputTime = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $time, 'UTC');
                    } catch (\Exception $e) {
                        return $this->sendError('Invalid Date Input');
                    }
                    $currTime1 = \Carbon\Carbon::now();
                    $currTime = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $currTime1, 'UTC');
                    $secDiff = $currTime->diffInRealSeconds($inputTime);
                    $ssData->time_diff = $secDiff;
                    $ssData->sure_win = false;
                    $ssData->free_mode = isset($ssData->free_mode) ? $ssData->free_mode : false;

                    $syncTime = $currTime->addSeconds($ssData->time_diff);
                    $syncStr = $syncTime->format('YmdHis');

                    $sessionData = json_encode($ssData);
                    $sessionPlayer->session_data = $ssData;
                    $sessionPlayer->save();
                    $userName = $sessionPlayer->user_name;
                    $freeTotal = isset($ssData->freeTotal) == 'undefined' ? $ssData->freeTotal : 0;
                    $freeAmount = isset($ssData->freespin_amount) == 'undefined' ? $ssData->freespin_amount : 0;
                    $freeMultil = isset($ssData->freespin_multi) == 'undefined' ? $ssData->freespin_multi : 0;
                    $freeMode = isset($ssData->free_mode) == 'undefined' ? $ssData->free_mode : 0;
                    $multiList = isset($ssData->multiple_list) == 'undefined' ? $ssData->multiple_list : 0;
                    $buyFeature = isset($gameData->buy_feature) ? $gameData->buy_feature : 0;
                    $buyMax = isset($gameData->buy_max) ? $gameData->buy_max : 0;
                    $iconData = isset($ssData->icon_data) == 'undefined' ? $ssData->icon_data : 0;
                    $activeLine = isset($ssData->active_lines) == 'undefined' ? $ssData->active_lines : 0;
                    $dropLine = isset($ssData->drop_line) == 'undefined' ? $ssData->drop_line : 0;
                    $betSizeList = isset($ssData->default_bet_size) == 'undefined' ? $ssData->default_bet_size : 0;
                    $ssData->size_list = $sizeListConfigAgent != "" ? $sizeListConfigAgent : $sizeList;
                    $ssData->level_list = $betLevelConfigAgent != "" ? $betLevelConfigAgent : $betLevel;
                    $ssData->max_buy_feature = isset($gameData->max_buy_feature) ? $gameData->max_buy_feature : 7600;
                    $ssData->base_bet = $baseBetConfigAgent != "" ? $baseBetConfigAgent : $baseBet;
                    $ssData->linenum = $baseBetConfigAgent != "" ? $baseBetConfigAgent : $baseBet;
                    $sessionData = json_encode($ssData);
                    $sessionPlayer->session_data = $ssData;
                    $sessionPlayer->save();
                    $ssData->currency_suffix = $ssData->currency_suffix == null ? "" : $ssData->currency_suffix;
                    $ssData->bet_size = in_array($ssData->bet_size, $ssData->size_list) ? $ssData->bet_size : $ssData->size_list[0];
                    $ssData->bet_level = in_array($ssData->bet_size, $ssData->level_list) ? $ssData->bet_level : $ssData->level_list[0];
                    $ssData->currency_suffix = $ssData->currency_suffix == null ? "" : $ssData->currency_suffix;
                    $translate = $langInfo;
                    $resData = (object) [
                        'user_name' => $userName,
                        'credit' => (float) number_format($wallet, 2, '.', ''),
                        'num_line' => $ssData->linenum,
                        'line_num' => $ssData->linenum,
                        'bet_amount' => $ssData->bet_size,
                        'free_num' => $ssData->freespin,
                        'free_total' => $freeTotal,
                        'free_amount' => $freeAmount,
                        'free_multi' => $freeMultil,
                        'freespin_mode' => $freeMode,
                        'free_mode' => $freeMode,
                        'multiple_list' => $multiList,
                        'credit_line' => $ssData->bet_level,
                        'buy_feature' => $buyFeature,
                        'session_data' => $ssData,
                        'buy_max' => $buyMax,
                        'feature' => (object) [],
                        'total_way' => 0,
                        'multipy' => 0,
                        'icon_data' => $iconData,
                        'active_lines' => $activeLine,
                        'drop_line' => $dropLine,
                        'currency_prefix' => $ssData->currency_prefix,
                        'currency_suffix' => $ssData->currency_suffix,
                        'currency_thousand' => $ssData->currency_thousand,
                        'currency_decimal' => $ssData->currency_decimal,
                        'bet_size_list' => $ssData->size_list,
                        'previous_session' => false,
                        'game_state' => null,
                        'multi_reel1' => $ssData->multi_reel1,
                        'multi_reel2' => $ssData->multi_reel2,
                        'multi_reel3' => $ssData->multi_reel3,
                        'total_multi' => $ssData->total_multi,
                        'freespin_require' => $gameData->freespin_require,
                        "freespin_win" => number_format($ssData->freespin_win, 2, '.', ''),
                        "home_url" => $ssData->home_url,
                        'api_version' => '1.0.2',
                        'max_buy_feature' => $gameData->max_buy_feature,
                        "replace" => "load_session",
                        'max_bet' => isset($Agent->max_bet) ? $Agent->max_bet : $MAX_BET,
                        'min_bet' => isset($Agent->min_bet) ? $Agent->min_bet : 0,
                        'translate' => $translate,
                        'sure_win' => $ssData->sure_win,
                    ];

                    return $this->sendResponse($resData, 'action');
                } else {
                    $LogError = \Illuminate\Support\Str::random(13);

                    return $this->sendError('Token not found. (Error Code:' . $LogError . ')');
                }
            }
            if ($act === 'icons') {
                $session = FortuneDragonPlayer::where('uuid', $token)->first();
                // var_dump(($gameRule));
                if ($session) {
                    if ($gameData) {
                        return $this->sendResponse($gameRule->payout, 'Launch game success');
                    } else {
                        return $this->sendError('Load icons fail');
                    }
                } else {
                    return $this->sendError('Session load fail');
                }
            }
            if ($act === 'spin') {
                $betAmount = isset($p->betSize) ? $p->betSize : null;
                $betLevel = isset($p->betLevel) ? $p->betLevel : null;
                if ($sessionPlayer) {
                    $ssData = (object) $sessionPlayer->session_data;
                    // var_dump(json_encode($currDate->format('ymdhi')));
                    // $syncDate = $currDate->addMinute($ssData->time_diff + 1);

                    // var_dump($syncStr);
                    // Log::debug($syncStr);
                    // var_dump($syncDate->format("ymdhi"));
                    // $arrSyncStrSubSecond = $syncDate->format('ymdhi');
                    $userName = $sessionPlayer->user_name;
                    $wallet = $sessionPlayer->credit;
                    $nextRunFeature = $sessionPlayer->nextrun_feature;
                    $sRtpNormal = $sessionPlayer->return_normal;
                    $sRtpFeature = $sessionPlayer->return_feature;
                    $nextRunFeature = isset($nextRunFeature) ? $nextRunFeature : 0;
                    $numFreeSpin = isset($ssData->freespin) ? $ssData->freespin : 0;
                    $isContinuous = isset($ssData->multiply_continuous) ? $ssData->multiply_continuous : 0;
                    $prevMultiply = isset($ssData->last_multiply) ? $ssData->last_multiply : 0;
                    // $freeMode = $numFreeSpin > 0 || $numFreeSpin == -1;
                    $freeNum = $ssData->freespin;
                    $freeMode = isset($ssData->parent_id) ? ($ssData->free_mode) : false;
                    $sureWin = isset($ssData->sure_win) ? $ssData->sure_win : false;
                    $sureWin = $freeMode && $freeNum != 8 ? false : $sureWin;
                    $valueSureWin = $sureWin ? 5 : 1;
                    $dataType = $freeMode ? 'feature' : 'normal';
                    $freeSpinindex = $freeMode ? $ssData->free_spin_index : 0;
                    if ($freeSpinindex > 0) {
                        $dataType = "feature_$freeSpinindex";
                    }

                    $spinData = GameController::spinConfig($path, $dataType);
                    if ($gameData && $gameRule && $spinData) {
                        $baseBet = ($ssData->base_bet);
                        if ($betAmount && $betLevel) {
                            $betSize = (float) $betAmount;
                            $betLevel = (int) $betLevel;
                            $ssData->betamount = $betSize;
                            $ssData->bet_level = $betLevel;
                            $totalBet = $freeMode && $freeNum != 8 ? 0 : $baseBet * $betSize * $betLevel * $valueSureWin;
                            $parentId = $ssData->parent_id ? $ssData->parent_id : 0;
                            $ajustRatio = $betSize * $betLevel;
                            $transaction = uniqid();
                            $gameName = "Fortune Dragon";
                            $game = Game::where('name', $gameName)->first();
                            $agentIdNew = $agentId + 1;
                            $AgentConfig = Agent::where('id', $agentIdNew)->first();
                            $MAX_BET = isset($AgentConfig->max_bet) ? $AgentConfig->max_bet : $MAX_BET;
                            $Agent = ConfigAgent::where('game_name', $gameName)->where('agent_id', $agentIdNew)->first();
                            // $MAX_BET = $ssData->max_bet == 0 ? $MAX_BET : $ssData->max_bet;
                            $MAX_BET = isset($Agent->max_bet) ? $Agent->max_bet : $MAX_BET;
                            $MIN_BET = isset($Agent->min_bet) ? $Agent->min_bet : 0;

                            if ($wallet >= $totalBet && $totalBet <= $MAX_BET && $totalBet >= $MIN_BET || $freeMode) {
                                $wallet = $wallet - $totalBet;

                                if ($userPlayer) {
                                    if ($USE_SEAMLESS) {
                                        $apiGetBet = $apiAgent . '/bet';
                                        $gameId = $game->id;
                                        $language = $lang;
                                        $timestamp  = time();
                                        $hash = md5("Amount=$totalBet&GameId=$gameId&Language=$language&OperatorId=$operatorId&PlayerId=$userNameAgentNew&ReferenceId=$transaction&RoundId=$parentId&Timestamp=$timestamp&Token=$operatorId$secretKey");

                                        $data = [
                                            'OperatorId' => $operatorId,
                                            'PlayerId' => $userNameAgentNew,
                                            'GameId'    => $gameId,
                                            'Hash' => $hash,
                                            'RoundId' => $parentId,
                                            'Amount' => $totalBet,
                                            'ReferenceId' => $transaction,
                                            'Timestamp' => $timestamp,
                                            'Language' => $language,
                                            'Token' => $operatorId,
                                        ];
                                        $agentcyRes = $core->sendCurl($data, $apiGetBet);
                                    } else {
                                        $wallet = $seamless->updateWallet($userPlayer, $wallet);
                                    }
                                }

                                $walletOld = $wallet;
                                $winRatio = $EASY_WIN_RATIO;
                                $featureRatio = $ACCESS_FEATURE_RATIO;
                                $returnBet = $totalBet * $SYSTEM_RTP / 100;
                                $returnFeature = $returnBet * $SHARE_FEATURE / 100;
                                $returnNormal = $returnBet - $returnFeature;


                                if (!$freeMode) {
                                    $rtpNormal = $sRtpNormal + $returnNormal;
                                    $rtpFeature = $sRtpFeature + $returnFeature;
                                } else {
                                    $rtpNormal = $sRtpNormal;
                                    $rtpFeature = $sRtpFeature;
                                }

                                $forceScatter = false;
                                $signCreditOk = $SIGN_FEATURE_CREDIT > 0 ? $rtpFeature >= $SIGN_FEATURE_CREDIT : true;
                                $signSpinNumOk = $SIGN_FEATURE_SPIN > 0 ? $nextRunFeature >= $SIGN_FEATURE_SPIN : true;
                                $minFeatureWin = isset($gameData->min_feature_win) ? $gameData->min_feature_win * $ajustRatio : 0;
                                $signRtpMode = $USE_RTP && $minFeatureWin > 0 ? $rtpFeature >= $minFeatureWin : true;

                                if (!$freeMode && $signCreditOk && $signSpinNumOk && $signRtpMode) {
                                    $featureRatio = $ACCESS_FEATURE_RATIO;
                                    $featureRatio = 100;
                                    $inArr = [];
                                    for ($i = 0; $i < 100; $i++) {
                                        $hasIn = $i < $featureRatio;
                                        $inArr[] = $hasIn;
                                    }
                                    $forceScatter = $inArr[array_rand($inArr)];
                                }
                                $fileName = '';
                                $lineIndex = 0;

                                // ############ calculate Jackpot
                                // ####### JACKPOT CONFIG ###################
                                $JACKPOT__RETURN_VALUE_RATIO = $adjustRatio->jackpot_return_value_ratio;
                                $JACKPOT_BEFORE = $adjustRatio->jackpot_value;
                                $JACKPOT_WIN_RATIO = $adjustRatio->jackpot_win_ratio;

                                // ####### ####### ###################

                                $returnSystem = $totalBet - $returnBet;
                                $returnJackpot = number_format($returnSystem * $JACKPOT__RETURN_VALUE_RATIO / 100, 3, '.', '');
                                // var_dump($JACKPOT);
                                $JACKPOT = $JACKPOT_BEFORE + $returnJackpot;
                                $JACKPOT_NEW = $JACKPOT;
                                // var_dump($JACKPOT);

                                $number = range(0, $JACKPOT_WIN_RATIO);
                                shuffle($number);
                                $randArrJackpot = rand(0, count($number) - 1);
                                $randNumberJackpot = $number[$randArrJackpot];
                                $checkJackpot = false;
                                if ($randNumberJackpot == 1 && $JACKPOT >= $totalBet) {
                                    $checkJackpot = true;
                                }
                                $rtpNormalNew = $rtpNormal;
                                if ($checkJackpot) {
                                    $rtpNormal = $rtpNormal + $totalBet;
                                    $JACKPOT = $JACKPOT - $totalBet;
                                }
                                $rtpNormalLast = $rtpNormal;
                                $adjustRatio->jackpot_value = $JACKPOT;
                                $adjustRatio->save();

                                // #######################
                                $maxWin = 0;

                                // $forceScatter = true; //Debug only
                                if ($forceScatter) {
                                    // l('forceScatter');
                                    $hasEntry = isset($gameData->free_spin_entry) ? $gameData->free_spin_entry : false;
                                    if ($hasEntry) {
                                        $fileName = 'freespin_entry.txt';
                                        $lineIndex = 0; //Will random in freespin_entry

                                        $dataType = 'feature';
                                        $spinData = GameController::spinConfig($path, $dataType);
                                        if ($spinData != false) {
                                            $accessIndex = 1;
                                            $accessFileName = '';
                                            // GAME GENERATE MAX_WIN VALUE ################################
                                            if ($USE_RTP) {
                                                // $rtpFeature = (float)$sessionsEntity['return_feature'];
                                                $maxWin = $rtpFeature / $ajustRatio;
                                                $maxWin = $maxWin > 0 ? $maxWin : 0;
                                                // l('$maxWin: '.$maxWin);
                                                $winData = [];
                                                for ($i = 0; $i < count($spinData); $i++) {
                                                    $spin = (object) $spinData[$i];
                                                    if ($spinData[$i]['win'] <= $maxWin) {
                                                        $count = (int) $spinData[$i];
                                                        while ($count > 0) {
                                                            $winData[] = $spinData[$i]['win'];
                                                            $count--;
                                                        }
                                                    }
                                                }
                                                $forceWin = $winData[array_rand($winData)];
                                                for ($i = 0; $i < count($spinData); $i++) {
                                                    $win = $spinData[$i]['win'];
                                                    if ($win == $forceWin) {
                                                        $accessFileName = $spinData[$i]['file'];
                                                    }
                                                }
                                            }
                                            // ############################################################
                                            $ssData->fileName = $accessFileName;
                                            $ssData->lineIndex = $accessIndex;
                                        }
                                    } else {
                                        $dataType = 'feature';
                                        $spinData = GameController::spinConfig($path, $dataType);
                                        $spinItem = (object) $spinData[array_rand($spinData)];
                                        $fileName = $spinItem->file;
                                        $lineIndex = 1;
                                        // GAME GENERATE MAX_WIN VALUE ################################
                                        if ($USE_RTP) {
                                            $maxWin = $rtpFeature / $ajustRatio;
                                            $maxWin = $maxWin > 0 ? $maxWin : 0;
                                            $maxWin = $maxWin > $gameData->min_feature_win ? $maxWin : $gameData->min_feature_win;
                                            $winData = [];
                                            for ($i = 0; $i < count($spinData); $i++) {
                                                $spin = (object) $spinData[$i];
                                                if ($spinData[$i]['win'] <= $maxWin) {
                                                    $count = (int) $spinData[$i];
                                                    while ($count > 0) {
                                                        $winData[] = $spinData[$i]['win'];
                                                        $count--;
                                                    }
                                                }
                                            }
                                            $forceWin = $winData[array_rand($winData)];
                                            for ($i = 0; $i < count($spinData); $i++) {
                                                $win = $spinData[$i]['win'];
                                                if ($win == $forceWin) {
                                                    $fileName = $spinData[$i]['file'];
                                                }
                                            }
                                        }
                                        // ############################################################

                                        $nextRunFeature = 0;
                                        $ssData->fileName = $fileName;
                                        $ssData->lineIndex = $lineIndex + 1; //Next turn
                                    }
                                    // $dataType = $hasEntry ? 'freespin_entry.txt' : "feature";

                                } else {
                                    if (!$freeMode) {
                                        // $maxWin = $freeMode ? $rtpFeature / $ajustRatio : $rtpNormal / $ajustRatio;
                                        // $spinData = spinConfig($path, $gameName, $dataType);
                                        $spinItem = (object) $spinData[array_rand($spinData)];
                                        // l(json_encode($spinItem));
                                        $winRatio = $EASY_WIN_RATIO;
                                        $inArr = [];
                                        for ($i = 0; $i < 100; $i++) {
                                            $hasIn = $i < $winRatio;
                                            $inArr[] = $hasIn;
                                        }
                                        $forceData = $inArr[array_rand($inArr)];

                                        $forceData = $sureWin ? true : $forceData;
                                        if ($forceData) {
                                            // GAME GENERATE MAX_WIN VALUE ################################
                                            $maxWin = $USE_RTP ? $rtpNormal / $ajustRatio : $spinItem->win;
                                            $maxWin = $maxWin > 0 ? $maxWin : 0;
                                            $winData = [];
                                            $maxWin = $sureWin ? 1000 : $maxWin;
                                            for ($i = 0; $i < count($spinData); $i++) {
                                                $spin = (object) $spinData[$i];
                                                if ($spinData[$i]['win'] > 0 && $spinData[$i]['win'] <= $maxWin) {
                                                    $count = (int) $spinData[$i];
                                                    while ($count > 0) {
                                                        $winData[] = $spinData[$i]['win'];
                                                        $count--;
                                                    }
                                                }
                                            }
                                            $forceWin = count($winData) > 0 ? $winData[array_rand($winData)] : 0;
                                            $winIndex = 0;
                                            if ($sureWin) {
                                                $winIndex = 1;
                                            }

                                            for ($i = $winIndex; $i < count($spinData); $i++) {
                                                $win = $spinData[$i]['win'];
                                                if ($win == $forceWin) {
                                                    $fileName = $spinData[$i]['file'];
                                                    $count = (int) $spinData[$i]['count'];
                                                    $lineIndex = rand(1, $count);
                                                }
                                            }
                                        } else {
                                            $forceWin = 0;
                                            for ($i = 0; $i < count($spinData); $i++) {
                                                $win = $spinData[$i]['win'];
                                                if ($win == $forceWin) {
                                                    $fileName = $spinData[$i]['file'];
                                                    $count = (int) $spinData[$i]['count'];
                                                    $lineIndex = rand(1, $count);
                                                }
                                            }
                                        }
                                    } else {
                                        $fileName = $ssData->fileName;
                                        $lineIndex = $ssData->lineIndex; //Current turn
                                        $ssData->lineIndex = $lineIndex + 1;
                                    }
                                }

                                if ($sureWin && $forceScatter) {
                                    $dataType = 'normal';
                                    $spinData = GameController::spinConfig($path, $dataType);
                                    $spinItem = (object) $spinData[array_rand($spinData)];
                                    // l(json_encode($spinItem));
                                    $winRatio = $EASY_WIN_RATIO;
                                    $inArr = [];
                                    for ($i = 0; $i < 100; $i++) {
                                        $hasIn = $i < $winRatio;
                                        $inArr[] = $hasIn;
                                    }
                                    $forceData = $inArr[array_rand($inArr)];

                                    $forceData = $sureWin ? true : $forceData;
                                    if ($forceData) {
                                        // GAME GENERATE MAX_WIN VALUE ################################
                                        $maxWin = $USE_RTP ? $rtpNormal / $ajustRatio : $spinItem->win;
                                        $maxWin = $maxWin > 0 ? $maxWin : 0;
                                        $winData = [];
                                        $maxWin = $sureWin ? 1000 : $maxWin;
                                        for ($i = 0; $i < count($spinData); $i++) {
                                            $spin = (object) $spinData[$i];
                                            if ($spinData[$i]['win'] > 0 && $spinData[$i]['win'] <= $maxWin) {
                                                $count = (int) $spinData[$i];
                                                while ($count > 0) {
                                                    $winData[] = $spinData[$i]['win'];
                                                    $count--;
                                                }
                                            }
                                        }
                                        $forceWin = count($winData) > 0 ? $winData[array_rand($winData)] : 0;
                                        $winIndex = 0;
                                        if ($sureWin) {
                                            $winIndex = 1;
                                        }

                                        for ($i = $winIndex; $i < count($spinData); $i++) {
                                            $win = $spinData[$i]['win'];
                                            if ($win == $forceWin) {
                                                $fileName = $spinData[$i]['file'];
                                                $count = (int) $spinData[$i]['count'];
                                                $lineIndex = rand(1, $count);
                                            }
                                        }
                                    } else {
                                        $forceWin = 0;
                                        for ($i = 0; $i < count($spinData); $i++) {
                                            $win = $spinData[$i]['win'];
                                            if ($win == $forceWin) {
                                                $fileName = $spinData[$i]['file'];
                                                $count = (int) $spinData[$i]['count'];
                                                $lineIndex = rand(1, $count);
                                            }
                                        }
                                    }
                                }
                                $pull = GameController::spinConfigData($path, $fileName, $lineIndex, $dataType);

                                // var_dump(json_encode($sureWin));
                                // var_dump(json_encode($forceScatter));
                                // var_dump(json_encode($ssData));
                                // var_dump(json_encode($pull));

                                if ($pull) {
                                    $totalResultRep = $pull->total_result_rep;
                                    // $winSymbolRep = $pull->win_symbol_rep;
                                    $totalResult = $totalResultRep;
                                    $resulJson = $pull->result_json;

                                    $pull->win_amount = (float) number_format($pull->win_amount * $ajustRatio, 2, '.', '');
                                    $pull->win_multi = (float) number_format($pull->win_multi * $ajustRatio, 2, '.', '');
                                    $pull->freespin_win = (float) number_format($pull->freespin_win * $ajustRatio, 2, '.', '');
                                    for ($i = 0; $i < count($resulJson); $i++) {
                                        $totalBetOld = isset($resulJson[count($resulJson) - $i - 1]->bet_amount) ? $resulJson[count($resulJson) - $i - 1]->bet_amount : 0;
                                        $winTotalMultiDrop = $resulJson[$i]->win_total * $ajustRatio;
                                        $countScatter = $resulJson[$i]->count_scatter;
                                        $symbolWinChange = $resulJson[$i]->symbol_win;
                                        for ($j = 0; $j < count($symbolWinChange); $j++) {
                                            $totalResult = str_replace('-x' . 0 . $j . '-', $symbolWinChange[$j]->win_amount * $ajustRatio, $totalResult);
                                        }

                                        $profitSureWin = $sureWin ? ($valueSureWin) * $baseBet - $resulJson[$i]->bet_amount : 0;
                                        $resulJson[$i]->credit_drop = number_format($wallet, 2, '.', '');
                                        $resulJson[$i]->profit = number_format($resulJson[$i]->profit * $ajustRatio - $profitSureWin, 2, '.', '');
                                        $resulJson[$i]->bet_amount = number_format($totalBet, 2, '.', '');
                                        $resulJson[$i]->total_freespin = number_format($resulJson[$i]->total_freespin * $ajustRatio, 2, '.', '');
                                        $resulJson[$i]->win_total = number_format($resulJson[$i]->win_total * $ajustRatio, 2, '.', '');
                                        $resulJson[$i]->win_multi = number_format($resulJson[$i]->win_multi * $ajustRatio, 2, '.', '');
                                        $resulJson[$i]->bet_size = $betSize;
                                        $resulJson[$i]->bet_level = $betLevel;
                                        $resulJson[$i]->credit = $wallet + $resulJson[$i]->win_multi;

                                        for ($j = 0; $j < count($resulJson[$i]->win_drop); $j++) {
                                            $resulJson[$i]->win_drop[$j]->win = $resulJson[$i]->win_drop[$j]->win * $ajustRatio;
                                            $resulJson[$i]->win_drop[$j]->win_total = $resulJson[$i]->win_drop[$j]->win_total * $ajustRatio;
                                            $resulJson[$i]->win_drop[$j]->win_multi = $resulJson[$i]->win_drop[$j]->win_multi * $ajustRatio;
                                            $resulJson[$i]->symbol_win[$j]->win = $resulJson[$i]->win_drop[$j]->win;
                                            $resulJson[$i]->symbol_win[$j]->win_total = $resulJson[$i]->win_drop[$j]->win_total;
                                            $resulJson[$i]->symbol_win[$j]->win_multi = $resulJson[$i]->win_drop[$j]->win_multi;
                                        }
                                        $resulJson[$i]->symbol_win = $resulJson[$i]->win_drop;
                                        $resulJson[$i]->profit = number_format($pull->win_multi - $resulJson[$i]->bet_amount, 2, '.', '');
                                    }

                                    if ($sureWin && $forceScatter) {
                                        $pull->free_num = 8;
                                        $countScatter = 4;
                                        $pull->free_mode = true;
                                    }
                                    // $wallet = $wallet + $winTotalMultiDrop + $totalBetOld;
                                    // var_dump(json_encode($resulJson));
                                    // Ajust betsize & level ratio (basic data is 1:1)
                                    // $bonusRatio = $freeMode ? 10 : 1; // x10 in feature mode
                                    // $ajustRatio = $ajustRatio * $bonusRatio;
                                    // $pull->WinOnDrop = (float) number_format($pull->WinOnDrop * $ajustRatio, 2, '.', '');
                                    // for ($i = 0; $i < count($pull->ActiveLines); $i++) {
                                    //     $pull->ActiveLines[$i]->win_amount = (float) number_format($pull->ActiveLines[$i]->win_amount * $ajustRatio, 2, '.', '');
                                    // }
                                    // for ($i = 0; $i < count($pull->DropLineData); $i++) {
                                    //     $pull->DropLineData[$i]->WinOnDrop = (float) number_format($pull->DropLineData[$i]->WinOnDrop * $ajustRatio, 2, '.', '');
                                    //     for ($j = 0; $j < count($pull->DropLineData[$i]->ActiveLines); $j++) {
                                    //         $pull->DropLineData[$i]->ActiveLines[$j]->win_amount = (float) number_format($pull->DropLineData[$i]->ActiveLines[$j]->win_amount * $ajustRatio, 2, '.', '');
                                    //     }
                                    // }
                                    $winAmount = $pull->win_multi;
                                    $wallet = $wallet + $winAmount;
                                    if ($userPlayer) {
                                        if ($USE_SEAMLESS) {
                                            $apiGetResult = $apiAgent . '/result';
                                            $gameId = $game->id;
                                            $language = $lang;
                                            $timestamp  = time();
                                            // $timestamp  = 1735790069;
                                            // $transaction = "67760df5d2d04";
                                            // $hash = md5("OperatorId=$operatorId&PlayerId=$userNameAgentNew$secretKey");
                                            // $hash = md5("Amount=$totalBet&GameId=$gameId&Language=$language&OperatorId=$operatorId&PlayerId=$userNameAgentNew&ReferenceId=$transaction&
                                            //         RoundId=$parentId&Timestamp=$timestamp&Token=$operatorId$secretKey");
                                            $hash = md5("Amount=$winAmount&GameId=$gameId&Language=$language&OperatorId=$operatorId&PlayerId=$userNameAgentNew&ReferenceId=$transaction&RoundId=$parentId&Timestamp=$timestamp&Token=$operatorId$secretKey");

                                            $data = [
                                                // 'action' => 'load_wallet',
                                                // 'user_name' => $userNameAgentNew,
                                                'OperatorId' => $operatorId,
                                                'PlayerId' => $userNameAgentNew,
                                                'GameId'    => $gameId,
                                                'Hash' => $hash,
                                                'RoundId' => $parentId,
                                                'Amount' => $winAmount,
                                                'ReferenceId' => $transaction,
                                                'Timestamp' => $timestamp,
                                                'Language' => $language,
                                                'Token' => $operatorId,
                                            ];
                                            $agentcyRes = $core->sendCurl($data, $apiGetResult);
                                        } else {
                                            $wallet = $seamless->updateWallet($userPlayer, $wallet);
                                        }
                                    }

                                    if ($USE_RTP) {
                                        if ($freeMode) {
                                            $rtpFeature = $rtpFeature - $winAmount;
                                        } else {
                                            $rtpNormal = $rtpNormal - $winAmount;
                                        }
                                    }
                                    
                                    if ($freeMode && $isContinuous) {
                                        $ssData->last_multiply = $pull->LastMultiply;
                                    }
                                    if (!$freeMode) {
                                        $nextRunFeature = $nextRunFeature + 1;
                                    }
                                    // $newFreeSpin = $freeMode ? $numFreeSpin - 1 : $pull->FreeSpin;
                                    // l(json_encode($pull));
                                    $newFreeSpin = $pull->free_num;
                                    $ssData->freespin = $newFreeSpin;
                                    $freeSpin = $newFreeSpin > 0 || $newFreeSpin == -1 ? 1 : 0;
                                    if ($freeMode && $newFreeSpin == 0) {
                                        $ssData->last_multiply = 0;
                                    }

                                    // $WinLogs = implode("\n", $pull->WinLogs);
                                    // $ActiveLines = json_encode($pull->ActiveLines);
                                    // $iconData = json_encode($pull->SlotIcons);
                                    // $multiply = $pull->MultipyScatter;
                                    // $winLog = implode("\n", $pull->WinLogs);
                                    // $dropLineData = json_encode($pull->DropLineData);
                                    // $totalWay = $pull->TotalWay;
                                    // $winOnDrop = $pull->WinOnDrop;
                                    // $dropLine = $pull->DropLine;
                                    // $dropFeature = 0;
                                    // $MultipleList = $forceScatter ? json_encode($ssData->multiple_list) : json_encode($pull->MultipleList);
                                    // // $transaction = Str::random(14);
                                    $parentId = $ssData->parent_id ? $ssData->parent_id : 0;
                                    $winMulti = $pull->win_multi;
                                    $resultJson = json_encode($pull->result_json);
                                    $totalMulti = $pull->total_multi;

                                    // insertSpinlogs($playerId, $gameName, $wallet, $totalBet, $winAmount, $winMulti, $result, $parentId, $transaction, $resultJson, $totalMulti, $db);

                                    $pull->result_json[0]->sure_win = $sureWin;
                                    $spinLogs = new FortuneDragonSpinLogs;
                                    $data = [
                                        'free_num' => $newFreeSpin,
                                        'num_line' => $baseBet,
                                        'betamount' => $betSize,
                                        'balance' => $wallet,
                                        'credit_line' => $betLevel,
                                        'total_bet' => $totalBet,
                                        'win_amount' => $winAmount,
                                        'active_icons' => 0,
                                        'active_lines' => 0,
                                        'icon_data' => 0,
                                        'spin_ip' => 1,
                                        'multipy' => 0,
                                        'win_log' => 0,
                                        'transaction_id' => $transaction,
                                        'drop_line' => 0,
                                        'total_way' => 0,
                                        'first_drop' => 0,
                                        'is_free_spin' => $freeMode,
                                        'parent_id' => $parentId,
                                        'drop_normal' => 0,
                                        'drop_feature' => 0,
                                        'mini_win' => 'mini_win',
                                        'mini_result' => 'mini_result',
                                        'multiple_list' => 0,
                                        'player_id' => $sessionPlayer->uuid,
                                        'result_json' => $pull->result_json,
                                    ];
                                    $spinLogs->fill($data);
                                    $spinLogs->save();

                                    // $gameName = "Fortune Dragon";
                                    // $game = Game::where('name', $gameName)->first();
                                    $profit = $pull->win_multi - $totalBet;
                                    $sesionId = $sessionPlayer->player_uuid;
                                    $userPlayer = $userPlayer != null ? $userPlayer : $sessionPlayer;
                                    \Helper::generateGameHistory($userPlayer, $sesionId, $transaction, $profit > 0 ? 'win' : 'loss', $winAmount, $totalBet, $wallet, $profit, $gameName, $game->uuid, 'balance', 'originals', $agentId, $wallet);

                                    $lastid = FortuneDragonSpinLogs::latest()->first()->uuid;
                                    if ($freeMode && $parentId == 0) {
                                        $ssData->parent_id = $lastid;
                                    }

                                    if ($parentId != 0 && $freeMode) {
                                        $recordFree = FortuneDragonSpinLogs::where('uuid', $parentId)->first();
                                        $dropNormal = $spinLogs->drop_normal;
                                        // $dropFeature = $recordFree->drop_feature;
                                        // $dropFeature = $dropFeature + $dropNormal;
                                        $winAmountOld = $spinLogs->win_amount;
                                        $winAmountNew = $recordFree->win_amount;
                                        $winAmount = $winAmountNew + $winAmountOld;
                                        FortuneDragonSpinLogs::where('uuid', $parentId)->update(['win_amount' => $winAmount]);
                                    }

                                    $freeMode = $countScatter > 0 ? true : $freeMode;
                                    if ($newFreeSpin == 0) {
                                        $ssData->parent_id = 0;
                                        $ssData->free_spin_index = 0;
                                        $ssData->freespin = 0;
                                        $freeMode = false;
                                        // $ssData->multiple_list = "reset"; //Debug reset multiple
                                    }
                                    // $ssData->multiple_list = json_decode($MultipleList);

                                    // var_dump(json_encode($pull));

                                    // $wallet = $seamless->updateWallet($userPlayer, $wallet);
                                    $sessionPlayer->credit = $wallet;
                                    $sessionPlayer->return_feature = $rtpFeature;
                                    $sessionPlayer->return_normal = $rtpNormal;
                                    $sessionPlayer->nextrun_feature = $nextRunFeature;
                                    $ssData->free_mode = $freeMode;
                                    $ssData->bet_size = $betSize;
                                    $ssData->bet_size = $betSize;
                                    $ssData->bet_level = $betLevel;
                                    // $sessionData = json_encode($ssData);
                                    $sessionPlayer->session_data = $ssData;

                                    $sessionPlayer->save();

                                    // var_dump($freeMode);
                                    // var_dump(json_encode($ssData));

                                    $totalResultImplode = $totalResult;

                                    // ########## Swap Symbol On Reel

                                    // $currTime1 = \Carbon\Carbon::now();
                                    // $currTime = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $currTime1, 'UTC');
                                    // $syncTime = $currTime->addSeconds($ssData->time_diff);
                                    // $syncStr = $syncTime->format('YmdHis');
                                    // $syncStrSubSecond = substr($syncStr, 0, -2);
                                    // $arrSyncStrSubSecond = str_split($syncStrSubSecond);
                                    // $number1 = 0;
                                    // $number2 = 0;
                                    // $number3 = 0;
                                    // $number4 = 0;
                                    // for ($i = 0; $i < count($arrSyncStrSubSecond); $i++) {
                                    //     if ($i % 3 == 0) {
                                    //         $number3 = $number3 + $arrSyncStrSubSecond[$i];
                                    //     }
                                    //     if ($i % 4 == 0) {
                                    //         $number4 = $number4 + $arrSyncStrSubSecond[$i];
                                    //     }
                                    //     if ($i % 2 == 0) {
                                    //         $number1 = $number1 + $arrSyncStrSubSecond[$i];
                                    //     } else {
                                    //         $number2 = $number2 + $arrSyncStrSubSecond[$i];
                                    //     }
                                    // }

                                    // $totalResultEncode = base64_encode($totalResult);
                                    // $totalResultExplode = explode(';', $totalResult);
                                    // $reelOnScreenNewExplode = explode('|', $totalResultExplode[0]);

                                    // SlotgenFortuneDragon::array_swap($reelOnScreenNewExplode, $number1 % 9, $number2 % 9);
                                    // SlotgenFortuneDragon::array_swap($reelOnScreenNewExplode, $number3 % 9, $number4 % 9);

                                    // $reelOnScreenNewImplde = (implode('|', $reelOnScreenNewExplode));
                                    // $totalResultExplode[0] = $reelOnScreenNewImplde;
                                    // $totalResultImplode = (implode(';', $totalResultExplode));
                                    // $totalResult = $totalResultImplode;

                                    // ##############

                                    $resData = [
                                        // "result_ori" => $totalResult,
                                        'result' => $totalResult,
                                        'win_amount' => number_format($pull->win_amount, 2, '.', ''),
                                        'win_multi' => number_format($pull->win_multi, 2, '.', ''),
                                        'bet_amount' => number_format($totalBet, 2, '.', ''),
                                        'credit' => (float) number_format($wallet, 2, '.', ''),
                                        'free_mode' => $pull->free_mode,
                                        'freespin_win' => number_format($pull->freespin_win, 2, '.', ''),
                                        'free_num' => $freeNum,
                                        'total_multi' => $pull->total_multi,
                                        'free_more' => 0,
                                        'freespin_require' => $gameData->freespin_require,
                                        'freespin_more' => $gameData->freespin_more,
                                        'num_line' => $baseBet,
                                        'file_name' => $fileName,
                                        'line_index' => $lineIndex,
                                        'system_rtp' => $SYSTEM_RTP,
                                        'SHARE_FEATURE' => $SHARE_FEATURE,
                                        'nextrun_feature' => number_format($rtpFeature, 2, '.', ''),
                                        'return_normal' => number_format($rtpNormal, 2, '.', ''),
                                        'credit_old' => number_format($walletOld, 2, '.', ''),
                                        'sure_win' => $sureWin,
                                        'max_bet' => isset($Agent->max_bet) ? $Agent->max_bet : $MAX_BET,
                                        'min_bet' => isset($Agent->min_bet) ? $Agent->min_bet : 0
                                    ];
                                    if (isset($pull->expand_field)) {
                                        $resData = (object) array_merge((array) $resData, (array) $pull->expand_field);
                                    }

                                    return $this->sendResponse($resData, 'action');
                                }
                            } else {
                                $LogError = \Illuminate\Support\Str::random(13);
                                if ($wallet < $totalBet) {
                                    return $this->sendError("($errorMess->Insufficient_balance:" . 'S3202UQLXTO20' . ')');
                                } elseif ($totalBet > $MAX_BET) {
                                    return $this->sendError("($errorMess->Error_Max_Bet:" . 'S3202UQLXTO21' . ')');
                                } elseif ($totalBet < $MIN_BET) {
                                    return $this->sendError("($errorMess->Error_Min_Bet:" . 'S3202UQLXTO22' . ')');
                                }
                                // $LogError = \Illuminate\Support\Str::random(13);

                                // return $this->sendError($errorMess->Insufficient_balance . "($errorMess->Error_Code:" . 'S3202UQLXTO20' . ')');
                            }
                        } else {
                            $LogError = \Illuminate\Support\Str::random(13);

                            return $this->sendError('Invalid betsize or bet level. (Error Code:' . $LogError . ')');
                        }
                    } else {
                        $LogError = \Illuminate\Support\Str::random(13);

                        return $this->sendError('Game or Rule is not found.  (Error Code:' . $LogError . ')');
                    }
                } else {
                    $LogError = \Illuminate\Support\Str::random(13);

                    return $this->sendError('Session is not found. (Error Code:' . $LogError . ')');
                }
            }
            if ($act === 'histories') {
                $session = FortuneDragonPlayer::where('uuid', $token)->first();
                if ($session) {
                    $search = [
                        'parent_id' => '0',
                        'player_id' => $token,
                    ];
                    $totalBet = (float) FortuneDragonSpinLogs::where($search)->sum('total_bet');
                    $totalWin = (float) FortuneDragonSpinLogs::where($search)->sum('win_amount');
                    $limit = 15;
                    // var_dump($totalWin);
                    $freeRequire = $gameData->freespin_require;
                    // $arrSyncStrSubSeconda = fortunedragonSpinLogs::where($search)->sum('win_amount');
                    // var_dump(Str::random(25));
                    $paginate = FortuneDragonSpinLogs::where($search)
                        ->orderBy('created_at', 'desc')
                        ->select('uuid', 'balance', 'total_bet', 'win_amount', 'created_at', 'transaction_id', 'result_json', 'parent_id')
                        ->paginate($limit);
                    $resData = [];
                    // var_dump(json_encode($paginate[0]));
                    $totalProfit = $totalWin - $totalBet;
                    for ($i = 0; $i < count($paginate); $i++) {
                        $spinDate = date('m/d', strtotime($paginate[$i]['created_at']));
                        $spinHour = date('H:i:s', strtotime($paginate[$i]['created_at']));
                        $result = $paginate[$i]['result_json'];
                        $numberDrop = count($result) - 1;
                        $countScatter = $result[$numberDrop]['count_scatter'];
                        $dropNormal = $result[$numberDrop]['drop_normal'];
                        $dropFreeSpin = $result[$numberDrop]['drop_freespin'];
                        // $totalFreeSpin = $result[$numberDrop]['freespin_win'];
                        // $totalProfit = $totalFreeSpin > 0 ? $totalFreeSpin - $paginate[$i]['total_bet'] : $paginate[$i]['win_amount'] - $paginate[$i]['total_bet'];
                        $profit = $paginate[$i]['win_amount'] - $paginate[$i]['total_bet'];
                        $freeNum = $result[0]['free_num'] == 8 ? 0 : $result[0]['free_num'];
                        // var_dump(json_encode($result[0]));
                        // var_dump(json_encode($totalProfit));
                        $resData[] = [
                            'total_bet' => (float) number_format($paginate[$i]['total_bet'], 2, '.', ''),
                            'win_amount' => (float) number_format($paginate[$i]['win_amount'], 2, '.', ''),
                            'profit' => (float) number_format($profit, 2, '.', ''),
                            'balance' => (float) number_format($paginate[$i]['credit'], 2, '.', ''),
                            'uuid' => $paginate[$i]['uuid'],
                            'spin_date' => $spinDate,
                            'spin_hour' => $spinHour,
                            'transaction' => $paginate[$i]['transaction_id'],
                            'count_sactter' => $countScatter,
                            'sactter_required' => $freeRequire,
                            'drop_normal' => $dropNormal,
                            'drop_freespin' => $dropFreeSpin,
                            'multipy' => 0,
                            'credit_line' => $gameData->line_num,
                            'parent_id' => $paginate[$i]['parent_id'],
                            'free_num' => $freeNum,
                        ];
                    }

                    $lastResult = (object) [
                        'success' => true,
                        'items' => $resData,
                        'displayTotal' => $paginate->count(),
                        'totalRecord' => $paginate->total(),
                        'totalPage' => $paginate->lastPage(),
                        'perPage' => $paginate->count(),
                        'currentPage' => $paginate->currentPage(),
                        'totalBet' => (float) number_format($totalBet, 2, '.', ''),
                        'totalWin' => (float) number_format($totalWin, 2, '.', ''),
                        'totalProfit' => (float) number_format($totalProfit, 2, '.', ''),
                        'currency_prefix' => $gameData->currency_prefix,
                    ];

                    // return $lastResult;
                    return $this->sendResponse($lastResult, 'Load History');
                } else {
                    return $this->sendError('Session load fail');
                }
            }
            if ($act === 'history_detail') {
                $request = $request->all();
                $uuid = $request['id'];
                $session = FortuneDragonPlayer::where('uuid', $token)->first();
                if ($session) {
                    // var_dump(json_encode($session->session_data));
                    $sessionData = (object) $session->session_data;
                    $resultJson = [];
                    $history = FortuneDragonSpinLogs::where('uuid', $uuid)->first();

                    if ($history) {
                        $history = $history->toArray();
                        $betSize = $history['betamount'];
                        $betLevel = (int) $history['credit_line'];
                        $historyChild = FortuneDragonSpinLogs::where('parent_id', $uuid)->get()->toArray();
                        // var_dump(json_encode($history['result_json'][0]['free_num']));
                        $totalFreeSpin = $history['result_json'][0]['free_num'] + 1;
                        $spinTitleFirst = $history['result_json'][0]['free_spin'] ? "$historyTitle->free_spin_total : 1/$totalFreeSpin" : "$historyTitle->normal_spin";
                        // var_dump($spinTitleFirst);
                        $history['result_json'][0]['spin_title'] = $spinTitleFirst;
                        $resultJson = $history['result_json'];
                        $history = [$history];
                        for ($i = 0; $i < count($historyChild); $i++) {
                            $numberFreeSpin = $i + 2;
                            // $totalFreeSpin = $historyChild[$i]['result_json'][0]['total_freespin'];
                            $spinTitle = $historyChild[$i]['result_json'][0]['free_spin'] ? "$historyTitle->free_spin_total : $numberFreeSpin/$totalFreeSpin" : "$historyTitle->normal_spin";
                            $historyChild[$i]['result_json'][0]['spin_title'] = $spinTitle;
                            // var_dump(($aa));
                            $history[] = $historyChild[$i];
                        }

                        $resData = (object) [
                            'res_data' => $history,
                            'bet_size' => $betSize,
                            'bet_level' => $betLevel,
                        ];

                        // var_dump(json_encode($resData->res_data[0]['result_json']));
                        return $this->sendResponse($resData, 'Load log');
                    } else {
                        return $this->sendError('history not found');
                    }
                } else {
                    return $this->sendError('Session load fail');
                }
            } elseif ($act == 'change_base_bet') {
                $session = FortuneDragonPlayer::where('uuid', $token)->first();
                if ($session) {
                    $sessionData = (object) $session['session_data'];
                    $currBaseBet = $sessionData->base_bet;
                    if ($currBaseBet == 20) {
                        $currBaseBet = 25;
                        $sessionData->base_bet = $currBaseBet;
                        $session->session_data = $sessionData;
                        $session->save();
                    } else {
                        $currBaseBet = 20;
                        $sessionData->base_bet = $currBaseBet;
                        $session->session_data = $sessionData;
                        $session->save();
                    }

                    return $this->sendResponse($currBaseBet, 'change base_bet');
                } else {
                    return $this->sendError('Session load fail');
                }
            } elseif ($act == 'sure_win') {
                $session = FortuneDragonPlayer::where('uuid', $token)->first();
                if ($session) {
                    $sessionData = $session->session_data;
                    $sessionData['sure_win'] = !$sessionData['sure_win'];

                    $session->session_data = $sessionData;
                    $session->save();

                    $resData = [
                        'sure_win' => $sessionData['sure_win'],
                    ];

                    return $this->sendResponse($resData, 'Spin game success');
                } else {
                    return $this->sendError('Session load fail');
                }
            }
        } else {
            $LogError = \Illuminate\Support\Str::random(13);

            return $this->sendError('Player not found. (Error Code:' . $LogError . ')');
        }
    }

    public function spinConfigData($path, $fileName, $lineNum = 0, $type = 'normal')
    {
        $res = null;
        $spinConfigFolder = $type . '__spin';
        $privatePath = $fileName == 'freespin_entry.txt' ? "$path/$fileName" : "$path/$spinConfigFolder/$fileName";
        // l('$privatePath: '.$privatePath);
        // l('$lineNum: '.$lineNum);
        if ($privatePath) {
            $fileContent = file_get_contents($privatePath);
            $spArr = preg_split("/[\n]/", $fileContent);
            $lIndex = $lineNum > 0 ? $lineNum - 1 : array_rand($spArr);
            if ($spArr[$lIndex]) {
                $strData = base64_decode($spArr[$lIndex]);
                // l('$spArr['.$lIndex.']['.$fileName.']: '.$strData);
                $res = json_decode($strData);
            }
        }

        return $res;
    }

    public function spinConfig($path, $type = 'normal')
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

        return $res;
    }

    public function insertPlayerEntity($userName, $wallet, $db)
    {
        $sql = <<<EOF
                INSERT OR IGNORE INTO PlayerEntity (user_name,credit)
                VALUES ("$userName", "$wallet");
                EOF;
        $db->exec($sql);
    }

    public function PlayerEntityId($playerId)
    {
        $playerId = FortuneDragonPlayer::where('player_uuid', $playerId)->first();

        return $playerId;
    }
}
