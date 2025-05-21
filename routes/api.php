<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

include_once(__DIR__ . '/groups/api/provider/vgames.php');

Route::prefix('seamless')
    ->group(function () {
        Route::post('/list', 'App\Http\Controllers\Api\SeamlessController@listGame')->name('list');
        Route::post('/launch', 'App\Http\Controllers\Api\SeamlessController@gameLaunchApi')->name('launch');
        Route::post('/history', 'App\Http\Controllers\Api\SeamlessController@historyAgent')->name('history');
        Route::post('/history_detail', 'App\Http\Controllers\Api\SeamlessController@historyDetail')->name('history_detail');
    });

Route::prefix('seamless-new')
    ->group(function () {
        Route::post('/getgames', 'App\Http\Controllers\Api\SeamlessNewController@getgames')->name('list');
        Route::post('/getlaunchurl', 'App\Http\Controllers\Api\SeamlessNewController@getlaunchurl')->name('launch');
        Route::post('/history', 'App\Http\Controllers\Api\SeamlessNewController@historyAgent')->name('history');
        Route::post('/check', 'App\Http\Controllers\Api\SeamlessNewController@check')->name('history_detail');
    });

// Route::middleware('auth:api')->get('/user/qr', [LoginController::class, 'getUserQr']);
