<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'api', 'as' => 'api.'], function () {
    Route::group(['prefix' => 'fortunedragon', 'as' => 'fortunedragon.'], function () {
        Route::group(['prefix' => 'v1', 'as' => 'v1.'], function () {
            Route::get('', null)->name('root');
            Route::post('/', 'Slotgen\SlotgenFortuneDragon\Http\Controllers\Api\GameController@gameAction')->name('action');
            Route::get('/info', 'Slotgen\SlotgenFortuneDragon\Http\Controllers\Api\GameController@info')->name('info');
            Route::get('/history', 'Slotgen\SlotgenFortuneDragon\Http\Controllers\Api\GameController@history')->name('history');
            Route::get('/payout', 'Slotgen\SlotgenFortuneDragon\Http\Controllers\Api\GameController@payout')->name('payout');
            Route::get('/game-rule', 'Slotgen\SlotgenFortuneDragon\Http\Controllers\Api\GameController@gameRule')->name('game-rule');
            Route::get('/history', 'Slotgen\SlotgenFortuneDragon\Http\Controllers\Api\GameController@history')->name('history');
            Route::get('/history_detail', 'Slotgen\SlotgenFortuneDragon\Http\Controllers\Api\GameController@historyDetail')->name('history_detail');
            Route::post('/launch', 'Slotgen\SlotgenFortuneDragon\Http\Controllers\Api\GameController@launchGame')->name('launch');
            Route::get('/launch', 'Slotgen\SlotgenFortuneDragon\Http\Controllers\Api\GameController@launchGameApi')->name('launch');
        });

    });

});
