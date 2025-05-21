<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'api', 'as' => 'api.'], function () {
    Route::group(['prefix' => 'spaceman', "as" => 'spaceman.'], function () {
        Route::group(['prefix' => 'v1', "as" => 'v1.'], function () {          
            Route::post('/loadWallet', 'GameController@loadWallet')->name('action');
            Route::post('/deductWallet', 'GameController@deductWallet')->name('action');
            Route::post('/settleWallet', 'GameController@settleWallet')->name('action');
        });
        
    });    
});
