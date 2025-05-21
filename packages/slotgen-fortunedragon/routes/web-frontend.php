<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => '\\Slotgen\\SlotgenFortuneDragon\\Http\\Controllers\\Site', 'prefix' => 'fortunedragon',  'as' => 'fortunedragon.site.'], function () {
    Route::get('/launch', 'GameController@launchGame')->name('launch');
    Route::post('/launch', 'GameController@launchGameApi')->name('launch');
});

Route::get('/test22', 'Slotgen\SlotgenFortuneDragon\Http\Controllers\Site\GameController@launchGame')->name('action');
