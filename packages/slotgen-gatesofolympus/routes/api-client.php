<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'api', 'as' => 'api.'], function () {
    Route::group(['prefix' => 'gatesofolympus', 'as' => 'gatesofolympus.'], function () {
        Route::group(['prefix' => 'v1', 'as' => 'v1.'], function () {
            Route::get('', null)->name('root');
            Route::post('/', 'Slotgen\SlotgenGatesOfOlympus\Http\Controllers\Api\GameController@gameAction')->name('action');
            Route::get('/history', 'Slotgen\SlotgenGatesOfOlympus\Http\Controllers\Api\GameController@history')->name('history');
            Route::post('/launch', 'Slotgen\SlotgenGatesOfOlympus\Http\Controllers\Api\GameController@launchGame')->name('launch');
            Route::get('/launch', 'Slotgen\SlotgenGatesOfOlympus\Http\Controllers\Api\GameController@launchGameApi')->name('launch');
        });

    });

});
