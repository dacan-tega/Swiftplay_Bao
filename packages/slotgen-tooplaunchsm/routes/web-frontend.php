<?php
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => '\\Slotgen\\SpaceMan\\Http\\Controllers\\Site', "as" => 'spaceman.site.'], function () {
  Route::get('/launch', 'GameController@launchGame')->name('launch');
});
