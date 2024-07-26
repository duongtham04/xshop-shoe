<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\categories;
use App\Models\Products;

class CategoryAdminController extends Controller
{
    public function index(){
        $categories = Categories::categoriesAlladmin();
        return view('admin.categoryadmin', compact('categories'));
    }
    public function create()
    {
        return view('admin.categoryadmin');
    }

    public function Category_detailadmin($id)
    {
        $productItems = Products::where('category_id', $id)->get();
        return view('admin.category_detailadmin', compact('productItems'));
    }

    public function store(Request $request)
    {
        $data = $request->only(['name']);
        Categories::create($data);
        return redirect()->route('admin.categoryadmin')->with('success', 'Thêm danh mục thành công!');
    }

    public function destroy($id){
        $category = Categories::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.categoryadmin')->with('success', 'xóa danh mục thành công!');
    }
    public function edit($id)
    {
        $category = Categories::findOrFail($id);
        $categories = Categories::categoriesAlladmin();
        return view('categories.edit', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $category = Categories::findOrFail($id);
        $data = $request->only(['name']);
        
        $category ->update($data);
        return redirect()->route('admin.categoryadmin')->with('success', 'Product updated successfully!');
    }
}
