<?php

namespace Slotgen\SpaceMan\Http\Controllers\Site;

use Nhutcorp\SlotgenRtpcore\Repositories\Api\RtpcoreGameRepository;
use Slotgen\SpaceMan\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Nhutcorp\SlotgenLaracore\SlotgenLaracore;
use Nhutcorp\SlotgenLaracore\Helpers\Common as CoreCommon;
use Illuminate\Support\Facades\Validator;
use Slotgen\SpaceMan\SpaceMan;
use File;
use Illuminate\Support\Facades\Log;

class GameController extends AppBaseController
{
    /** @var  RtpcoreGameRepository */
    private $gameRepository;
    private $authTokenName;
    private $gameLocation;


    public function launchGame(Request $req)
    {
        $gameFile = null;
        $gamePrivateFolder = storage_path('app/private/space_man');
        // if ($gamePrivateFolder) {
        //     $gameFile = $gamePrivateFolder . '/game.json';
        //     $game = (object)json_decode(File::get($gameFile));
        // }
        $agent  = $req->server('HTTP_USER_AGENT');
        $ip     = "127.0.0.1";
        $data   = [
            'agent' => $agent,
            'ip'    => $ip
        ];
        $player = auth()->user();
        if ($player) {
            $launchData = [
                'uuid' => $player->token,
                'user_name' => $player->name,
                'balance' => $player->wallet->balance,
                'is_seamless' => false,
            ];
        } else {
            $launchData = [
                'uuid' => '',
                'user_name' => 'guest'.rand(1,10000),
                'balance' => 50000,
                'is_seamless' => false,
            ];
        }   
        $myPublicFolder = url('/uploads/games');
        $launchGameRes = SpaceMan::intSession($launchData);
        $gameFolder = config('slotgen.core.spaceman.launch');
        $data = [
            'user_name' => $launchData['user_name'],
            'game' => "spaceman",
        ];
        $ch = curl_init();
        $payload = json_encode($data);
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json'
        ];
        $options = [
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_URL => $gameFolder,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_RETURNTRANSFER => 1
        ];
        curl_setopt_array($ch, $options);
        $launchGame = curl_exec(($ch));
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        $launchGameUrl = json_decode($launchGame);
        if ($httpcode == 200) {
            return redirect()->to($launchGameUrl->url);
        }
        if ($httpcode == 403) {
            return $this->sendError('Unable to access API');
        } else if ($httpcode == 400) {
            return $this->sendError('Invalid Post data');
        } else {
            return $this->sendError('Unable to access API');
        }
    }
}
