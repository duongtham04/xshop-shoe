<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\apiProductsModel;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $products = Products::productHot();
        $productsNew = Products::productNew();
        $productsView = Products::productView();
        return view('home', compact('products','productsNew','productsView'));
    }
}
