<?php

namespace Slotgen\SpaceMan\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Slotgen\SpaceMan\Http\Controllers\AppBaseController;
use Nhutcorp\SlotgenLaracore\Helpers\Common as CoreCommon;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use SlotgenLaracore;
use Nhutcorp\SlotgenLaracore\Models\Player;
use App\Repositories\SeamlessRepository;
use Nhutcorp\SlotgenLaracore\Models\Playergame;
use Slotgen\SpaceMan\Models\SpaceManPlayer;
use Illuminate\Support\Str;
use File;
use Slotgen\SpaceMan\SpaceMan;
use Slotgen\SpaceMan\Jobs\RtpSimulateQueue;
use Slotgen\SpaceMan\Models\SimulateSpin;

class SettingController extends AppBaseController
{
    private $authTokenName;
    private $playerRepository;
    private $simulateNormal;
    private $simulateFeature;
    private $location;
    private $gameName;
    private $locationPub;

    public function __construct()
    {
        $this->location = 'app/private';
        $this->gameName = 'brasil_gooool';
        $this->locationPub = 'uploads/games';
    }

    public function index()
    {
        $api_url = route('api.spaceman.v1.root');
        $gamePrivateFolder = storage_path('app/private/space_man');
        $gameFile = $gamePrivateFolder . '/game.json';
        $payoutFile = $gamePrivateFolder . '/payout.json';
        $reeFile = $gamePrivateFolder . '/reel.json';
        $game = null;
        $payouts = null;
        $reels = null;

        if (File::exists($gameFile) && File::exists($payoutFile) && File::exists($reeFile)) {
            $game = (object)json_decode(File::get($gameFile));
            $payouts = json_decode(File::get($payoutFile));
            $reels = json_decode(File::get($reeFile));
        }
        return view('slotgen-spaceman::backend.setting', compact('game', 'payouts', 'api_url', 'reels'));
    }

    public function initializeData()
    {
        $gamePrivateFolder = storage_path('app/private/space_man');
        $configGameFolder = __DIR__ . '/../../../../resources/games/config';

        if (!File::exists($gamePrivateFolder)) {
            File::makeDirectory($gamePrivateFolder, 0777);
            File::copyDirectory($configGameFolder, $gamePrivateFolder);
        }
        return redirect()->route('spaceman.admin.setting');
    }


    public function update(Request $request)
    {
        $gamePrivateFolder = storage_path('app/private/space_man');
        $gameFile = $gamePrivateFolder . '/game.json';
        $payoutFile = $gamePrivateFolder . '/payout.json';
        $reeFile = $gamePrivateFolder . '/reel.json';
        $api_url = route('api.spaceman.v1.root');
        $game_file = File::get($gameFile);

        $game = (object) json_decode($game_file);
        $payout_file = File::get($payoutFile);
        $payouts = json_decode($payout_file);
        $reel_file = File::get($reeFile);
        $reels = json_decode($reel_file);
        $post = (object)$request->all();


        $game->title = $post->game_title;
        // $game->base_bet = $post->base_bet;
        // dd($post);
        $game->time_roll = $post->time_roll;
        $game->number_roll = $post->number_roll;
        $game->multily = $post->multily;
        // for ($i = 1; $i <= 4; $i++) {
        //     $payouts[$i - 1]->name = $post->{"step_" . $i};
        //     $payouts[$i - 1]->pay = $post->{"multiply_" . $i};
        //     $payouts[$i - 1]->percent = $post->{"percent_" . $i};
        // }

        File::put($gamePrivateFolder . '/payout.json', json_encode($payouts));
        File::put($gamePrivateFolder . '/reel.json', json_encode($reels));
        // dd($payouts);
        // dd($post);
        $gameZipUpload = $request->file('gamefile');


        $privateFolder = storage_path('app/private');
        if (!File::exists($privateFolder)) {
            File::makeDirectory($privateFolder, 0777);
        }
        $gamePrivateFolder = storage_path('app/private/space_man');


        $symbolGameFolder = __DIR__ . '/../../../../resources/symbols';
        $configGameFolder = __DIR__ . '/../../../../resources/games/config';

        if (!File::exists($gamePrivateFolder)) {
            $location = $this->location;
            $locArr = strpos($location, '/') !== false ? preg_split("/[\/]+/", $location) : [$location];
            $storePath = storage_path();
            foreach ($locArr as $folder) {
                $storePath = $storePath . '/' . $folder;
                if (!file_exists($storePath)) {
                    if (!mkdir($storePath, 0777)) {
                        return response()->json([
                            'status' => 'FAILED',
                            'message' => 'Can not create new folder!',
                        ]);
                    }
                }
            }
            File::makeDirectory($gamePrivateFolder, 0777);
            File::copyDirectory($configGameFolder, $gamePrivateFolder);
        }

        // if (File::exists($gamePublicFolder)) {
        //     File::delete($gamePublicFolder);
        // }


        // dd($path);
        if ($gameZipUpload) {
            $time = time();
            $gameName = 'space_man' . '-' . $time;
            $game->game_folder = $gameName;
            $gamePublicFolder = public_path('uploads/games/' . $gameName);
            $symbolPublicFolder = $gamePublicFolder . '/symbols';
            if (!File::exists($gamePublicFolder)) {
                $locationPub = $this->locationPub;
                $locationPubArr = strpos($locationPub, '/') !== false ? preg_split("/[\/]+/", $locationPub) : [$locationPub];
                $storePath = storage_path();
                foreach ($locationPubArr as $folder) {
                    $storePath = $storePath . '/' . $folder;
                    if (!file_exists($storePath)) {
                        if (!mkdir($storePath, 0777)) {
                            return response()->json([
                                'status' => 'FAILED',
                                'message' => 'Can not create new folder!',
                            ]);
                        }
                    }
                }
                // if (!File::exists($symbolPublicFolder)) {
                //     File::makeDirectory($symbolPublicFolder, 0777);
                //     File::copyDirectory($symbolGameFolder, $symbolPublicFolder);
                // }
            }
            $nameZip = $gameZipUpload->getClientOriginalName();

            $gameZipFolder = $gamePrivateFolder . '/' . $nameZip;
            $path = $request->file('gamefile')->storeAs('/private/space_man', $nameZip);
            $zip = new ZipArchive();
            $zip->open($gameZipFolder);
            $zip->extractTo("$gamePublicFolder");
            $zip->close();
            $gamePath = public_path('uploads/games/' . $gameName);
            $playerDataFile = $gamePath . '/data.json';
            $player = File::get($playerDataFile);
            $game_file = File::get($gamePrivateFolder . "/game.json");
            $gameData = (object) json_decode($game_file, true);
            $newPlayerData = str_replace($gameData->orinal_url, $api_url, $player);
            File::replace($playerDataFile, $newPlayerData);
            File::copy(__DIR__ . '/../../../../resources/games/spaceman-logo.png', $gamePublicFolder . '/spaceman-logo.png');
        }
        File::put($gamePrivateFolder . '/game.json', json_encode($game));
        // Copy logo


        return view('slotgen-spaceman::backend.setting', compact('game', 'payouts', 'api_url', 'reels'));
    }

    function changeApi(Request $request)
    {
        $api_url = route('api.spaceman.v1.root');
        $game_file = File::get(__DIR__ . '/../../../../resources/games/config/game.json');
        $game = (object)json_decode($game_file);
        $payout_file = File::get(__DIR__ . '/../../../../resources/games/config/payout.json');
        $payouts = json_decode($payout_file);

        $time = time();
        $gameName = 'space_man' . '-' . $time;
        $game->game_folder = $gameName;
        $privateFolder = storage_path('app/private');
        if (!File::exists($privateFolder)) {
            File::makeDirectory($privateFolder, 0777);
        }
        $gamePrivateFolder = storage_path('app/private/space_man');
        $gamePublicFolder = public_path('uploads/games/' . $gameName);
        $symbolPublicFolder = $gamePublicFolder . '/symbols';
        $symbolGameFolder = __DIR__ . '/../../../../resources/symbols';
        $configGameFolder = __DIR__ . '/../../../../resources/games/config';

        if (!File::exists($gamePrivateFolder)) {
            File::makeDirectory($gamePrivateFolder, 0777);
            File::copyDirectory($configGameFolder, $gamePrivateFolder);
        }
        File::put($gamePrivateFolder . '/game.json', json_encode($game));
        // if (File::exists($gamePublicFolder)) {
        //     File::delete($gamePublicFolder);
        // }
        if (!File::exists($gamePublicFolder)) {
            File::makeDirectory($gamePublicFolder, 0777);
            if (!File::exists($symbolPublicFolder)) {
                File::makeDirectory($symbolPublicFolder, 0777);
                File::copyDirectory($symbolGameFolder, $symbolPublicFolder);
            }
            $zip = new ZipArchive();
            $zip->open(__DIR__ . '/../../../../resources/games/space_man.zip');
            $zip->extractTo($gamePublicFolder);
            $zip->close();
            $api_url = route('api.spaceman.v1.root');
            $gamePath = public_path('uploads/games/' . $gameName);
            $playerDataFile = $gamePath . '/data.json';
            $player = File::get($playerDataFile);
            $game_file = File::get($gamePrivateFolder . "/game.json");
            $gameData = (object) json_decode($game_file, true);
            $newPlayerData = str_replace($gameData->orinal_url, $api_url, $player);
            File::replace($playerDataFile, $newPlayerData);
            // Copy logo
            File::copy(__DIR__ . '/../../../../resources/games/spaceman-logo.png', $gamePublicFolder . '/spaceman-logo.png');
        }
        return view('slotgen-spaceman::backend.setting', compact('game', 'payouts', 'api_url'));
    }

    public function initSession(Request $req)
    {
        $seamless = new SeamlessRepository;
        $current_time = \Carbon\Carbon::now()->toDateTimeString();
        $player = new SpaceManPlayer;
        $userID = $seamless->myUserId();
        $ip     = CoreCommon::getIp($req);
        $agent = $req->server('HTTP_USER_AGENT');
        $guestFile = md5($agent . $ip);
        $path = Storage::disk('public')->path('private/' . $guestFile);
        $playerJson = File::get($path . '/' . $guestFile . '.json');
        $playerData = json_decode($playerJson);
        // $userName = $userID > 0 ? $seamless->myUserName() : 'Guest';
        $data = [
            'credit'        => $playerData->balance,
            'client_ip'     => $ip,
            'device_info'   => $agent,
            'last_login'    => $current_time,
            'user_id'       => $userID,
            'user_name'     => $playerData->user_name,
            'session'       => $playerJson,
        ];
        $player->fill($data);
        $player->save();
    }

    public function rtpSimulate()
    {
        $gamePrivateFolder = storage_path('app/private/songkan_flash');
        $gameFile = $gamePrivateFolder . '/game.json';
        $game_file = File::get($gameFile);
        $game = (object) json_decode($game_file);


        $authTokenName = config('slotgen.core.game.auth.token', 'X-Ncash-token');
        $simulateNormal = (int) $this->simulateNormal;
        $simulateFeature = (int) $this->simulateFeature;
        // $featureSelect = 3; //Queen Of Bouncety
        $featureSelect = 1; //Normal game
        // if ($game) {
        // $gameId = $game->uuid;

        // Normal simulate ####################################################################
        $simulateType = SimulateSpin::TYPE_NORMAL;
        // $simulateType = 0;
        $data   = [
            'agent'         => 'AUTO_BOT_' . uniqid(),
            'ip'            => '127.0.0.1',
            'simulate'      => true,
            'simulate_type' => $simulateType
        ];

        $player = SlotgenLaracore::mapUser($data);
        $playerUsername = isset($player->user_name) ? $player->user_name : 'Guest Player';
        // $playerBalance = $simulateType ?  floatval(config('slotgen.core.game.return.simulate_credit', 1000000))
        //     : floatval(config('slotgen.core.game.player.defaultCredit', 5000));
        $playerBalance = floatval(config('slotgen.core.game.return.simulate_credit', 1000000));
        $launchData = array(
            'player_uuid'   => $player->uuid,
            'user_name'     => $playerUsername,
            'balance'       => $playerBalance,
            'is_seamless'   => false
        );
        // dd($launchData);
        $session = SpaceMan::intSession($launchData);
        if ($session) {
            $ssdata = (object) $session["data"];
            $spinDate = date('Y-m-d H:i:s');
            $data = [
                'spin_date'     => $spinDate,
                'type'          => $simulateType,
                "session_id"    => $ssdata->session_id,
                'is_finished'   => 0
            ];
            $simulate = SimulateSpin::create($data);
            $simulateId = $simulate->uuid;
            $myRequest = new Request();
            $betSize    = 1;
            $betLevel   = 1;
            $baseBet   = (float) $game->base_bet;
            $totalBet = number_format($betSize * $betLevel * $baseBet, 2, '.', '');
            $myRequest->replace(['betSize' => $betSize, 'betLevel' => $betLevel, "action" => "spin"]);
            $myRequest->headers->set($authTokenName, $ssdata->session_id);
            $simulateData = (object) [
                'simulate_id'   => $simulateId,
                "session_id"    => $ssdata->session_id,
                'simulate_type' => $simulateType,
                'request'       => $myRequest
            ];
            $simulateNormal = 3000;
            while ($simulateNormal > 0) {
                $queueTrans = new RtpSimulateQueue($simulateData);
                dispatch($queueTrans)->onQueue('simulate');
                $simulateNormal--;
            }
        } else {
            return ['success' => false, 'message' => 'Init session failed'];
        }

        return ['success' => true, 'data' => $game];
    }
}
