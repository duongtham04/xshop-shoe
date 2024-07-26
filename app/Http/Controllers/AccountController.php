<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function forgot(){
        return view('forgotpassword');
    }
    public function reset(){
        return view('resetpassword');
    }

    public function hoso(){
        return view('hoso');
    }
}
