<?php

namespace Slotgen\SlotgenFortuneDragon\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Slotgen\SlotgenFortuneDragon\Models\FortuneDragonSpinLogs;

class SimulateSpinlog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'simulate:FortuneDragon {--betSize=} {--betLevel=}';
    // php artisan simulate:FortuneDragon  --betSize=1 --betLevel=1

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
        $apiController = app(\Slotgen\SlotgenFortuneDragon\Http\Controllers\Api\GameController::class);
        $request = ['betSize' => $betSize, 'betLevel' => $betLevel, 'action' => 'spin'];

        $data = [];
        $player = [];
        $launchData = \Slotgen\SlotgenFortuneDragon\SlotgenFortuneDragon::checkPlayer($player, $data);
        $launchGameRes = (object) \Slotgen\SlotgenFortuneDragon\SlotgenFortuneDragon::LaunchGame($launchData);

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
            $countFile = FortuneDragonSpinLogs::where('player_id', $token)
                ->select('rtp_key', FortuneDragonSpinLogs::raw('count(*) as total'))
                ->groupBy('rtp_key')
                ->get();
            Log::debug(json_encode($countFile));
        } else {
            $this->info('false');
        }
        $this->info("success.betSize : $betSize, betLevel:$betLevel");
    }
}
