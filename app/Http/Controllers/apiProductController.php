<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\apiProductsModel as Product;

class apiProductController extends Controller
{
    public function index()
    {
        return Product::orderBy('id', 'desc')->get();
    }

    public function products_lasted()
    {
        return Product::orderBy('id', 'desc')->limit(8)->get();
    }

    public function products_bestseller()
    {
        return Product::orderBy('sold', 'desc')->limit(8)->get();
    }

}
