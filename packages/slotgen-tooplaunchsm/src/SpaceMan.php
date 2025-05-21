<?php

namespace Slotgen\SpaceMan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Nhutcorp\SlotgenLaracore\Http\Controllers\AppBaseController;
use Nhutcorp\SlotgenLaracore\Helpers\Common as CoreCommon;
use Slotgen\SpaceMan\Models\SpaceManPlayer;
use Illuminate\Support\Facades\Log;
use App\Repositories\SeamlessRepository;
use SlotgenLaracore;
use ZipArchive;
use File;

class SpaceMan
{
  public static function getGame()
  {
    $api_url = route('web.spaceman.site.launch');
    $logo_url = url("uploads/games/space_man/spaceman-logo.png");
    $resData = (object) [
      'launch' => $api_url,
      'title' => "Space Man", // **Todo: read from game.json
      'logo' => $logo_url
    ];
    $gamePrivateFolder = storage_path('app/private/space_man');
    $gameFile = $gamePrivateFolder . "/game.json";
    if (File::exists($gameFile)) {
      $gameContent = File::get($gameFile);
      $gameInfo = (object) json_decode($gameContent, true);
      $gameFolder = $gameInfo->game_folder;
      $gameName = $gameInfo->title;
      $logo_url = url('uploads/games/' . $gameFolder . '/spaceman-logo.png');
    } else {
      $gameFolder = '';
      $gameName = 'Waiting for upload';
      $logo_url = url('uploads/games/gamenotfound.png');
    }
    // $file = Storage::disk('app/private/space_man');
    // $file1 = Storage::url($file);
    $imageUrl = storage_path('app/public/spaceman-logo.png');
    if (!File::exists($imageUrl)) {
      File::copy(__DIR__ . '/../resources/games/spaceman-logo.png', $imageUrl);
    }
    $logo = url('/storage/spaceman-logo.png');
    $resData = (object) [
      'launch' => $api_url,
      'title' => $gameName,
      'logo' => $logo,
      'name'  => "spaceman"
    ];
    return $resData;
  }

  public static function launchGame($data)
  {
    $isSuccess = false;
    $errMsg = '';
    $response = null;
    $gameId = $data->game_id;
    $playerId = $data->uuid;
    $playerBalance = $data->balance;
    $playerUsername = $data->user_name;
    $launchData = array(
      'game_uuid'     => $gameId,
      'player_uuid'   => $playerId,
      'user_name'     => $playerUsername,
      'balance'       => $playerBalance,
      'is_seamless'   => true
    );
    $res = SpaceMan::intSession($launchData);
    if ($res['success']) {
      $response = $res['data'];
      $isSuccess = true;
    } else {
      $errMsg = $res['message'];
    }
    return [
      "success" => $isSuccess,
      "message" => $errMsg,
      "data" => $response
    ];
  }

  public static function intSession($data)
  {
    // $gamePrivateFolder = storage_path('app/private/space_man');
    // $gameFile = File::get($gamePrivateFolder . "/game.json");
    $currTime = \Carbon\Carbon::now()->toDateTimeString();
    // $gameInfo = (object) json_decode($gameFile, true);
    // $gameFolder = $gameInfo->game_folder;
    // $gameName = $gameInfo->title;
    $gameName = 'Space Man';
    $playerId = $data['uuid'];
    $playerBalance = $data['balance'];
    $userName = $data['user_name'];
    $isSeamless = $data['is_seamless'];
    // $betAmount = $gameInfo->bet_level;
    $betAmount = 1;
    $searchPlayer = array(
      'player_uuid'   => $playerId,
      'is_seamless'   => $isSeamless
    );
    $playerData = auth()->user();
    $gameFolder = config('slotgen.core.launch');
    if ($playerData == null) {
      $defaultSess = (object)
      [
        "is_seamless" => false,
        "user_name" => "guest6152",
        "balance" => 5000,
        "bet_level" => 1,
        "curr_step" => 0,
        "fill" => [],
        "is_finished" => true,
        "win_amount" => 0,
        "bet_size" => 1,
        "step" => 0,
        "curr_win" => 0,
        "curr_bet" => 1,
        "curr_pos" => [],
        "is_settle" => false,
        "multi_list" => [1.8, 2.4, 6, 13.3, 35.5],
        "bonus_list" => [],
        "is_jackpot" => false,
        "is_continue" => false,
        "bet_amount" => $betAmount,
        "is_win" => true,
        "bet_id" => 24,
        "last_second" => 0,
        "arr_total" => [],
        "pos" => 1,
        "jew" => 0,
      ];
      $data = [
        'credit'        => $playerBalance,
        'client_ip'     => '-',
        'device_info'   => '-',
        'last_login'    => $currTime,
        'player_uuid'   => $playerId,
        'user_name'     => $userName,
        'session_data'  => $defaultSess,
        'is_seamless'   => $isSeamless
      ];
      $playerData = new SpaceManPlayer();
      $playerData->fill($data);
      $playerData->save();
    } else {
      // $playerData->credit = $playerBalance;
      // $playerData->user_name = $userName;
      // $playerData->save();
    }

    $response = [
      'player_name'   => $playerData->user_name,
      'session_id'    => $playerData->uuid,
      'balance'       => $playerData->credit,
      'game_folder'   => $gameFolder,
      'game_name'     => $gameName
    ];
    return ['success' => true, 'data' => $response];
  }
}
