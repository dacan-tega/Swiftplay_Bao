<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FiversGame;
use App\Models\FiversProvider;
use App\Models\Game;
use App\Models\GameExclusive;
use App\Models\VibraCasinoGame;
use Illuminate\Http\Request;
use Slotgen\BrasilGooool\BrasilGooool;
use Slotgen\BrawlPirates\BrawlPirates;
use Slotgen\LuckyTank\LuckyTank;
use Slotgen\ToopLaunch\ToopLaunch;
use Slotgen\SpaceMan\SpaceMan;
use File;
use App\Models\Setting;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');

        $games = Game::when($searchTerm, function ($query) use ($searchTerm) {
            $query->where('name', 'like', "%$searchTerm%")
                ->orWhere('uuid', 'like', "%$searchTerm%");
        })
        ->whereActive(1)
        ->get();

        $gamesExclusives = GameExclusive::when($searchTerm, function ($query) use ($searchTerm) {
            $query->where('name', 'like', "%$searchTerm%")
                ->orWhere('description', 'like', "%$searchTerm%");
        })
        ->whereActive(1)
        ->orderBy('views', 'desc')
        ->get();
        $categories = Category::when($searchTerm, function ($query) use ($searchTerm) {
            $query->where('id', 'like', "%$searchTerm%")
                ->orWhere('name', 'like', "%$searchTerm%");
        })
       
        ->get();
        $providers = FiversProvider::with('games')
            ->when($searchTerm, function ($query) use ($searchTerm) {
                $query->where('name', 'like', "%$searchTerm%");
            })
            ->whereHas('games', function ($query) use ($searchTerm) {
                $query->where('status', 1)
                    ->where('name', 'like', "%$searchTerm%")
                    ->orderBy('views', 'asc');
            })
            ->orderBy('name', 'desc')
            ->get();

        $gamesVibra = VibraCasinoGame::when($searchTerm, function ($query) use ($searchTerm) {
            $query->where('game_name', 'like', "%$searchTerm%");
        })
        ->whereStatus(1)
        ->limit(24)
        ->get();
        $providers = [];
        $gamesExclusives = [];
        $gamesVibra = [];
        $searchTerm = [];

        
        $slotgen = [];
        $setting = Setting::first();
        $language = $setting->language;


        
        
        return view('web.home.index', [
            'games' => $games,
            'providers' => $providers,
            'gamesExclusives' => $gamesExclusives,
            'gamesVibra' => $gamesVibra,
            'searchTerm' => $searchTerm,
            'slotgen'   => $slotgen,
            'language' => $language,
            'categories' => $categories
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function banned()
    {
        return view('web.banned.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function howWorks()
    {
        $categories = Category::all();
        return view('web.home.how-works',['categories' => $categories]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function aboutUs()
    {
        return view('web.home.about-us');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function suporte()
    {
        return view('web.home.suporte');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function showGameByCategory(string $slug)
    {
        $category = Category::where('slug', $slug)->first();
        if(!empty($category)) {
            $games = Game::where('category_id', $category->id)->whereActive(1)->paginate();
            $gamesFivers = FiversGame::where('casino_category_id', $category->id)->whereStatus(1)->paginate();

            return view('web.categories.index', compact(['games', 'gamesFivers', 'category']));
        }

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
