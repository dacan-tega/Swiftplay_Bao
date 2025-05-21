<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => '\\Slotgen\\SpaceMan\\Http\\Controllers\\Admin', 'as' => 'spaceman.admin.'], function () {
    Route::get('/initsession', 'SettingController@initSession')->name('initsession');
    Route::get('/changeapi', 'SettingController@changeApi')->name('changeapi');
    Route::get('/initializeData', 'SettingController@initializeData')->name('initialize-data');
    Route::get('/setting', 'SettingController@index')->name('setting');
    Route::post('/setting', 'SettingController@update')->name('setting-post');
    Route::get('/simulate', 'SettingController@rtpSimulate')->name('rtp-simulate');
});
