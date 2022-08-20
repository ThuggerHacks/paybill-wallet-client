<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuth;

Route::get('/login', [UserAuth::class,"login"])->middleware("login.guard")->name("login");

Route::post("/login", [UserAuth::class, "makeLogin"])->middleware("login.guard")->name("login.make");

Route::get('/register', [UserAuth::class,"register"])->middleware("login.guard")->name("register");

Route::post("/register",[UserAuth::class,"registerMake"])->middleware("login.guard")->name("register.make");

Route::get('/forgot/password', [UserAuth::class,"forgot"])->middleware("login.guard")->name("forgot.password");

Route::get("/logout",[UserAuth::class, "logout"])->name("logout");

Route::get("/verify-email",function(){
    return view("email");
})->middleware("email.verify.middleware")->name("email.verify");

Route::get('/', function () {
    return view('home');
})->middleware('guard')->name("home");

Route::get('/user', function () {
    return view('user');
})->middleware('guard')->name("user.config");

Route::get('/deposits', function () {
    return view('deposits');
})->middleware('guard')->name("deposits");

Route::get('/withdraws', function () {
    return view('withdraw');
})->middleware('guard')->name("withdraw");

Route::get('/payments', function () {
    return view('payment');
})->middleware('guard')->name("payments");

Route::get('/sends', function () {
    return view('send');
})->middleware('guard')->name("sends");

Route::get('/received', function () {
    return view('received');
})->middleware('guard')->name("received");

Route::get('/transation/{id?}', function ($id=0) {
    return view('transation');
})->middleware('guard')->name("transation.details");
