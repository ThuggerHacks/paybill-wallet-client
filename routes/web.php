<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name("home");

Route::get('/user', function () {
    return view('user');
})->name("user.config");

Route::get('/deposits', function () {
    return view('deposits');
})->name("deposits");

Route::get('/withdraws', function () {
    return view('withdraw');
})->name("withdraw");

Route::get('/payments', function () {
    return view('payment');
})->name("payments");

Route::get('/sends', function () {
    return view('send');
})->name("sends");

Route::get('/received', function () {
    return view('received');
})->name("received");

Route::get('/transation/{id?}', function ($id=0) {
    return view('transation');
})->name("transation.details");

Route::get('/login', function ($id=0) {
    return view('login');
})->name("login");

Route::get('/register', function ($id=0) {
    return view('register');
})->name("register");

Route::get('/forgot/password', function ($id=0) {
    return view('forgot');
})->name("forgot.password");

