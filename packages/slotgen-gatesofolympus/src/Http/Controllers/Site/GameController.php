<?php

namespace Slotgen\SlotgenGatesOfOlympus\Http\Controllers\Site;

use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Nhutcorp\SlotgenRtpcore\Repositories\Api\RtpcoreGameRepository;
use Slotgen\SlotgenGatesOfOlympus\Http\Controllers\AppBaseController;
use Slotgen\SlotgenGatesOfOlympus\SlotgenGatesOfOlympus;

class GameController extends AppBaseController
{
    /** @var RtpcoreGameRepository */
    private $gameRepository;

    private $authTokenName;

    private $gameLocation;

    public static function launchGame()
    {
        $AppBaseController = new AppBaseController;
        $gameFile = null;
        $gamePrivateFolder = storage_path('app/private/gates_of_olympus');
        if (! File::exists($gamePrivateFolder)) {
            // $gameFile = $gamePrivateFolder . '/ncashgame.json';
            // $game = (object) json_decode(File::get($gameFile));
            // return redirect()->back()->with('error', 'Game Not Found');

            return $AppBaseController->sendError('error', 'Game Not Found');
        }
        $player = auth()->user();
        $playerUsername = isset($player->user_name) ? $player->user_name : 'Guest Player';
        $launchData = SlotgenGatesOfOlympus::checkPlayer($player);
        // if ($player) {
        //     $launchData = [
        //         'uuid' => $player->token,
        //         'name' => $player->name,
        //         'balance' => $player->wallet->balance,
        //         'is_seamless' => false,
        //     ];
        // } else {
        //     $launchData = [
        //         'uuid' => '',
        //         'user_name' => 'guest',
        //         'balance' => 50000,
        //         'is_seamless' => true,
        //     ];
        // }
        $launchGameRes = SlotgenGatesOfOlympus::LaunchGame($launchData);
        if ($launchGameRes['success']) {
            $resData = SlotgenGatesOfOlympus::LaunchGameRes($launchGameRes);
            // $myPublicFolder = url('/uploads/games');
            // $launchGame = (object) $launchGameRes['data'];
            // $sessionId = $launchGame->session_id;
            // $gameFolder = $launchGame->game_folder;
            // $gamePath = $myPublicFolder . '/' . $gameFolder . '/index.html?token=' . $sessionId;

            // $resData = [
            //     'player_name' => 'guest',
            //     'session_id' => $sessionId,
            //     'game_folder' => $gameFolder,
            //     'game_name' => '',
            //     'gamePath' => $gamePath,
            // ];

            // dd($resData);
            if ($resData['success']) {
                return $AppBaseController->sendResponse($resData['data'], 'Launch game success');
            } else {
                return $AppBaseController->sendError('error', 'Can Not Launch Game');
            }
        } else {
            return $AppBaseController->sendError('error', 'Invalid Launch Game');
        }
    }

    public function rtpSimulate(Request $req)
    {
        $AppBaseController = new AppBaseController;
        $myRequest = new Request;
        $apiController = app(\Slotgen\SlotgenGatesOfOlympus\Http\Controllers\Api\GameController::class);
        $betSize = 1;
        $betLevel = 1;
        $request = ['betSize' => $betSize, 'betLevel' => $betLevel, 'action' => 'spin'];
        // $player = auth()->user();
        // $playerId = $player->id;
        // $playerGame = GatesOfOlympusPlayer::where("player_uuid",$playerId)->first();
        // $token = $playerGame->uuid;
        // $myRequest->replace(['betSize' => $betSize, 'betLevel' => $betLevel, "action" => "spin"]);
        // $myRequest->headers->set('X-Ncash-token', $token);
        // header("X-Ncash-token:$token");
        // $player = auth()->user();
        // $user = User::where('id',4)->first();
        // $role = Role::where('name', 'admin')->first();
        // $player->assignRole('admin');
        // dd($role);
        // dd($player->hasRole('admin'));
        $player = auth()->user();
        $playerUsername = isset($player->user_name) ? $player->user_name : 'Guest Player';
        $agent = $req->server('HTTP_USER_AGENT');
        $ip = SlotgenGatesOfOlympus::getIp($req);
        $data = [
            'device_info' => $agent,
            'client_ip' => $ip,
        ];
        $launchData = SlotgenGatesOfOlympus::checkPlayer($player, $data);
        $launchGameRes = (object) SlotgenGatesOfOlympus::LaunchGame($launchData);

        if ($launchGameRes->success) {
            $request = ['betSize' => $betSize, 'betLevel' => $betLevel, 'action' => 'spin'];
            // $player = auth()->user();
            // $playerId = $player->id;
            // $playerGame = GatesOfOlympusPlayer::where("player_uuid",$playerId)->first();
            $gameSession = (object) $launchGameRes->data;
            $token = $gameSession->session_id;
            $myRequest->replace(['betSize' => $betSize, 'betLevel' => $betLevel, 'action' => 'spin']);
            // $myRequest->headers->set('X-Ncash-token', $token);
            // header("X-Ncash-token:$token");
            // $myRequest->headers->set("Authorization", "X-Ncash-token $token");
            // $player = auth()->user();
            // $user = User::where('id', 4)->first();
            // $role = Role::where('name', 'admin')->first();
            // $player->assignRole('admin');
            // dd($role);
            // dd($player->hasRole('admin'));

            // dd($myRequest);
            // $myRequest->param('X-Ncash-token', $token);
            // $myRequest = app('request')->header('X-Ncash-token', $token);
            // header("X-Ncash-token: $token");
            // dd($myRequest);

            $count = 2;
            for ($i = 0; $i < $count; $i++) {

                $myRequest->headers->set('X-Ncash-token', $token);
                $simulateData = (object) [
                    // "session_id"    => $token,
                    'request' => $myRequest,
                ];
                // dd($simulateData);
                // $queueTrans = new NewJob($simulateData);
                // dispatch($queueTrans)->onQueue('simulate');
                // Log::debug(json_encode($queueTrans));
                $res = $apiController->gameAction($myRequest);
                // dd($res);
                $data = (object) $res['data'];
                // dd($data);
                // Log::debug("JACKPOT");

                // Log::debug("checkjackpot");
                // Log::debug(json_encode($data->jackpot));
                // Log::debug("file_name");
                // Log::debug(json_encode($data->file_name));
                // Log::debug("line_index");
                // Log::debug(json_encode($data->line_index));
                // Log::debug("system_rtp");
                // Log::debug(json_encode($data->system_rtp));
                // Log::debug("SHARE_FEATURE");
                // Log::debug(json_encode($data->SHARE_FEATURE));
                // Log::debug("nextrun_feature");
                // Log::debug(json_encode($data->nextrun_feature));
                // Log::debug("return_normal");
                // Log::debug(json_encode($data->return_normal));
                // Log::debug("END!!!!!!!!!!!!!!!!!!!!!");
            }

            dd($res);
        } else {
            return $AppBaseController->sendError('error', 'Invalid Launch Game');
        }
    }
}
