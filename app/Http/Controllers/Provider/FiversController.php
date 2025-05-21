<?php

namespace  App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FiversGame;
use App\Models\Game;
use App\Models\FiversProvider;
use App\Traits\Providers\FiversTrait;
use Illuminate\Http\Request;
use App\Models\Setting;

class FiversController extends Controller
{
    use FiversTrait;

    /**
     * @return false|string
     */
    public function getAll()
    {
        $query_games = FiversGame::query();
        $query_games->where('status', 1);

        if(isset($request->provider) && !empty($request->provider)) {
            $provider = FiversProvider::whereCode($request->provider)->first();
            if(!empty($provider)) {
                $query_games->where('fivers_provider_id', $provider->id);
            }
        }

        if(isset($request->searchTerm) && !empty($request->searchTerm) && strlen($request->searchTerm) > 2) {
            $query_games->whereLike(['game_code', 'game_name'], $request->searchTerm);
        }

        $games = $query_games->orderBy('views', 'desc')->paginate();
        return json_encode(['status' => true, 'games' => $games]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $providers = FiversProvider::with(['games'])
            ->whereHas('games', function ($query) {
                $query->where('status', 1)
                    ->orderBy('views', 'asc')
                    ->limit(12);
            })
            ->orderBy('name', 'desc')
            ->get();

        return response()->json(['providers' => $providers], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $req, string $id)
    {
        // if(auth()->check()) {
            $game = Game::where('uuid', $id)->first();
            if(!empty($game)) {
                $launch = $this->gameLaunch($game, $req);
                // if($launch['status'] == 1) {
                    if ($launch['success']) {
                    // return view('web.fivers.index', [
                    //     'game' =>$fiver,
                    //     'gameUrl' => $launch['launch_url'],
                    // ]);
                    return redirect()->to($launch['data']['gamePath']);
                }
                return back()->with('error', 'Error processing the game');
            }

            // dd($game);
            return back()->with('error', 'Game not found');
        // }
        // return redirect()->back()->with('error', 'Log in to continue');
    }

    public function gameLaunch($name,$req) {
        $class = $name->provider_service;
        if($name->name == "Aviator" || $name->name == "Spaceman") {
            $nameClass = $class . "\Http\Controllers\Site\GameController";
        } else {
            $nameClass = $class . $name->type . "\Http\Controllers\Site\GameController";
        }
        $setting = Setting::first();
        $data = ["language" => $setting->language];
        // if (!strpos($nameClass,"Slotgen")) {
        //     return route('web.home');
        // }
        $gamePathJson = $nameClass::launchGame($data,$req);
        if ($gamePathJson['success']) {
            $gamePath = $gamePathJson;
        } else {
            return [
                'success' => false,
                'message' =>'IT WORKS!'
            ];
            // return redirect()->route('web.home')->with('message', 'IT WORKS!');
        }
        return $gamePath;
    }
    /**
     * Update the specified resource in storage.
     */
    public function webhookMethod(Request $request)
    {
        return self::webhooks($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
