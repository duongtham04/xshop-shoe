<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        return view('about');
    }
    public function blog1(){
        return view('blog1');
    }
    public function blog2(){
        return view('blog2');
    }
}
