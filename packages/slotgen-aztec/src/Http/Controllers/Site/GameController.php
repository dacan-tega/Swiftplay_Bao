<?php

namespace Slotgen\SlotgenAztec\Http\Controllers\Site;

use File;
use Illuminate\Http\Request;
use Nhutcorp\SlotgenRtpcore\Repositories\Api\RtpcoreGameRepository;
use Slotgen\SlotgenAztec\Http\Controllers\AppBaseController;
use Slotgen\SlotgenAztec\SlotgenAztec;

class GameController extends AppBaseController
{
    /** @var RtpcoreGameRepository */
    private $gameRepository;

    private $authTokenName;

    private $gameLocation;

    // public static function launchGame(Request $req)
    public static function launchGame()
    {
        $AppBaseController = new AppBaseController();
        $gameFile = null;
        $gamePrivateFolder = storage_path('app/private/aztec');
        if (!File::exists($gamePrivateFolder)) {
            $gameFile = $gamePrivateFolder . '/ncashgame.json';
            $game = (object) json_decode(File::get($gameFile));

            return redirect()->back()->with('error', 'Game Not Found');
        }
        $player = auth()->user();
        $playerUsername = isset($player->user_name) ? $player->user_name : 'Guest Player';
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
}
