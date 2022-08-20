<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;


Route::get('/',[Home::class,"index"])->middleware('guard')->name("home");

Route::get('/user', [Home::class, "config"])->middleware('guard')->name("user.config");

Route::get('/deposits', [Home::class,"deposits"])->middleware('guard')->name("deposits");

Route::get('/withdraws', [Home::class,"withdraws"])->middleware('guard')->name("withdraw");

Route::get('/payments', [Home::class, "payments"])->middleware('guard')->name("payments");

Route::get('/sends', [Home::class,"sends"])->middleware('guard')->name("sends");

Route::get('/received', [Home::class ,"received"])->middleware('guard')->name("received");

Route::get('/transation/{id?}', [Home::class, "transation"])->middleware('guard')->name("transation.details");
