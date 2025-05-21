<?php

namespace Slotgen\SlotgenCaptainsBounty\Http\Controllers\Site;

use File;
use Nhutcorp\SlotgenRtpcore\Repositories\Api\RtpcoreGameRepository;
use Slotgen\SlotgenCaptainsBounty\Http\Controllers\AppBaseController;
use Slotgen\SlotgenCaptainsBounty\SlotgenCaptainsBounty;

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
        $gamePrivateFolder = storage_path('app/private/captains_bounty');
        if (! File::exists($gamePrivateFolder)) {
            // $gameFile = $gamePrivateFolder . '/ncashgame.json';
            // $game = (object) json_decode(File::get($gameFile));
            // return redirect()->back()->with('error', 'Game Not Found');

            return $AppBaseController->sendError('error', 'Game Not Found');
        }
        $player = auth()->user();
        $playerUsername = isset($player->user_name) ? $player->user_name : 'Guest Player';
        $launchData = SlotgenCaptainsBounty::checkPlayer($player);
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
        $launchGameRes = SlotgenCaptainsBounty::LaunchGame($launchData);
        if ($launchGameRes['success']) {
            $resData = SlotgenCaptainsBounty::LaunchGameRes($launchGameRes);
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
}
