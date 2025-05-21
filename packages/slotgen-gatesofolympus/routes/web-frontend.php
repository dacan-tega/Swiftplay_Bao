<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => '\\Slotgen\\SlotgenGatesOfOlympus\\Http\\Controllers\\Site', 'prefix' => 'gatesofolympus',  'as' => 'gatesofolympus.site.'], function () {
    Route::get('/launch', 'GameController@launchGame')->name('launch');
    Route::get('/simulate', 'GameController@rtpSimulate')->name('launch');
});

Route::get('/test22', 'Slotgen\SlotgenGatesOfOlympus\Http\Controllers\Site\GameController@launchGame')->name('action');
