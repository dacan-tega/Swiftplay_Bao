<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'api', 'as' => 'api.'], function () {
    Route::group(['prefix' => 'aztec', 'as' => 'aztec.'], function () {
        Route::group(['prefix' => 'v1', 'as' => 'v1.'], function () {
            Route::get('', null)->name('root');
            Route::post('/', 'Slotgen\SlotgenAztec\Http\Controllers\Api\GameController@gameAction')->name('action');
            Route::post('/launch', 'Slotgen\SlotgenAztec\Http\Controllers\Api\GameController@launchGame')->name('launch');
            Route::get('/launch', 'Slotgen\SlotgenAztec\Http\Controllers\Api\GameController@launchGameApi')->name('launch');
        });

    });

});
