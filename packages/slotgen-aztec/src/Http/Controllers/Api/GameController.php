<?php

namespace Slotgen\SlotgenAztec\Http\Controllers\Api;

use App\Models\User;
use App\Repositories\SeamlessRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Slotgen\SlotgenAztec\Helpers\Common;
use Slotgen\SlotgenAztec\Http\Controllers\AppBaseController;
use Slotgen\SlotgenAztec\Models\AztecPlayer;
use Slotgen\SlotgenAztec\Models\AztecSpinLogs;
use Slotgen\SlotgenAztec\Models\SlotgenAztecConfig;
use Illuminate\Support\Facades\Log;
use Slotgen\SlotgenAztec\SlotgenAztec;
use App\Models\Game;
use App\Models\Agent;
use App\Models\ConfigAgent;
use App\Helpers\Core;
use File;

class GameController extends AppBaseController
{
    public static function launchGameApi()
    {
        $AppBaseController = new AppBaseController();
        $gameFile = null;
        $gamePrivateFolder = storage_path('app/private/aztec');
        if (!File::exists($gamePrivateFolder)) {
            return $AppBaseController->sendError('error', 'Game Not Found');
        }
        $player = auth()->user();
        $launchData = SlotgenAztec::checkPlayer($player);
        $launchGameRes = SlotgenAztec::LaunchGame($launchData);
        if ($launchGameRes['success']) {
            $resData = SlotgenAztec::LaunchGameRes($launchGameRes);
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
            $player = AztecPlayer::where('player_uuid', $userName)->first();
            if ($player) {
                $launchData = [
                    'uuid' => $player->uuid,
                    'name' => $player->player_uuid,
                    'balance' => $player->credit,
                    'is_seamless' => true,
                    'agent_id' => $player->agent_id,
                    'currency' => $currency,
                    'language' => $language
                ];
            } else {
                $launchData = [
                    'uuid' => '',
                    'name' => $userName,
                    'balance' => 0,
                    'is_seamless' => true,
                    'agent_id' => $agentId,
                    'currency' => $currency,
                    'language' => $language
                ];
            }
            // $myPublicFolder = url('/uploads/games/' . $language);
            // $gamePath = [];
            $launchGameRes = SlotgenAztec::LaunchGame($launchData);
            if ($launchGameRes['success']) {
                $launchGame = (object) $launchGameRes['data'];
                // $sessionId = $launchGame->session_id;
                $language = $launchGame->language;
                // $gameFolder = $launchGame->game_folder;
                // $gamePath = $myPublicFolder . '/' . $language . '/' . $gameFolder . '/index.html?token=' . $sessionId;
                $resLaunch = SlotgenAztec::LaunchGameRes($launchGameRes);
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

    public function GameAction(Request $request)
    {
        $adjustRatio = (object) SlotgenAztecConfig::first();
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
        $path = storage_path('app/private/aztec');
        // $gameName = isset($p->game) ? $p->game : null;
        $gameName = 'aztec';
        $getHeader = $request->header();
        $token = isset($getHeader['X-Ncash-Token']) ? $getHeader['X-Ncash-Token'] : (isset($getHeader['X-Ncash-token']) ? $getHeader['X-Ncash-token'] : (isset($getHeader['x-ncash-token']) ? $getHeader['x-ncash-token'] : 'wrong-key'));
        $game_file = file_get_contents($path . '/ncashgame.json');
        $gameData = (object) json_decode($game_file, true);
        $game_rule = file_get_contents($path . '/game_rule.json');
        $gameRule = (object) json_decode($game_rule, true);
        $seamless = new SeamlessRepository;
        $gameFolder = $gameData->game_folder;
        $currTime = \Carbon\Carbon::now()->toDateTimeString();
        $currDay = \Carbon\Carbon::now()->isoFormat('Y-m-d');
        $sessionPlayer = AztecPlayer::where('uuid', $token)->first();
        $page = isset($p->page) ? $p->page : null;
        $act = isset($p->action) ? $p->action : null;
        $from = isset($p->from) ? date('Y-m-d 00:00:00', strtotime($p->from)) : date('Y-m-d 00:00:00', strtotime($currTime));
        $to = isset($p->to) ? date('Y-m-d 23:59:59', strtotime($p->to)) : date('Y-m-d 23:59:59', strtotime($currTime));
        $lang = isset($p->lang) ? $p->lang : 'en';
        $langInfo = (object) Common::loadLanguage($lang);
        $errorMess = (object) $langInfo->error_message;
        $history = (object) $langInfo->history;
        $time = isset($p->time) ? $p->time : null;
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
                $agentId = "-1";
                if ($USE_SEAMLESS) {
                    $wallet = $agent->Balance;
                    $userPlayer = AztecPlayer::where('player_uuid', $userNameAgent)->first();
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
                    $gameName = "Aztec";
                    $agentIdNew = $agentId + 1;
                    $AgentConfig = Agent::where('id', $agentIdNew)->first();
                    $MAX_BET = isset($AgentConfig->max_bet) ? $AgentConfig->max_bet : $MAX_BET;
                    $Agent = ConfigAgent::where('game_name', $gameName)->where('agent_id', $agentIdNew)->first();
                    Log::debug(json_encode($Agent));
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
            if ($act === 'session') {
                $ssData = null;
                if ($sessionPlayer) {
                    $ssData = (object) $sessionPlayer->session_data;
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

                    // $ssData->size_list = $sizeList;
                    $ssData->bet_size = in_array($ssData->bet_size, $ssData->size_list) ? $ssData->bet_size : $ssData->size_list[0];
                    $ssData->bet_level = in_array($ssData->bet_size, $ssData->level_list) ? $ssData->bet_level : $ssData->level_list[0];
                    $ssData->currency_suffix = $ssData->currency_suffix == null ? "" : $ssData->currency_suffix;
                    $translate = $langInfo;
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
                        'credit_line' => $ssData->cpl,
                        'buy_feature' => $buyFeature,
                        'buy_max' => $buyMax,
                        'feature' => (object) [],
                        'total_way' => 0,
                        'multipy' => 0,
                        'icon_data' => $iconData,
                        'active_lines' => $activeLine,
                        'drop_line' => $dropLine,
                        "home_url" => $ssData->home_url,
                        'currency_prefix' => $ssData->currency_prefix,
                        'currency_suffix' => $ssData->currency_suffix,
                        'currency_thousand' => $ssData->currency_thousand,
                        'currency_decimal' => $ssData->currency_decimal,
                        'bet_size_list' => $ssData->size_list,
                        'bet_level_list' => $ssData->level_list,
                        'previous_session' => false,
                        'game_state' => null,
                        'translate' => $translate,
                        'total_bet' => number_format($ssData->betamount * $ssData->linenum * $ssData->cpl, 2, '.', ''),
                        'api_version' => '1.0.2',
                        'max_buy_feature' => $gameData->max_buy_feature,
                        "replace" => "load_session",
                        'max_bet' => isset($Agent->max_bet) ? $Agent->max_bet : $MAX_BET,
                        'min_bet' => isset($Agent->min_bet) ? $Agent->min_bet : 0,
                        'translate' => $translate,
                    ];

                    return $this->sendResponse($resData, 'action');
                } else {
                    $LogError = \Illuminate\Support\Str::random(13);

                    return $this->sendError('Token not found. (Error Code:' . $LogError . ')');
                }
            }
            if ($act === 'icons') {
                $ssData = null;
                if ($sessionPlayer) {
                    if ($gameRule && $gameData) {
                        $iconList = [];
                        $payout = $gameRule->payout;
                        for ($i = 0; $i < count($payout); $i++) {
                            $iconItem = null;
                            $fId = -1;
                            for ($n = 0; $n < count($iconList); $n++) {
                                if ($iconList[$n]['name'] == $payout[$i]['name']) {
                                    $iconItem = $iconList[$n];
                                    $fId = $n;

                                    break;
                                }
                            }
                            if ($iconItem !== null) {
                                if ($fId > -1) {
                                    $iconList[$fId]['win_' . $payout[$i]['require']] = $payout[$i]['pay'];
                                }
                            } else {
                                $iconItem = ['name' => $payout[$i]['name']];
                                $iconItem['win_' . $payout[$i]['require']] = $payout[$i]['pay'];
                                $iconList[] = $iconItem;
                            }
                        }

                        $res = [];
                        $icons = $gameData->icons;
                        $iconItem = null;
                        for ($i = 0; $i < count($icons); $i++) {
                            for ($n = 0; $n < count($iconList); $n++) {
                                if ($iconList[$n]['name'] == $icons[$i]['name']) {
                                    $iconItem = $iconList[$n];

                                    break;
                                }
                            }
                            $resData[] = [
                                'icon_name' => $icons[$i]['name'],
                                'win_1' => isset($iconItem['win_1']) ? $iconItem['win_1'] : 0,
                                'win_2' => isset($iconItem['win_2']) ? $iconItem['win_2'] : 0,
                                'win_3' => isset($iconItem['win_3']) ? $iconItem['win_3'] : 0,
                                'win_4' => isset($iconItem['win_4']) ? $iconItem['win_4'] : 0,
                                'win_5' => isset($iconItem['win_5']) ? $iconItem['win_5'] : 0,
                                'win_6' => isset($iconItem['win_6']) ? $iconItem['win_6'] : 0,
                                'wild_card' => 0,
                                'free_spin' => 0,
                                'free_num' => 0,
                                'scaler_spin' => 0,
                            ];
                        }

                        return $this->sendResponse($resData, 'action');
                    } else {
                        $success = false;
                        $errors[] = 'Game or Rule is not found';
                    }
                } else {
                    $LogError = \Illuminate\Support\Str::random(13);

                    return $this->sendError('Session is not found!. (Error Code:' . $LogError . ')');
                }
            }
            if ($act === 'spin') {
                $betamount = isset($p->betamount) ? $p->betamount : null;
                $cpl = isset($p->cpl) ? $p->cpl : null;
                if ($sessionPlayer) {
                    $ssData = (object) $sessionPlayer->session_data;
                    $userName = $sessionPlayer->user_name;
                    $wallet = $sessionPlayer->credit;
                    $nextRunFeature = $sessionPlayer->nextrun_feature;
                    $sRtpNormal = $sessionPlayer->return_normal;
                    $sRtpFeature = $sessionPlayer->return_feature;
                    $nextRunFeature = isset($nextRunFeature) ? $nextRunFeature : 0;
                    $numFreeSpin = isset($ssData->freespin) ? $ssData->freespin : 0;
                    $isContinuous = isset($ssData->multiply_continuous) ? $ssData->multiply_continuous : 0;
                    $prevMultiply = isset($ssData->last_multiply) ? $ssData->last_multiply : 0;
                    $freeMode = $numFreeSpin > 0 || $numFreeSpin == -1;
                    $dataType = $freeMode ? 'feature' : 'normal';
                    $freeSpinindex = $freeMode ? $ssData->free_spin_index : 0;
                    if ($freeSpinindex > 0) {
                        $dataType = "feature_$freeSpinindex";
                    }

                    $spinData = GameController::spinConfig($path, $dataType);
                    if ($gameData && $gameRule && $spinData) {
                        $baseBet = $ssData->base_bet;
                        if ($betamount && $cpl) {
                            $betSize = (float) $betamount;
                            $betLevel = (float) $cpl;
                            $ssData->betamount = $betSize;
                            $ssData->cpl = $betLevel;
                            $totalBet = $freeMode ? 0 : $baseBet * $betSize * $betLevel;
                            $parentId = $ssData->parent_id ? $ssData->parent_id : 0;
                            $ajustRatio = $betSize * $betLevel;
                            $transaction = uniqid();
                            $gameName = "Aztec";
                            $game = Game::where('name', $gameName)->first();
                            $agentIdNew = $agentId + 1;
                            $AgentConfig = Agent::where('id', $agentIdNew)->first();
                            $MAX_BET = isset($Agent->max_bet) ? $Agent->max_bet : $MAX_BET;
                            $MIN_BET = isset($Agent->min_bet) ? $Agent->min_bet : 0;
                            // $Agent = ConfigAgent::where('game_name', $gameName)->where('agent_id', $agentIdNew)->first();
                            // $MAX_BET = $ssData->max_bet == 0 ? $MAX_BET : $ssData->max_bet;
                            // $MAX_BET = isset($Agent->max_bet) ? $Agent->max_bet : $MAX_BET;
                            // $MIN_BET = isset($Agent->min_bet) ? $Agent->min_bet : 0;

                            if ($wallet >= $totalBet && $totalBet <= $MAX_BET && $totalBet >= $MIN_BET || $freeMode) {
                                $wallet = $wallet - $totalBet;

                                try {
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
                                    //***********************

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
                                        // $featureRatio = 100;
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

                                    // ############ calculate Jackpot
                                    // ####### JACKPOT CONFIG ###################
                                    $JACKPOT__RETURN_VALUE_RATIO = $adjustRatio->jackpot_return_value_ratio;
                                    $JACKPOT = $adjustRatio->jackpot_value;
                                    $JACKPOT_WIN_RATIO = $adjustRatio->jackpot_win_ratio;

                                    // ####### ####### ###################

                                    $returnSystem = $totalBet - $returnBet;
                                    $returnJackpot = number_format($returnSystem * $JACKPOT__RETURN_VALUE_RATIO / 100, 3, '.', '');
                                    // var_dump($JACKPOT);
                                    $JACKPOT = $JACKPOT + $returnJackpot;
                                    // var_dump($JACKPOT);

                                    $number = range(0, $JACKPOT_WIN_RATIO);
                                    shuffle($number);
                                    $randArrJackpot = rand(0, count($number) - 1);
                                    $randNumberJackpot = $number[$randArrJackpot];
                                    $checkJackpot = false;
                                    if ($randNumberJackpot == 1 && $JACKPOT >= $totalBet) {
                                        $checkJackpot = true;
                                    }
                                    if ($checkJackpot) {
                                        $rtpNormal = $rtpNormal + $totalBet;
                                        $JACKPOT = $JACKPOT - $totalBet;
                                    }
                                    // #######################

                                    $adjustRatio->jackpot_value = $JACKPOT;
                                    $adjustRatio->save();

                                    //  $forceScatter = true; //Debug only
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

                                                // $maxWin = 100;
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

                                            if ($forceData) {
                                                // GAME GENERATE MAX_WIN VALUE ################################
                                                $maxWin = $USE_RTP ? $rtpNormal / $ajustRatio : $spinItem->win;
                                                $maxWin = $maxWin > 0 ? $maxWin : 0;
                                                $winData = [];
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
                                                for ($i = 0; $i < count($spinData); $i++) {
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

                                    // var_dump($fileName);
                                    // $fileName = "slotgen_win_200_data.txt";
                                    // $lineIndex = 1;
                                    $pull = GameController::spinConfigData($path, $fileName, $lineIndex, $dataType);
                                    if ($pull) {
                                        // Ajust betsize & level ratio (basic data is 1:1)
                                        // $bonusRatio = $freeMode ? 10 : 1; // x10 in feature mode
                                        // $ajustRatio = $ajustRatio * $bonusRatio;
                                        $pull->WinAmount = (float) number_format($pull->WinAmount * $ajustRatio, 2, '.', '');
                                        $pull->WinOnDrop = (float) number_format($pull->WinOnDrop * $ajustRatio, 2, '.', '');
                                        for ($i = 0; $i < count($pull->ActiveLines); $i++) {
                                            $pull->ActiveLines[$i]->win_amount = (float) number_format($pull->ActiveLines[$i]->win_amount * $ajustRatio, 2, '.', '');
                                        }
                                        for ($i = 0; $i < count($pull->DropLineData); $i++) {
                                            $pull->DropLineData[$i]->WinOnDrop = (float) number_format($pull->DropLineData[$i]->WinOnDrop * $ajustRatio, 2, '.', '');
                                            for ($j = 0; $j < count($pull->DropLineData[$i]->ActiveLines); $j++) {
                                                $pull->DropLineData[$i]->ActiveLines[$j]->win_amount = (float) number_format($pull->DropLineData[$i]->ActiveLines[$j]->win_amount * $ajustRatio, 2, '.', '');
                                            }
                                        }
                                        $winAmount = $pull->WinAmount;
                                        $wallet = $wallet + $winAmount;
                                        if ($userPlayer) {
                                            if ($USE_SEAMLESS) {
                                                $data = [
                                                    'action' => 'settle',
                                                    'user_name' => $userNameAgentNew,
                                                    'amount' => $winAmount,
                                                    'transaction' => $transaction,
                                                    'game_code' => $game->uuid,
                                                    'game_name' => $gameName
                                                ];
                                                $agentcyRes = $core->sendCurl($data, $apiAgent);
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

                                        $newFreeSpin = $pull->FreeSpin;
                                        $ssData->freespin = $newFreeSpin;
                                        $freeSpin = $newFreeSpin > 0 || $newFreeSpin == -1 ? 1 : 0;
                                        if ($freeMode && $newFreeSpin == 0) {
                                            $ssData->last_multiply = 0;
                                        }

                                        $newFreeSpin = $newFreeSpin != -1 ? $newFreeSpin : 1;
                                        $WinLogs = implode("\n", $pull->WinLogs);
                                        $ActiveIcons = json_encode($pull->ActiveIcons);
                                        $ActiveLines = json_encode($pull->ActiveLines);
                                        $iconData = json_encode($pull->SlotIcons);
                                        $multiply = $pull->MultipyScatter;
                                        $winLog = implode("\n", $pull->WinLogs);
                                        $dropLineData = json_encode($pull->DropLineData);
                                        $totalWay = $pull->TotalWay;
                                        $winOnDrop = $pull->WinOnDrop;
                                        $dropLine = $pull->DropLine;
                                        $dropFeature = 0;
                                        $MultipleList = $forceScatter ? json_encode($ssData->multiple_list) : json_encode($pull->MultipleList);
                                        // $transaction = Str::random(14);
                                        $parentId = $ssData->parent_id ? $ssData->parent_id : 0;
                                        $spinLogs = new AztecSpinLogs;
                                        $data = [
                                            'free_num' => $newFreeSpin,
                                            'num_line' => $baseBet,
                                            'betamount' => $betSize,
                                            'balance' => $wallet,
                                            'credit_line' => $cpl,
                                            'total_bet' => $totalBet,
                                            'win_amount' => $winAmount,
                                            'active_icons' => $ActiveIcons,
                                            'active_lines' => $ActiveLines,
                                            'icon_data' => $iconData,
                                            'spin_ip' => 1,
                                            'multipy' => $multiply,
                                            'win_log' => $winLog,
                                            'transaction_id' => $transaction,
                                            'drop_line' => $dropLineData,
                                            'total_way' => $totalWay,
                                            'first_drop' => $winOnDrop,
                                            'is_free_spin' => $freeMode,
                                            'parent_id' => $parentId,
                                            'drop_normal' => $dropLine,
                                            'drop_feature' => 0,
                                            'mini_win' => 'mini_win',
                                            'mini_result' => 'mini_result',
                                            'multiple_list' => $MultipleList,
                                            'player_id' => $sessionPlayer->uuid,
                                        ];
                                        $spinLogs->fill($data);
                                        $spinLogs->save();

                                        $gameName = "Aztec";
                                        $game = Game::where('name', $gameName)->first();
                                        $profit = $winAmount - $totalBet;
                                        $sesionId = $sessionPlayer->player_uuid;
                                        $userPlayer = $userPlayer != null ? $userPlayer : $sessionPlayer;

                                        \Helper::generateGameHistory($userPlayer, $sesionId, $transaction, $profit > 0 ? 'win' : 'loss', $winAmount, $totalBet, $wallet, $profit, $gameName, $game->uuid, 'balance', 'originals', $agentId, $wallet);

                                        $lastid = AztecSpinLogs::latest()->first()->uuid;
                                        if (!$freeMode && $forceScatter) {
                                            $ssData->parent_id = $lastid;
                                        }
                                        if ($newFreeSpin == 0) {
                                            $ssData->parent_id = 0;
                                            $ssData->free_spin_index = 0;
                                            $ssData->freespin = 0;
                                            // $ssData->multiple_list = "reset"; //Debug reset multiple
                                        }
                                        if ($parentId != 0 && $freeMode) {
                                            $recordFree = AztecSpinLogs::where('uuid', $parentId)->first();
                                            $dropNormal = $spinLogs->drop_normal;
                                            $dropFeature = $recordFree->drop_feature;
                                            $dropFeature = $dropFeature + $dropNormal;

                                            $winAmountOld = $spinLogs->win_amount;
                                            $winAmountNew = $recordFree->win_amount;
                                            $winAmount = $winAmountOld + $winAmountNew;
                                            AztecSpinLogs::where('uuid', $parentId)->update(['win_amount' => $winAmount]);
                                        }
                                        $ssData->multiple_list = json_decode($MultipleList);
                                        $ssData->free_mode = $freeMode;
                                        $ssData->bet_size = $betSize;
                                        $sessionData = json_encode($ssData);
                                        $sessionPlayer->credit = $wallet;
                                        $sessionPlayer->return_feature = $rtpFeature;
                                        $sessionPlayer->return_normal = $rtpNormal;
                                        $sessionPlayer->nextrun_feature = $nextRunFeature;
                                        $sessionPlayer->session_data = $ssData;
                                        $sessionPlayer->save();

                                        // ########## Swap Symbol On Reel
                                        // $currTime1 = \Carbon\Carbon::now();

                                        // $currTime = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $currTime1, 'UTC');
                                        // $syncTime = $currTime->addSeconds($ssData->time_diff);
                                        // $syncTime = $currTime;
                                        // $syncStr = $syncTime->format('YmdHis');
                                        // $syncStrSubSecond = substr($syncStr, 0, -2);

                                        // $slotIcons = $pull->SlotIcons;
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

                                        // SlotgenAztec::array_swap($slotIcons, $number1 % 9, $number2 % 9);
                                        // SlotgenAztec::array_swap($slotIcons, $number3 % 9, $number4 % 9);
                                        // $pull->SlotIcons = $slotIcons;
                                        // ##############

                                        $resData = [
                                            'credit' => (float) number_format($wallet, 2, '.', ''),
                                            'credit_old' => (float) number_format($wallet - $winAmount, 2, '.', ''),
                                            'freemode' => $freeMode,
                                            'jackpot' => 0,
                                            'free_spin' => $freeSpin,
                                            'free_num' => $newFreeSpin,
                                            'scaler' => 0,
                                            'num_line' => $baseBet,
                                            'bet_size' => $betSize,
                                            'bet_amount' => $totalBet,
                                            'file_name' => $fileName,
                                            'line_index' => $lineIndex,
                                            'system_rtp' => $SYSTEM_RTP,
                                            'SHARE_FEATURE' => $SHARE_FEATURE,
                                            'nextrun_feature' => number_format($rtpFeature, 2, '.', ''),
                                            'return_normal' => number_format($rtpNormal, 2, '.', ''),
                                            'pull' => $pull,
                                            'max_bet' => isset($Agent->max_bet) ? $Agent->max_bet : $MAX_BET,
                                            'min_bet' => isset($Agent->min_bet) ? $Agent->min_bet : 0
                                        ];
                                        if (isset($pull->expand_field)) {
                                            $resData = (object) array_merge((array) $resData, (array) $pull->expand_field);
                                        }

                                        return $this->sendResponse($resData, 'action');
                                    }
                                } catch (\Exception $e) {
                                    // Handle the exception
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
                                            $hash = md5("Amount=$totalBet&GameId=$gameId&Language=$language&OperatorId=$operatorId&PlayerId=$userNameAgentNew&ReferenceId=$transaction&RoundId=$parentId&Timestamp=$timestamp&Token=$operatorId$secretKey");

                                            $data = [
                                                // 'action' => 'load_wallet',
                                                // 'user_name' => $userNameAgentNew,
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
                                            $agentcyRes = $core->sendCurl($data, $apiGetResult);
                                        } else {
                                            $wallet = $seamless->updateWallet($userPlayer, $wallet);
                                        }
                                    }
                                    if ($USE_SEAMLESS) {
                                        $apiGetResult = $apiAgent . '/refund';
                                        $gameId = $game->id;
                                        $language = $lang;
                                        $timestamp  = time();
                                        $winAmount = 0;
                                        // $timestamp  = 1735790069;
                                        // $transaction = "67760df5d2d04";
                                        // $hash = md5("OperatorId=$operatorId&PlayerId=$userNameAgentNew$secretKey");
                                        // $hash = md5("Amount=$totalBet&GameId=$gameId&Language=$language&OperatorId=$operatorId&PlayerId=$userNameAgentNew&ReferenceId=$transaction&
                                        //         RoundId=$parentId&Timestamp=$timestamp&Token=$operatorId$secretKey");
                                        $hash = md5("Amount=$winAmount&OperatorId=$operatorId&PlayerId=$userNameAgentNew&ReferenceId=$transaction&RoundId=$parentId$secretKey");

                                        $data = [
                                            // 'action' => 'load_wallet',
                                            // 'user_name' => $userNameAgentNew,
                                            'OperatorId' => $operatorId,
                                            'PlayerId' => $userNameAgentNew,
                                            'Hash' => $hash,
                                            'RoundId' => $parentId,
                                            'Amount' => $winAmount,
                                            'ReferenceId' => $transaction,
                                        ];
                                        $agentcyRes = $core->sendCurl($data, $apiGetResult);
                                    } else {
                                        $wallet = $seamless->updateWallet($userPlayer, $wallet);
                                    }
                                    return $this->sendError("(Refund:" . 'S3202UQLXTO20' . ')');
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
                $sort = ['spin_date' => 'DESC'];
                $isFreeSpin = false;
                if ($sessionPlayer) {
                    $search = [
                        'parent_id' => '0',
                        'player_id' => $sessionPlayer->uuid,
                    ];
                    $totalBet = (float) AztecSpinLogs::where($search)->whereBetween('created_at', [$from, $to])->sum('total_bet');
                    $totalWin = (float) AztecSpinLogs::where($search)->whereBetween('created_at', [$from, $to])->sum('win_amount');
                    $totalProfit = $totalWin - $totalBet;
                    $limit = 12;
                    $page = $page ? $page : 1;
                    $recorsPerPage = ($page - 1) * $limit;
                    $paginate = AztecSpinLogs::where($search)->whereBetween('created_at', [$from, $to])
                        ->orderBy('created_at', 'desc')
                        ->select(
                            'balance',
                            'betamount',
                            'credit_line',
                            'drop_feature',
                            'drop_normal',
                            'free_num',
                            'uuid',
                            'id',
                            'multipy',
                            'created_at',
                            'total_bet',
                            'total_way',
                            'transaction_id',
                            'win_amount',
                            'parent_id'
                        )
                        ->paginate($limit);
                    $resData = [];
                    $items = [];
                    for ($i = 0; $i < count($paginate); $i++) {
                        // var_dump(json_encode($paginate[$i]));
                        $spinDate = date('m/d', strtotime($paginate[$i]['created_at']));
                        $spinHour = date('H:i:s', strtotime($paginate[$i]['created_at']));

                        $items[] = (object) [
                            'balance' => (float) number_format($paginate[$i]['balance'], 2, '.', ''),
                            'bet_amount' => (float) number_format($paginate[$i]['bet_amount'], 2, '.', ''),
                            'credit_line' => $paginate[$i]['credit_line'],
                            'drop_feature' => $paginate[$i]['drop_feature'],
                            'drop_normal' => $paginate[$i]['drop_normal'],
                            'free_num' => $paginate[$i]['free_num'],
                            'id' => $paginate[$i]['uuid'],
                            'multipy' => $paginate[$i]['multipy'],
                            'profit' => (float) number_format($paginate[$i]['win_amount'] - $paginate[$i]['total_bet'], 2, '.', ''),
                            'spin_date' => $spinDate,
                            'spin_hour' => $spinHour,
                            'transaction' => $paginate[$i]['transaction_id'],
                            'total_bet' => $paginate[$i]['total_bet'],
                            'total_way' => $paginate[$i]['total_way'],
                            'win_amount' => (float) number_format($paginate[$i]['win_amount'], 2, '.', ''),
                            'parent_id' => $paginate[$i]['parent_id'],
                        ];
                    }
                    $resData = [
                        'totalRecord' => $paginate->total(),
                        'totalPage' => $paginate->lastPage(),
                        'perPage' => $limit,
                        'currentPage' => $page,
                        'displayTotal' => $limit,
                        'totalBet' => $totalBet,
                        'totalWin' => (float) number_format($totalProfit, 2, '.', ''),
                        'totalProfit' => (float) number_format($totalProfit, 2, '.', ''),
                        'items' => $items,
                    ];

                    return $this->sendResponse($resData, 'action');
                } else {
                    $msg = 'session not found';
                }
            }
            if ($act === 'history_detail') {
                $sort = ['spin_date' => 'DESC'];
                $isFreeSpin = false;
                $request = $request->all();
                $uuid = $request['id'];
                $spinTitle = $history->normal_spin;
                if ($sessionPlayer) {
                    $resultDisplay = [];
                    $spinLogs = AztecSpinLogs::where('uuid', $uuid)->first();
                    $balance = (float) $spinLogs['balance'];
                    $betSize = $spinLogs['betamount'];
                    $betLevel = $spinLogs['credit_line'];
                    $dropFeature = $spinLogs['drop_feature'];
                    $dropNormal = $spinLogs['drop_normal'];
                    $freeNum = $spinLogs['free_num'];
                    $uuid = $spinLogs['uuid'];
                    $mutipy = $spinLogs['multipy'];
                    $profit = $spinLogs['win_amount'] - $spinLogs['betamount'];
                    $spinDate = date('Y/m/d', strtotime($spinLogs['created_at']));
                    $spinHour = date('H:i', strtotime($spinLogs['created_at']));
                    $totalBet = $spinLogs['total_bet'];
                    $totalWay = $spinLogs['total_way'];
                    $transaction = $spinLogs['transaction_id'];
                    $winAmount = (float) $spinLogs['win_amount'];
                    $iconData = $spinLogs['icon_data'];
                    $dropLineData = json_decode($spinLogs['drop_line']);
                    $transaction = $spinLogs['transaction_id'];
                    $multiList = json_decode($spinLogs['multiple_list']);
                    $totalWin = $spinLogs['first_drop'];
                    $activeLines = json_decode($spinLogs['active_lines']);

                    $numDrop = ! empty($dropLineData) ? count($dropLineData) : 0;
                    $spinTitle = $history->normal_spin;
                    $totalRound = $numDrop + 1;
                    $roundName = $numDrop > 0 ? "Round 1/{$totalRound}" : '';
                    $profit = $totalWin - $totalBet;
                    // $balance = $balance - $totalBet + $totalWin;
                    $icons = $gameData->icons;
                    $reelData = [];
                    $topReel = [];
                    $specialIcons = [];
                    for ($i = 0; $i < count($icons); $i++) {
                        if ($icons[$i]['type'] == 3 || $icons[$i]['type'] == 5) {
                            $specialIcons[] = $icons[$i]['name'];
                        }
                    }
                    $playerProfit = $winAmount - $totalBet;
                    $i = 0;
                    $rowNum = 6;
                    $colNum = 6;
                    $hasTopCol = true;
                    $rowStart = $hasTopCol ? 1 : 0;
                    $iconData = json_decode($iconData);
                    $icons = $gameData->icons;
                    if ($hasTopCol) {
                        for ($c = 0; $c < $colNum; $c++) {
                            $topReel[] = $iconData[$i];
                            $i++;
                        }
                    }
                    for ($r = $rowStart; $r < $rowNum; $r++) {
                        for ($c = 0; $c < $colNum; $c++) {
                            if (! isset($reelData[$c])) {
                                $reelData[$c] = [];
                            }
                            $rIndex = $hasTopCol ? $r - 1 : $r;
                            $reelData[$c][$rIndex] = $iconData[$i];
                            $i++;
                        }
                    }

                    $resultDisplay[] = (object) [
                        'transaction' => $transaction,
                        'spin_title' => $spinTitle,
                        'round_name' => $roundName,
                        'bet_size' => $betSize,
                        'bet_level' => $betLevel,
                        'total_way' => $totalWay,
                        'win_amount' => (float) number_format($totalWin, 2, '.', ''),
                        'total_bet' => (float) number_format($totalBet, 2, '.', ''),
                        'balance' => (float) number_format($balance, 2, '.', ''),
                        'profit' => (float) number_format($profit, 2, '.', ''),
                        'top_reel' => $topReel,
                        'reel_data' => $reelData,
                        'active_lines' => $activeLines,
                        'multi_list' => $multiList,
                    ];

                    $roundNum = 1;
                    //slide history_detail
                    $dropLine = $dropLineData;
                    foreach ($dropLine as $item) {
                        $roundNum++;
                        $drop = (object) $item;
                        $iconData = $drop->SlotIcons;
                        $reelData = [];
                        $topReel = [];
                        $i = 0;
                        $rowStart = $hasTopCol ? 1 : 0;
                        if ($hasTopCol) {
                            for ($c = 0; $c < $colNum; $c++) {
                                $topReel[] = $iconData[$i];
                                $i++;
                            }
                        }
                        for ($r = $rowStart; $r < $rowNum; $r++) {
                            for ($c = 0; $c < $colNum; $c++) {
                                if (! isset($reelData[$c])) {
                                    $reelData[$c] = [];
                                }
                                $rIndex = $hasTopCol ? $r - 1 : $r;
                                $reelData[$c][$rIndex] = $iconData[$i];
                                $i++;
                            }
                        }
                        $roundName = "Round {$roundNum}/{$totalRound}";
                        $totalBet = 0;
                        $totalWin = $drop->WinOnDrop;
                        $profit = $totalWin - $totalBet;
                        // $balance = $balance - $totalBet + $totalWin;
                        $resultDisplay[] = (object) [
                            'transaction' => $transaction,
                            'spin_title' => $spinTitle,
                            'round_name' => $roundName,
                            'bet_size' => $betSize,
                            'bet_level' => $betLevel,
                            'total_way' => $drop->TotalWay,
                            'win_amount' => (float) number_format($totalWin, 2, '.', ''),
                            'total_bet' => (float) number_format($totalBet, 2, '.', ''),
                            'balance' => (float) number_format($balance, 2, '.', ''),
                            'profit' => (float) number_format($profit, 2, '.', ''),
                            'top_reel' => $topReel,
                            'reel_data' => $reelData,
                            'active_lines' => $drop->ActiveLines,
                            'multi_list' => $multiList,
                        ];
                    }
                    $items = [];
                    $hasFreeSpin = true;
                    if ($hasFreeSpin) {
                        $items = AztecSpinLogs::where('parent_id', $uuid)->get();
                        $totalFreeSpin = count($items);
                        $countFreeSpin = 0;
                        foreach ($items as $item) {
                            $countFreeSpin++;
                            $sub = (object) $item;
                            $balanceBefore = number_format($sub->balance, 2);
                            $iconData = json_decode($sub->icon_data);
                            $reelData = [];
                            $topReel = [];
                            $i = 0;
                            $rowStart = $hasTopCol ? 1 : 0;
                            if ($hasTopCol) {
                                for ($c = 0; $c < $colNum; $c++) {
                                    $topReel[] = $iconData[$i];
                                    $i++;
                                }
                            }
                            for ($r = $rowStart; $r < $rowNum; $r++) {
                                for ($c = 0; $c < $colNum; $c++) {
                                    if (! isset($reelData[$c])) {
                                        $reelData[$c] = [];
                                    }
                                    $rIndex = $hasTopCol ? $r - 1 : $r;
                                    $reelData[$c][$rIndex] = $iconData[$i];
                                    $i++;
                                }
                            }
                            $dropLine = json_decode($sub->drop_line);
                            $betSize = (float) $sub->betamount;
                            $betLevel = (int) $sub->credit_line;
                            $totalBet = $sub->total_bet;
                            $numDrop = isset($sub->drop_line) ? count($dropLine) : 0;
                            $multiList = $sub->multiple_list;
                            $spinTitle = "$history->free_spin_total {$countFreeSpin}/{$totalFreeSpin}";
                            $totalRound = $numDrop + 1;
                            $roundName = $numDrop > 0 ? "Round 1/{$totalRound}" : '';
                            $transaction = $sub->transaction_id;
                            $totalBet = $sub->total_bet;
                            $totalWin = $sub->first_drop;
                            $profit = $totalWin - $totalBet;
                            // $balance = $balance - $totalBet + $totalWin;
                            $resultDisplay[] = (object) [
                                'transaction' => $transaction,
                                'spin_title' => $spinTitle,
                                'round_name' => $roundName,
                                'bet_size' => $betSize,
                                'bet_level' => $betLevel,
                                'total_way' => $sub->total_way,
                                'win_amount' => (float) number_format($totalWin, 2, '.', ''),
                                'total_bet' => (float) number_format($totalBet, 2, '.', ''),
                                'profit' => (float) number_format($profit, 2, '.', ''),
                                'balance' => (float) number_format($balance, 2, '.', ''),
                                'top_reel' => $topReel,
                                'reel_data' => $reelData,
                                'active_lines' => json_decode($sub->active_lines),
                                'multi_list' => $multiList,
                            ];

                            $roundNum = 1;
                            foreach ($dropLine as $item) {
                                $roundNum++;
                                $drop = (object) $item;
                                $iconData = $drop->SlotIcons;
                                $reelData = [];
                                $topReel = [];
                                $i = 0;
                                $rowStart = $hasTopCol ? 1 : 0;
                                if ($hasTopCol) {
                                    for ($c = 0; $c < $colNum; $c++) {
                                        $topReel[] = $iconData[$i];
                                        $i++;
                                    }
                                }
                                for ($r = $rowStart; $r < $rowNum; $r++) {
                                    for ($c = 0; $c < $colNum; $c++) {
                                        if (! isset($reelData[$c])) {
                                            $reelData[$c] = [];
                                        }
                                        $rIndex = $hasTopCol ? $r - 1 : $r;
                                        $reelData[$c][$rIndex] = $iconData[$i];
                                        $i++;
                                    }
                                }
                                $roundName = "Round {$roundNum}/{$totalRound}";
                                $totalBet = 0;
                                $totalWin = $drop->WinOnDrop;
                                $profit = $totalWin - $totalBet;
                                // $balance = $balance - $totalBet + $totalWin;
                                $resultDisplay[] = (object) [
                                    'transaction' => $transaction,
                                    'spin_title' => $spinTitle,
                                    'round_name' => $roundName,
                                    'bet_size' => $betSize,
                                    'bet_level' => $betLevel,
                                    'total_way' => $drop->TotalWay,
                                    'win_amount' => (float) number_format($totalWin, 2, '.', ''),
                                    'total_bet' => (float) number_format($totalBet, 2, '.', ''),
                                    'profit' => (float) number_format($profit, 2, '.', ''),
                                    'balance' => (float) number_format($balance, 2, '.', ''),
                                    'top_reel' => $topReel,
                                    'reel_data' => $reelData,
                                    'active_lines' => $drop->ActiveLines,
                                    'multi_list' => $multiList,
                                ];
                            }
                        }

                        // $resultDisplayNew = [$resultDisplay[0],$resultDisplay[count($resultDisplay)-1]];

                        $resData = (object) [
                            'has_feature' => $hasFreeSpin,
                            'spin_date' => $spinDate,
                            'spin_hour' => $spinHour,
                            'transaction' => $transaction,
                            'total_bet' => (float) number_format($totalBet, 2, '.', ''),
                            'total_win' => (float) number_format($totalWin, 2, '.', ''),
                            'free_num' => $freeNum,
                            'multipy' => $mutipy,
                            'credit_line' => (float) number_format($betLevel, 2, '.', ''),
                            'profit' => (float) number_format($playerProfit, 2, '.', ''),
                            'balance' => (float) number_format($balance, 2, '.', ''),
                            'result_data' => $resultDisplay,
                            'special_symbols' => $specialIcons,
                            // 'multi_list'        => $log->multiple_list,
                        ];
                    }

                    return $this->sendResponse($resData, 'action');
                } else {
                    $msg = 'session not found';
                }
            }
            if ($act === 'buy') {
                $betamount = isset($p->betamount) ? $p->betamount : null;
                $cpl = isset($p->cpl) ? $p->cpl : null;
                if ($sessionPlayer) {
                    $ssData = (object) $sessionPlayer->session_data;
                    $userName = $sessionPlayer->user_name;
                    $wallet = $sessionPlayer->credit;
                    $nextRunFeature = $sessionPlayer->nextrun_feature;
                    $sRtpNormal = $sessionPlayer->return_normal;
                    $sRtpFeature = $sessionPlayer->return_feature;
                    $nextRunFeature = isset($nextRunFeature) ? $nextRunFeature : 0;
                    $numFreeSpin = isset($ssData->freespin) ? $ssData->freespin : 0;
                    $isContinuous = isset($ssData->multiply_continuous) ? $ssData->multiply_continuous : 0;
                    $prevMultiply = isset($ssData->last_multiply) ? $ssData->last_multiply : 0;
                    $freeMode = $numFreeSpin > 0 || $numFreeSpin == -1;
                    $dataType = $freeMode ? 'feature' : 'normal';
                    $freeSpinindex = $freeMode ? $ssData->free_spin_index : 0;
                    if ($freeSpinindex > 0) {
                        $dataType = "feature_$freeSpinindex";
                    }

                    $spinData = GameController::spinConfig($path, $dataType);
                    if ($gameData && $gameRule && $spinData) {
                        $baseBet = $ssData->base_bet;
                        if ($betamount && $cpl) {
                            $betSize = (float) $betamount;
                            $betLevel = (float) $cpl;
                            $ssData->betamount = $betSize;
                            $ssData->cpl = $betLevel;
                            $buyFeature = isset($adjustRatio->value_buy_feature) ? $adjustRatio->value_buy_feature : $gameData->buy_feature;
                            $totalBet = $freeMode ? 0 : $baseBet * $betSize * $betLevel * $buyFeature;;
                            $ajustRatio = $betSize * $betLevel;
                            $transaction = uniqid();
                            $gameName = "Aztec";
                            $game = Game::where('name', $gameName)->first();
                            $agentIdNew = $agentId + 1;
                            $AgentConfig = Agent::where('id', $agentIdNew)->first();
                            $MAX_BET = isset($AgentConfig->max_bet) ? $AgentConfig->max_bet : $MAX_BET;
                            $MAX_BET = isset($Agent->max_bet) ? $Agent->max_bet : $MAX_BET;
                            $MIN_BET = isset($Agent->min_bet) ? $Agent->min_bet : 0;
                            // $Agent = ConfigAgent::where('game_name', $gameName)->where('agent_id', $agentIdNew)->first();
                            // $MAX_BET = $ssData->max_bet == 0 ? $MAX_BET : $ssData->max_bet;
                            // $MAX_BET = isset($Agent->max_bet) ? $Agent->max_bet : $MAX_BET;
                            // $MIN_BET = isset($Agent->min_bet) ? $Agent->min_bet : 0;

                            if ($wallet >= $totalBet && $totalBet <= $MAX_BET && $totalBet >= $MIN_BET || $freeMode) {
                                $wallet = $wallet - $totalBet;

                                if ($userPlayer) {
                                    if ($USE_SEAMLESS) {
                                        $data = [
                                            'action' => 'deduct',
                                            'user_name' => $userNameAgentNew,
                                            'amount' => $totalBet,
                                            'transaction' => $transaction,
                                            'game_code' => $game->uuid,
                                            'game_name' => $gameName
                                        ];
                                        $agentcyRes = $core->sendCurl($data, $apiAgent);
                                    } else {
                                        $wallet = $seamless->updateWallet($userPlayer, $wallet);
                                    }
                                }
                                //***********************

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
                                    // $featureRatio = 100;
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

                                // ############ calculate Jackpot
                                // ####### JACKPOT CONFIG ###################
                                $JACKPOT__RETURN_VALUE_RATIO = $adjustRatio->jackpot_return_value_ratio;
                                $JACKPOT = $adjustRatio->jackpot_value;
                                $JACKPOT_WIN_RATIO = $adjustRatio->jackpot_win_ratio;

                                // ####### ####### ###################

                                $returnSystem = $totalBet - $returnBet;
                                $returnJackpot = number_format($returnSystem * $JACKPOT__RETURN_VALUE_RATIO / 100, 3, '.', '');
                                // var_dump($JACKPOT);
                                $JACKPOT = $JACKPOT + $returnJackpot;
                                // var_dump($JACKPOT);

                                $number = range(0, $JACKPOT_WIN_RATIO);
                                shuffle($number);
                                $randArrJackpot = rand(0, count($number) - 1);
                                $randNumberJackpot = $number[$randArrJackpot];
                                $checkJackpot = false;
                                if ($randNumberJackpot == 1 && $JACKPOT >= $totalBet) {
                                    $checkJackpot = true;
                                }
                                if ($checkJackpot) {
                                    $rtpNormal = $rtpNormal + $totalBet;
                                    $JACKPOT = $JACKPOT - $totalBet;
                                }
                                // #######################

                                $adjustRatio->jackpot_value = $JACKPOT;
                                $adjustRatio->save();

                                $forceScatter = true; //Debug only
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

                                            // $maxWin = 100;
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

                                        if ($forceData) {
                                            // GAME GENERATE MAX_WIN VALUE ################################
                                            $maxWin = $USE_RTP ? $rtpNormal / $ajustRatio : $spinItem->win;
                                            $maxWin = $maxWin > 0 ? $maxWin : 0;
                                            $winData = [];
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
                                            for ($i = 0; $i < count($spinData); $i++) {
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

                                // var_dump($fileName);
                                // $fileName = "slotgen_win_200_data.txt";
                                // $lineIndex = 1;
                                $pull = GameController::spinConfigData($path, $fileName, $lineIndex, $dataType);
                                if ($pull) {
                                    // Ajust betsize & level ratio (basic data is 1:1)
                                    // $bonusRatio = $freeMode ? 10 : 1; // x10 in feature mode
                                    // $ajustRatio = $ajustRatio * $bonusRatio;
                                    $pull->WinAmount = (float) number_format($pull->WinAmount * $ajustRatio, 2, '.', '');
                                    $pull->WinOnDrop = (float) number_format($pull->WinOnDrop * $ajustRatio, 2, '.', '');
                                    for ($i = 0; $i < count($pull->ActiveLines); $i++) {
                                        $pull->ActiveLines[$i]->win_amount = (float) number_format($pull->ActiveLines[$i]->win_amount * $ajustRatio, 2, '.', '');
                                    }
                                    for ($i = 0; $i < count($pull->DropLineData); $i++) {
                                        $pull->DropLineData[$i]->WinOnDrop = (float) number_format($pull->DropLineData[$i]->WinOnDrop * $ajustRatio, 2, '.', '');
                                        for ($j = 0; $j < count($pull->DropLineData[$i]->ActiveLines); $j++) {
                                            $pull->DropLineData[$i]->ActiveLines[$j]->win_amount = (float) number_format($pull->DropLineData[$i]->ActiveLines[$j]->win_amount * $ajustRatio, 2, '.', '');
                                        }
                                    }
                                    $winAmount = $pull->WinAmount;
                                    $wallet = $wallet + $winAmount;
                                    if ($userPlayer) {
                                        if ($USE_SEAMLESS) {
                                            $data = [
                                                'action' => 'settle',
                                                'user_name' => $userNameAgentNew,
                                                'amount' => $winAmount,
                                                'transaction' => $transaction,
                                                'game_code' => $game->uuid,
                                                'game_name' => $gameName
                                            ];
                                            $agentcyRes = $core->sendCurl($data, $apiAgent);
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

                                    $newFreeSpin = $pull->FreeSpin;
                                    $ssData->freespin = $newFreeSpin;
                                    $freeSpin = $newFreeSpin > 0 || $newFreeSpin == -1 ? 1 : 0;
                                    if ($freeMode && $newFreeSpin == 0) {
                                        $ssData->last_multiply = 0;
                                    }

                                    $newFreeSpin = $newFreeSpin != -1 ? $newFreeSpin : 1;
                                    $WinLogs = implode("\n", $pull->WinLogs);
                                    $ActiveIcons = json_encode($pull->ActiveIcons);
                                    $ActiveLines = json_encode($pull->ActiveLines);
                                    $iconData = json_encode($pull->SlotIcons);
                                    $multiply = $pull->MultipyScatter;
                                    $winLog = implode("\n", $pull->WinLogs);
                                    $dropLineData = json_encode($pull->DropLineData);
                                    $totalWay = $pull->TotalWay;
                                    $winOnDrop = $pull->WinOnDrop;
                                    $dropLine = $pull->DropLine;
                                    $dropFeature = 0;
                                    // $MultipleList = $forceScatter ? json_encode($ssData->multiple_list) : json_encode($pull->MultipleList);
                                    // $transaction = Str::random(14);
                                    $MultipleList = 0;
                                    $parentId = $ssData->parent_id ? $ssData->parent_id : 0;
                                    $spinLogs = new AztecSpinLogs;
                                    $data = [
                                        'free_num' => $newFreeSpin,
                                        'num_line' => $baseBet,
                                        'betamount' => $betSize,
                                        'balance' => $wallet,
                                        'credit_line' => $cpl,
                                        'total_bet' => $totalBet,
                                        'win_amount' => $winAmount,
                                        'active_icons' => $ActiveIcons,
                                        'active_lines' => $ActiveLines,
                                        'icon_data' => $iconData,
                                        'spin_ip' => 1,
                                        'multipy' => $multiply,
                                        'win_log' => $winLog,
                                        'transaction_id' => $transaction,
                                        'drop_line' => $dropLineData,
                                        'total_way' => $totalWay,
                                        'first_drop' => $winOnDrop,
                                        'is_free_spin' => $freeMode,
                                        'parent_id' => $parentId,
                                        'drop_normal' => $dropLine,
                                        'drop_feature' => 0,
                                        'mini_win' => 'mini_win',
                                        'mini_result' => 'mini_result',
                                        'multiple_list' => $MultipleList,
                                        'player_id' => $sessionPlayer->uuid,
                                    ];
                                    $spinLogs->fill($data);
                                    $spinLogs->save();

                                    $gameName = "Aztec";
                                    $game = Game::where('name', $gameName)->first();
                                    $profit = $winAmount - $totalBet;
                                    $sesionId = $sessionPlayer->player_uuid;
                                    $userPlayer = $userPlayer != null ? $userPlayer : $sessionPlayer;

                                    \Helper::generateGameHistory($userPlayer, $sesionId, $transaction, $profit > 0 ? 'win' : 'loss', $winAmount, $totalBet, $wallet, $profit, $gameName, $game->uuid, 'balance', 'originals', $agentId, $wallet);

                                    $lastid = AztecSpinLogs::latest()->first()->uuid;
                                    if (!$freeMode && $forceScatter) {
                                        $ssData->parent_id = $lastid;
                                    }
                                    if ($newFreeSpin == 0) {
                                        $ssData->parent_id = 0;
                                        $ssData->free_spin_index = 0;
                                        $ssData->freespin = 0;
                                        // $ssData->multiple_list = "reset"; //Debug reset multiple
                                    }
                                    if ($parentId != 0 && $freeMode) {
                                        $recordFree = AztecSpinLogs::where('uuid', $parentId)->first();
                                        $dropNormal = $spinLogs->drop_normal;
                                        $dropFeature = $recordFree->drop_feature;
                                        $dropFeature = $dropFeature + $dropNormal;

                                        $winAmountOld = $spinLogs->win_amount;
                                        $winAmountNew = $recordFree->win_amount;
                                        $winAmount = $winAmountOld + $winAmountNew;
                                        AztecSpinLogs::where('uuid', $parentId)->update(['win_amount' => $winAmount]);
                                    }
                                    $ssData->multiple_list = json_decode($MultipleList);
                                    $ssData->free_mode = $freeMode;
                                    $ssData->bet_size = $betSize;
                                    $sessionData = json_encode($ssData);
                                    $sessionPlayer->credit = $wallet;
                                    $sessionPlayer->return_feature = $rtpFeature;
                                    $sessionPlayer->return_normal = $rtpNormal;
                                    $sessionPlayer->nextrun_feature = $nextRunFeature;
                                    $sessionPlayer->session_data = $ssData;
                                    $sessionPlayer->save();

                                    // ########## Swap Symbol On Reel
                                    // $currTime1 = \Carbon\Carbon::now();

                                    // $currTime = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $currTime1, 'UTC');
                                    // $syncTime = $currTime->addSeconds($ssData->time_diff);
                                    // $syncTime = $currTime;
                                    // $syncStr = $syncTime->format('YmdHis');
                                    // $syncStrSubSecond = substr($syncStr, 0, -2);

                                    // $slotIcons = $pull->SlotIcons;
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

                                    // SlotgenAztec::array_swap($slotIcons, $number1 % 9, $number2 % 9);
                                    // SlotgenAztec::array_swap($slotIcons, $number3 % 9, $number4 % 9);
                                    // $pull->SlotIcons = $slotIcons;
                                    // ##############

                                    $resData = [
                                        'credit' => (float) number_format($wallet, 2, '.', ''),
                                        'credit_old' => (float) number_format($wallet - $winAmount, 2, '.', ''),
                                        'freemode' => $freeMode,
                                        'jackpot' => 0,
                                        'free_spin' => $freeSpin,
                                        'free_num' => $newFreeSpin,
                                        'scaler' => 0,
                                        'num_line' => $baseBet,
                                        'bet_size' => $betSize,
                                        'bet_amount' => $totalBet,
                                        'file_name' => $fileName,
                                        'line_index' => $lineIndex,
                                        'system_rtp' => $SYSTEM_RTP,
                                        'SHARE_FEATURE' => $SHARE_FEATURE,
                                        'nextrun_feature' => number_format($rtpFeature, 2, '.', ''),
                                        'return_normal' => number_format($rtpNormal, 2, '.', ''),
                                        'pull' => $pull,
                                    ];
                                    if (isset($pull->expand_field)) {
                                        $resData = (object) array_merge((array) $resData, (array) $pull->expand_field);
                                    }

                                    return $this->sendResponse($resData, 'action');
                                }
                            } else {
                                $LogError = \Illuminate\Support\Str::random(13);

                                return $this->sendError($errorMess->Insufficient_balance . "($errorMess->Error_Code:" . 'S3202UQLXTO20' . ')');
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
        // dd($folderPath);
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
        $playerId = AztecPlayer::where('player_uuid', $playerId)->first();

        return $playerId;
    }
}
