<?php

namespace Slotgen\SpaceMan\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Slotgen\SpaceMan\Http\Controllers\Api\GameController;
use Slotgen\SpaceMan\Models\SpaceManPlayer;
use Slotgen\SpaceMan\Models\SimulateSpin;
use Illuminate\Support\Facades\Log;
use File;

class RtpSimulateQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $data;
    private $authTokenName;
    private $useFreeSpinEntry;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->authTokenName = config('slotgen.core.game.auth.token', 'X-Ncash-token');
        $this->useFreeSpinEntry = false;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->data;
        if ($data) {
            // Log::info("RtpSimulateQueue [{$data->simulate_id}] start >>>");
            // {{"uuid":"7bc65192-701c-4e1c-b59b-1641902f2dd3"}
            $simulate = SimulateSpin::find($data->simulate_id);
            $selectFeature = isset($data->feature_select) ? $data->feature_select : 0;
            if ($simulate) {
                $spinCount = $simulate->total_spin;
                $simulateType = $data->simulate_type;
                $isFeature = $simulateType == SimulateSpin::TYPE_FEATURE;
                // $game = Game::where('uuid', $data->game_id)->first();
                // if ($game) {
                // Log::debug($game);
                $apiController = app(GameController::class);



                $res = $apiController->gameAction($data->request);
                $json = json_decode(json_encode($res),true);
                $spin = $json['original'];
                // $totalWin = $simulate->total_win;


                // success":true,"data":{"credit":4999.6,"freemode":false,"jackpot":0,"free_spin":0,"free_num":0,"scaler":0,"num_line":20,"bet_amount":0.01,"pull":{"WinAmount":0,"WinOnDrop":0,"TotalWay":11250,"FreeSpin":0,"LastMultiply":0,"WildFixedIcons":[],"HasJackpot":false,"HasScatter":false,"CountScatter":0,"WildColumIcon":"","MultipyScatter":0,"MultiplyCount":1,"SlotIcons":[...],"ActiveIcons":[],"ActiveLines":[],"WinLogs":["[BET] betLevel: 0.01, betSize:1, baseBet:20.00 => 0.2"],"DropLine":0,"DropLineData":[],"MultipleList":[1,2,3,4,5,6,7,8,9,10,11,12,13]}},"message":"Spin success"}  
                if ($spin['success']) {
                    $simulate->total_spin = $spinCount + 1;
                    $sdata = (object)$spin['data'];
                    $freeSpinWin = $sdata->freespin_win;
                    $freeMode = $sdata->free_mode;
                    $freeNum = $sdata->free_num;
                    $winAmount = (float) $sdata->win_amount;
                    Log::debug("###################");
                    Log::debug($winAmount);
                    // $resData = $sdata->pull;
                    
                    // Extend root response
                    // if (isset($sdata->feature_symbol)) {
                    //     $resData->expand_field = (object) [
                    //         'feature_symbol'=> $sdata->feature_symbol
                    //     ];
                    // }
                    // $totalWin =  $totalWin + $winAmount;
                    // $simulate->total_win = $totalWin;
                    // $freeSpin = $sdata->free_num;
                    // $sdata->FreeSpin = $freeSpin;
                    // $freeMode = $sdata->freemode;
                    // Log::info('------------------------------------ FREE ['.$freeSpin.'] ------------------------------------ ');
                    // Log::info(json_encode($sdata));

                    $selectFeatureName = $selectFeature > 0 ? '_' . $selectFeature : '';
                    $simulateFolder = $freeSpinWin > 0 || $freeMode == true ? '_freespin' : '_normal';
                    Log::debug(json_encode($simulateFolder));
                    Log::debug("simulateFolder");
                    Log::debug(json_encode($sdata));
                    Log::debug(json_encode($freeSpinWin));
                    Log::debug(json_encode($freeMode));
                    $simulateFolder = $selectFeatureName . $simulateFolder;
                    // $simulateFolder = $simulateFolder . '_' . $data->game_id;
                    $exportPath = storage_path();
                    $entry_path = $exportPath . '/' . "Export_RTP_{$simulateFolder}__freespin_entry.txt";
                    $data_path = $exportPath . '/' . "Export_RTP_{$simulateFolder}__spin";
                    if (!File::exists($data_path)) {
                        if (!File::makeDirectory($data_path)) {
                            Log::debug('Create folder ' . $data_path . ' failed');
                        }
                    }
                    $fileNumber = $freeSpinWin > 0 || $freeMode == true ? $data->simulate_id : $winAmount;
                    // $fileNumber = $data->simulate_id;
                    $dataPath = $data_path . '/slotgen_win_' . $fileNumber . '_data.txt';
                    // File::append($dataPath, base64_encode(json_encode($resData))."\r\n");
                    // File::append($dataPath,json_encode($resData)."\r\n");
                    if ( $freeSpinWin > 0 || $freeMode == true ) {
                    // if ( $freeSpinWin > 0 || $freeMode == true ) { // Finish and dont write last line
                        // Log::info('------------------------------ TOTAL_WIN ['.$totalWin.'] --------------------------- ');
                        $simulate->is_finished = 1;
                        // $fileMd5 = md5($data->simulate_id);
                        File::append($dataPath, base64_encode(json_encode($sdata)) . "\r\n");
                        if ($freeNum == 0){   
                            $newPath = $data_path . '/slotgen_win_' . $freeSpinWin . '_data.txt';
                            Log::debug("data_path");
                            Log::debug($data_path);
                            // Log::debug("newPath");
                            // Log::debug($newPath);
                            if (File::exists($newPath)) {
                                File::delete($dataPath);
                            } else {
                                rename($dataPath, $newPath);
                                if ($this->useFreeSpinEntry) {
                                    $file = file($newPath);
                                    $output = $file[0];
                                    unset($file[0]);
                                    file_put_contents($newPath, $file);
                                    File::append($entry_path, $output);
                                }
                            }
                        }
                        
                        
                    Log::debug("data->simulate_id");
                    Log::debug($data->simulate_id);
                    } else {
                        File::append($dataPath, base64_encode(json_encode($sdata)) . "\r\n");
                        // File::append($dataPath,json_encode($resData)."\r\n"); //*** for DEBUG */
                    }
                }
                // }
                $simulate->save();
            } else {
                Log::debug('Simulate ' . $data->simulate_id . ' not found');
            }

            // Log::info("RtpSimulateQueue [{$data->uuid}] finished !!!");
        } else {
            Log::error("Empty data");
        }
    }
}
