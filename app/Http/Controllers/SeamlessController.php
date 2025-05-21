<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeamlessController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function slotgenBrasilGooool()
    {
        $frameUrl = route('brasilgooool.admin.setting');
        return view('seamless')->with('frameUrl', $frameUrl);
    }

    public function slotgenBrawlPirates()
    {
        $frameUrl = route('brawlpirates.admin.setting');
        return view('seamless')->with('frameUrl', $frameUrl);
    }

    public function slotgenLuckyTank()
    {
        $frameUrl = route('luckytank.admin.setting');
        return view('seamless')->with('frameUrl', $frameUrl);
    }
}
