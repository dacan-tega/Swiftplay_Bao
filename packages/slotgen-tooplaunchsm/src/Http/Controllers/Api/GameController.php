<?php

namespace Slotgen\SpaceMan\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Slotgen\SpaceMan\Http\Controllers\AppBaseController;
use Nhutcorp\SlotgenLaracore\Helpers\Common as CoreCommon;
use Slotgen\SpaceMan\Models\SpaceManPlayer;
use Slotgen\SpaceMan\Models\SpaceManSpinLogs;
use Illuminate\Support\Str;
use App\Repositories\SeamlessRepository;
use Illuminate\Support\Facades\Log;
use Slotgen\SpaceMan\SpaceMan;
use App\Models\User;
use ZipArchive;
use File;
use Carbon\Carbon;


class GameController extends AppBaseController
{
    public function loadWallet(Request $req)
    {
        $request = (object)$req->all();
        $userName = $request->user_name;
        $player = User::where("name", $userName )->first();
        if ($player) {
            $balance = $player->wallet->balance;
            return $this->sendResponse(number_format($balance, 2, '.', ''), 'Launch game success');
        } else {
            $player = SpaceManPlayer::where("user_name", $userName )->first();
            $balance = $player->credit;
            return $this->sendResponse(number_format($balance, 2, '.', ''), 'Launch game success');
        }
    }



    public function deductWallet(Request $req)
    {
        $request = (object)$req->all();
        $userName = $request->user_name;
        $amount = $request->amount;
        $player = User::where("name", $userName )->first();
        if ($player) {
            $balance = $player->wallet->balance; 
            $balanceNew = $balance - $amount;
            $player->wallet->balance = $balanceNew;
            // $player->wallet->balance = $player->wallet->balance - $amount;
            $player->wallet->save();
            
            return $this->sendResponse(number_format($balanceNew, 2, '.', ''), 'Launch game success');
        } else {
            $player = SpaceManPlayer::where("user_name", $userName )->first();
            $balance = $player->credit;
            $player->credit = $balance + $amount;
            $balanceNew = $player->credit - $amount;
            // $player->credit = $player->credit - $amount;
            $player->save();
            return $this->sendResponse(number_format($balanceNew, 2, '.', ''), 'Launch game success');
        }
    }

    public function settleWallet(Request $req)
    {
        $request = (object)$req->all();
        $userName = $request->user_name;
        $amount = $request->amount;
        $player = User::where("name", $userName )->first(); 
        if ($player) {
            $balance = $player->wallet->balance; 
            $balanceNew = $balance + $amount;
            $player->wallet->balance = $balanceNew;
            $player->wallet->save();
            return $this->sendResponse(number_format($balanceNew, 2, '.', ''), 'Launch game success');
        } else {
            $player = SpaceManPlayer::where("user_name", $userName )->first();
            $balance = $player->credit;
            $player->credit = $balance + $amount;
            $balanceNew = $player->credit + $amount;
            $player->save();
            return $this->sendResponse(number_format($balanceNew, 2, '.', ''), 'Launch game success');
        }
    }
}
