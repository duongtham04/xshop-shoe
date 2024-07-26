<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Order;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin/admin');
    }
    public function useradmin(){
        return view('admin/useradmin');
    }
    public function comment(){
        return view('admin/comment');
    }

    public function OrderAdmin()
    {
        $orders = Order::All();
        return view('admin.orderadmin', compact('orders'));
    }

    public function OrderDetailAdmin($id)
    {
        $cartItems = Cart::where('id_order', $id)->get();
        return view('admin.order_detailadmin', compact('cartItems'));
    }

    public function updateStatus(Request $request, $id)
    {
    $order = Order::findOrFail($id);
    $order->status = $request->input('status');
    $order->save();
    return redirect()->back()->with('success', 'Trạng thái đơn hàng đã được cập nhật.');
}
}
