<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;


Route::get('/',[Home::class,"index"])->middleware('guard')->name("home");

Route::get('/user', [Home::class, "config"])->middleware('guard')->name("user.config");

Route::get('/deposits/{wallet_id?}/{page?}', [Home::class,"deposits"])->middleware('guard')->name("deposits");

Route::get('/withdraws/{wallet_id?}/{page?}', [Home::class,"withdraws"])->middleware('guard')->name("withdraw");

Route::get('/payments/{wallet_id?}/{page?}', [Home::class, "payments"])->middleware('guard')->name("payments");

Route::get('/sends/{wallet_id?}/{page?}', [Home::class,"sends"])->middleware('guard')->name("sends");

Route::get('/received/{wallet_id?}/{page?}', [Home::class ,"received"])->middleware('guard')->name("received");

Route::get('/transation/{type?}/{id?}', [Home::class, "transation"])->middleware('guard')->name("transation.details");

Route::post("/wallet",[Home::class, "createWallet"])->middleware('guard')->name("wallet.create");

Route::put("/wallet/update/{id?}",[Home::class, "updateWallet"])->middleware('guard')->name("wallet.update");

Route::post("/transfer",[Home::class,"createTransfer"])->middleware('guard')->name("transfer.create");

Route::post("/deposit",[Home::class,"createDeposit"])->middleware('guard')->name("deposit.create");

Route::post("/withdraw",[Home::class,"createWithdraw"])->middleware('guard')->name("withdraw.create");

Route::post("/activate/wallet",[Home::class,"activateWallet"])->middleware('guard')->name("activate.wallet");


Route::put("/buy/card",[Home::class,"buyCard"])->middleware('guard')->name("buy.card");