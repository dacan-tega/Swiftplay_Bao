<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Gateway\BsPayController;


Route::get('bspay/qrcode-pix', [BsPayController::class, 'getQRCodePix']);
Route::post('bspay/qrcode-pix', [BsPayController::class, 'getQRCodePix']);

Route::any('bspay/callback', [BsPayController::class, 'callbackMethod']);// -> middleware('checkvsign');

Route::post('bspay/consult-status-transaction', [BsPayController::class, 'consultStatusTransactionPix']);

Route::get('bspay/withdrawal/{id}', [BsPayController::class, 'withdrawalFromModal'])->name('bspay.withdrawal');

Route::get('bspay/withdrawal/approve/{id}', [BsPayController::class, 'withdrawalFromModalAprrove'])->name('bspay.withdrawal.approve');
Route::get('bspay/withdrawal/decline/{id}', [BsPayController::class, 'withdrawalFromModalDecline'])->name('bspay.withdrawal.decline');
Route::get('bspay/deposit/approve/{id}', [BsPayController::class, 'depositFromModalAprrove'])->name('bspay.deposit.approve');
Route::get('bspay/deposit/decline/{id}', [BsPayController::class, 'depositFromModalDecline'])->name('bspay.deposit.decline');
