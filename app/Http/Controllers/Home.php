<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home extends Controller
{
    public  function index() {
        return view('home');
    }

    public function config() {
        return view('user');
    }

    public function deposits() {
        return view('deposits');
    }

    public function withdraws() {
        return view('withdraw');
    }

    public function payments() {
        return view('payment');
    }

    public function sends() {
        return view('send');
    }

    public function received() {
        return view('received');
    }

    public function transation($id=0) {
        return view('transation');
    }
}
