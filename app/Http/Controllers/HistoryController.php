<?php

namespace app\Http\Controllers;

use App\Models\Game;
use App\Models\Order;
use App\Models\TupaiTransaction;
use App\Providers\RouteServiceProvider;
use Exception;
use File;
use Illuminate\Routing\Controller;

class HistoryController extends Controller {

    public $pragmaticGameCode = [
        'gatesofolympus',
        'pockerolympus',
        'gatesofatlantis',
        'marksmanprincess',
        'powerofolympus',
        'labubuland',
    ];

    public $pgsoftGameCode = [
        'fruityland',
        'mahjong_win',
        'fortunegod',
        'thekingriches',
        'fortuneneko',
        'doublephoenix',
        'archerobulleye',
        'sailinggold',
        'beachparty',
        'dumdumisland',
        'ilovebali',
        'alchemistpotion',
        'mexicanfiesta',
        'reelsteel',
        'dragonfury',
        'fancyrabbit',
    ];

    public function index($code) {

        //Get Transaction by HistoryCode
        /** @var TupaiTransaction $tupaiTransaction */
        $tupaiTransaction = TupaiTransaction::where(['history_code' => $code])->first();

        if (!$tupaiTransaction) {
            abort(404 , 'Transaction not Found');
        }
        
        $order = Order::where(['transaction_id' => $tupaiTransaction->round_id])->first() ?: null;

        if (!$order) {
            abort(404 , 'Transaction not Found');
        } else {
            if (in_array($tupaiTransaction->game_code, $this->pragmaticGameCode)) {
                //games based on pragmatic

                $gameUuid = $order->game_uuid;
                $games = Game::where("type", $gameUuid)->first();
                $class = $games->provider_service;
                // $nameClass = $class . $games->type . "\Models" . $games->type . "SpinLogs";
                $nameClass = "$class$games->type\Models\\$games->type" . "SpinLogs";
                $hisDetail = $nameClass::where('transaction_id', $order->transaction_id)->first() ?: null;

                $gamePrivateFolder = storage_path('app/private/'.$games->technology);
                $game_rule = File::get($gamePrivateFolder . '/ncashgame.json');
                $gameInfo = (object) json_decode($game_rule, true);
                $gameFolder = 'en/' . $gameInfo->game_folder;

                return view('history/pragmatic',['detail' => $hisDetail , 'game' => $games , 'class' => $nameClass , 'order' => $order , 'gameFolder' => $gameFolder]);

            } else if (in_array($tupaiTransaction->game_code, $this->pgsoftGameCode)) {
                // games based on pgsoft

                $gameUuid = $tupaiTransaction->game_code;

                /** @var Game $games */
                $games = Game::where("uuid", $gameUuid)->first();

                $class = $games->provider_service;
                $className = "$class$games->type\Models\\$games->type" . "SpinLogs";

                switch ($gameUuid) {
                    case 'thekingriches':
                    case 'mexicanfiesta':
                    case 'reelsteel':
                    case 'dragonfury':
                    case 'mahjong_win':
                    case 'archerobulleye':
                    case 'alchemistpotion':
                    case 'ilovebali':

                        //default
                        $path = storage_path('app/private/the_king_riches');

                        switch ($gameUuid) {
                            case 'thekingriches':
                                $path = storage_path('app/private/the_king_riches');
                                break;
                            case 'mexicanfiesta':
                                $path = storage_path('app/private/mexican_fiesta');
                                break;
                            case 'reelsteel':
                                $path = storage_path('app/private/reel_steel');
                                break;
                            case 'dragonfury':
                                $path = storage_path('app/private/dragon_fury');
                                break;
                            case 'mahjong_win':
                                $path = storage_path('app/private/mahjong_win');
                                break;
                            case 'archerobulleye':
                                $path = storage_path('app/private/archero_bulleye');
                                break;
                            case 'alchemistpotion':
                                $path = storage_path('app/private/alchemist_potion');
                                break;
                            case 'ilovebali':
                                $path = storage_path('app/private/i_love_bali');
                                break;
                        }

                        $game_file = file_get_contents($path . '/ncashgame.json');
                        $gameData = (object) json_decode($game_file, true);

                        $history = $className::where('transaction_id', $tupaiTransaction->round_id)->first();
                        if ($history) {
                            $history = $history->toArray();
                            $betSize = $history['betamount'];
                            $betLevel = (int) $history['credit_line'];
                            $historyChild = $className::where('parent_id', $history['uuid'])->get()->toArray();
                            $spinTitleFirst = 'Normal Spin';
                            for ($i = 0; $i < count($history['result_json']); $i++) {
                                $numberRound = $i + 1;
                                $totalRound = count($history['result_json']);
                                $roundTitle = $totalRound > 1 ? "Round : $numberRound/$totalRound" : '';
                                $history['result_json'][$i]['round_title'] = $roundTitle;
                                $history['result_json'][$i]['spin_title'] = $spinTitleFirst;
                            }
                            $betSize = $history['betamount'];
                            $betLevel = (int) $history['credit_line'];
                            $history = [$history];
                            for ($i = 0; $i < count($historyChild); $i++) {
                                $totalRound = count($historyChild[$i]['result_json']);
                                $numberDrop = $totalRound - 1;
                                $totalFreeSpin = $historyChild[$i]['result_json'][$numberDrop]['free_num'];
                                $numberFreeSpin = $i + 1;
                                // $totalFreeSpin = $historyChild[$i]['result_json'][0]['total_freespin'];
                                // $spinTitle = $historyChild[$i]['result_json'][0]['free_spin'] ? "Free Spin : $numberFreeSpin/$totalFreeSpin" : "Normal Spin";
                                $spinTitle = "Free Spin : $numberFreeSpin/$totalFreeSpin";
                                for ($j = 0; $j < count($historyChild[$i]['result_json']); $j++) {
                                    $numberRound = $j + 1;
                                    $roundTitle = "Round : $numberRound/$totalRound";
                                    $historyChild[$i]['result_json'][$j]['round_title'] = $roundTitle;
                                    $historyChild[$i]['result_json'][$j]['spin_title'] = $spinTitle;
                                }
                                $history[] = $historyChild[$i];
                            }

                            $resData = [
                                'game_folder' => $gameData->game_folder,
                                'res_data' => $history,
                                'bet_size' => $betSize,
                                'bet_level' => $betLevel,
                            ];

                            if ($gameUuid == 'reelsteel') {
                                $path = storage_path('app/private/reel_steel');

                                $game_file = file_get_contents($path . '/ncashgame.json');
                                $gameData = (object) json_decode($game_file, true);

                                $resData['game_name'] = 'reel_steel';
                                $resData['symbol_special_0'] = $gameData->special_symbol_0;
                                $resData['symbol_special_1'] = $gameData->special_symbol_1;
                                $resData['symbol_special'] = 'symbol_1:1:1';
                            } else if ($gameUuid == 'archerobulleye') {
                                $resData['game_name'] = 'legend';
                                $resData['symbol_special'] = 'symbol_1:1:1';
                            }

                            return view('history/' . $gameUuid, $resData);
                        } else {
                            abort(404, "History not found");
                        }
                        break;
                    case 'fruityland':
                    case 'fortunegod':
                    case 'fortuneneko':
                    case 'doublephoenix':
                    case 'dumdumisland':
                    case 'fancyrabbit':
                        //default
                        $path = storage_path('app/private/fruity_land');

                        switch ($gameUuid) {
                            case 'fruityland':
                                $path = storage_path('app/private/fruity_land');
                                break;
                            case 'fortunegod':
                                $path = storage_path('app/private/fortune_god');
                                break;
                            case 'fortuneneko':
                                $path = storage_path('app/private/fortune_neko');
                                break;
                            case 'doublephoenix':
                                $path = storage_path('app/private/double_phoenix');
                                break;
                            case 'dumdumisland':
                                $path = storage_path('app/private/dumdum_island');
                                break;
                            case 'fancyrabbit':
                                $path = storage_path('app/private/fancy_rabbit');
                                break;
                        }

                        $game_file = file_get_contents($path . '/ncashgame.json');
                        $gameData = (object) json_decode($game_file, true);

                        $spinLogs = $className::where('transaction_id', $tupaiTransaction->round_id)->first();

                        if ($spinLogs) {
                        
                            $spinTitle = 'Normal Spin';
                        
                            $resultDisplay = [];
                            
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

                            $numDrop = !empty($dropLineData) ? count($dropLineData) : 0;
                            $spinTitle = 'Normal Spin';
                            $totalRound = $numDrop + 1;
                            $roundName = $numDrop > 0 ? "Round 1/{$totalRound}" : '';
                            $profit = $totalWin - $totalBet;
                            $balance = $balance - $totalBet + $totalWin;
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
                            
                            
                            //default
                            $rowNum = 3;
                            $colNum = 3;
                            $hasTopCol = false;

                            switch ($gameUuid) {
                                case 'fortunegod':
                                case 'fortuneneko':
                                    $colNum = 3;
                                    break;
                                case 'doublephoenix':
                                case 'fruityland':
                                    $colNum = 5;
                                    break;
                                case 'dumdumisland':
                                    $colNum = 6;
                                    $rowNum = 6;
                                    $hasTopCol = true;
                                    break;
                                case 'fancyrabbit':
                                    $rowNum = 4;
                                    break;
                            }

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
                                    if (!isset($reelData[$c])) {
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
                                        if (!isset($reelData[$c])) {
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
                                $balance = $balance - $totalBet + $totalWin;
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

                            $resData = [
                            ];

                            if ($hasFreeSpin) {
                                $items = $className::where('parent_id', $spinLogs['uuid'])->get();
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
                                            if (!isset($reelData[$c])) {
                                                $reelData[$c] = [];
                                            }
                                            $rIndex = $hasTopCol ? $r - 1 : $r;
                                            $reelData[$c][$rIndex] = $iconData[$i];
                                            $i++;
                                        }
                                    }
                                    $dropLine = json_decode($sub->drop_line);
                                    $betSize = (float) $sub->bet_amount;
                                    $betLevel = (int) $sub->credit_line;
                                    $totalBet = $sub->total_bet;
                                    $numDrop = isset($sub->drop_line) ? count($dropLine) : 0;
                                    $multiList = $sub->multiple_list;
                                    $spinTitle = "Free Spin {$countFreeSpin}/{$totalFreeSpin}";
                                    $totalRound = $numDrop + 1;
                                    $roundName = $numDrop > 0 ? "Round 1/{$totalRound}" : '';
                                    $transaction = $sub->transaction_id;
                                    $totalBet = $sub->total_bet;
                                    $totalWin = $sub->first_drop;
                                    $profit = $totalWin - $totalBet;
                                    $balance = $balance - $totalBet + $totalWin;
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
                                                if (!isset($reelData[$c])) {
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
                                        $balance = $balance - $totalBet + $totalWin;
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

                                
                            }

                            $resData = [
                                'result' => [
                                    'game_folder' => $gameData->game_folder,
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
                                ],
                            ];

                            return view('history/' . $gameUuid, $resData);
                        } else {
                            abort(404, "History not found");
                        }

                        break;

                    case 'sailinggold':
                    case 'beachparty':
                        //default
                        $path = storage_path('app/private/sailing_gold');

                        switch ($gameUuid) {
                            case 'sailinggold':
                                $path = storage_path('app/private/sailing_gold');
                                break;
                            case 'beachparty':
                                $path = storage_path('app/private/beach_party');
                                break;
                        }

                        $game_file = file_get_contents($path . '/ncashgame.json');
                        $gameData = (object) json_decode($game_file, true);
                        
                        $history = $className::where('transaction_id', $tupaiTransaction->round_id)->first();
                        if ($history) {
                            $historyChild = $className::where('parent_id', $history['uuid'])->get();
                            $betSize = $history['betamount'];
                            $betLevel = (int) $history['credit_line'];
                            
                            $history = [$history];
                            for ($i = 0; $i < count($historyChild); $i++) {
                                $history[] = $historyChild[$i];
                            }

                            $resData = [
                                'result' => [
                                    'game_folder' => $gameData->game_folder,
                                    'res_data' => $history,
                                    'bet_size' => $betSize,
                                    'bet_level' => $betLevel,
                                ],
                            ];

                            return view('history/' . $gameUuid, $resData);
                        } else {
                            abort(404, "History not found");
                        }
                        break;                
                }

            } else {
                abort(500, "History coming soon");
            }
        }
    }

}