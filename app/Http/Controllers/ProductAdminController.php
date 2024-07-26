<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\categories;
use Illuminate\Support\Facades\Storage;

class ProductAdminController extends Controller
{
    public function index()
    {
        $products = Products::productAlladmin();
        $categories = categories::categoriesAlladmin();
        return view('admin.productadmin', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = categories::categoriesAlladmin();
        return view('admin.productadmin', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->only(['name', 'description', 'price', 'category_id']);
        // Upload hình ảnh
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'upload/' . $imageName;
            $image->move(public_path('upload'), $imageName);
            $data['img'] = url($imagePath);
        }
        Products::create($data);
        // Chuyển hướng
        return redirect()->route('admin.productadmin')->with('success', 'Thêm sản phẩm thành công!');
    }

    public function destroy($id){
        $product = Products::findOrFail($id);
        // Xóa file hình ảnh nếu tồn tại
        if ($product->img) {
            $filePath = public_path($product->img);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
        }
        $product->delete();
        return redirect()->route('admin.productadmin')->with('success', 'Product deleted successfully!');
    }

    public function edit($id)
    {
        $products = Products::findOrFail($id);
        $categories = Categories::categoriesAll();
        return view('products.edit', compact('products', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Products::findOrFail($id);
        $data = $request->only(['name', 'description', 'price', 'category_id']);
        
        if ($request->hasFile('img')) {
            if ($product->img) {
                $filePath = public_path($product->img);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            $image = $request->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'upload/' . $imageName;
            $image->move(public_path('upload'), $imageName);
            $data['img'] = url($imagePath);
        }
        
        $product->update($data);
        return redirect()->route('admin.productadmin')->with('success', 'Product updated successfully!');
    }

    public function searchpdadmin(Request $request)
    {
        $query = $request->input('query');
        $products = Products::searchProduct($query);
        $categories = Categories::categoriesAll();
        return view('admin.productadmin', compact('products', 'categories'))->with('query', $query);
    }

        
}
?>