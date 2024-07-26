<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Products;
use App\Models\categories;

class ProductController extends Controller
{
    // public function index(){
    //     $products = Products::productAll();
    //     return view('product', compact('products'));
    // }
    public function index(Request $request)
    {
        $category_id = $request->query('category_id');
        $categories = categories::categoriesAll();

        if($category_id){
            $products = Products::product_page($category_id);
        }else{
            $products = Products::productAll();
        }
        return view('product', compact('products', 'categories'));
    }

    public function productByCategory($category_id)
    {
        $products = Products::product_page($category_id);
        $categories = Categories::categoriesAll();
        return view('product', compact('products', 'categories'));
    }

    public function detailproduct($id)
    {
        $product = Products::productId($id);
        return view('detailproduct', compact('product'));
    }
    
    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Products::searchProduct($query);
        $categories = Categories::categoriesAll();
        return view('product', compact('products', 'categories'))->with('query', $query);
    }

    public function history(){
        return view('history');
    }
}
