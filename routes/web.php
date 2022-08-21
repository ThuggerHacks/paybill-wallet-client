<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuth;

Route::get('/login', [UserAuth::class,"login"])->middleware("login.guard")->name("login");

Route::post("/login", [UserAuth::class, "makeLogin"])->middleware("login.guard")->name("login.make");

Route::get('/register', [UserAuth::class,"register"])->middleware("login.guard")->name("register");

Route::post("/register",[UserAuth::class,"registerMake"])->middleware("login.guard")->name("register.make");

Route::get('/forgot/password', [UserAuth::class,"forgot"])->middleware("login.guard")->name("forgot.password");

Route::get("/logout",[UserAuth::class, "logout"])->name("logout");

Route::put("/password/change",[UserAuth::class,"changePassword"])->middleware("guard")->name("change.password");

Route::put("/user/profile",[UserAuth::class, "userProfile"])->middleware("guard")->name("change.profile");

//Route::put("/user/photo",[UserAuth::class,"userUpdatePhoto"])->middleware("guard")->name("change.photo");

Route::get("/verify-email",function(){
    return view("email");
})->middleware("email.verify.middleware")->name("email.verify");
