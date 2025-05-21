<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => '\\Slotgen\\SlotgenCaptainsBounty\\Http\\Controllers\\Site', 'prefix' => 'captainsbounty',  'as' => 'captainsbounty.site.'], function () {
    Route::get('/launch', 'GameController@launchGame')->name('launch');
    Route::post('/launch', 'GameController@launchGameApi')->name('launch');
});

Route::get('/test22', 'Slotgen\SlotgenCaptainsBounty\Http\Controllers\Site\GameController@launchGame')->name('action');
