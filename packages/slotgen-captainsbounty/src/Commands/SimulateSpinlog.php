<?php

namespace Slotgen\SlotgenCaptainsBounty\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Slotgen\SlotgenCaptainsBounty\Models\CaptainsBountySpinLogs;

class SimulateSpinlog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'simulate:CaptainsBounty {--betSize=} {--betLevel=}';
    // php artisan simulate:CaptainsBounty  --betSize=1 --betLevel=1

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Log Data Report Spinlog';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $this->option('betSize');
        // $action = $this->argument('action');
        $betSize = $this->option('betSize') ? $this->option('betSize') : 1;
        $betLevel = $this->option('betLevel') ? $this->option('betLevel') : 1;
        //

        $myRequest = new Request;
        $apiController = app(\Slotgen\SlotgenCaptainsBounty\Http\Controllers\Api\GameController::class);
        $request = ['betSize' => $betSize, 'betLevel' => $betLevel, 'action' => 'spin'];

        $data = [];
        $player = [];
        $launchData = \Slotgen\SlotgenCaptainsBounty\SlotgenCaptainsBounty::checkPlayer($player, $data);
        $launchGameRes = (object) \Slotgen\SlotgenCaptainsBounty\SlotgenCaptainsBounty::LaunchGame($launchData);

        if ($launchGameRes->success) {
            $gameSession = (object) $launchGameRes->data;
            $token = $gameSession->session_id;
            $myRequest->replace(['betSize' => $betSize, 'betLevel' => $betLevel, 'action' => 'spin']);

            $count = 2;
            for ($i = 0; $i < $count; $i++) {

                $myRequest->headers->set('X-Ncash-token', $token);
                $simulateData = (object) [
                    'request' => $myRequest,
                ];
                $res = $apiController->gameAction($myRequest);
                $data = (object) $res['data'];
            }
            $countFile = CaptainsBountySpinLogs::where('player_id', $token)
                ->select('rtp_key', CaptainsBountySpinLogs::raw('count(*) as total'))
                ->groupBy('rtp_key')
                ->get();
            Log::debug(json_encode($countFile));
        } else {
            $this->info('false');
        }
        $this->info("success.betSize : $betSize, betLevel:$betLevel");
    }
}
