<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Order;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class CartController extends Controller
{
    public function cart(){
        $cart = session()->get('cart', []);
        $totalAmount = 0;
        // Tính tổng thành tiền
        foreach ($cart as $item) {
            $totalAmount += $item['total'];
        }
        return view('cart', compact('cart', 'totalAmount'));
    }
    
    public function cartDetail(){
        $cart = session()->get('cart', []);
        $totalAmount = 0;
        // Tính tổng thành tiền
        foreach ($cart as $item) {
            $totalAmount += $item['total'];
        }
        return view('cart_detail', compact('cart', 'totalAmount'));
    }

    public function addTOCart(Request $request){
        $id = $request->input('id_product');
        $product = Products::find($id);

        $cartItem = [
            'id_product' => $product->id,
            'name' => $product->name,
            'img' => $product->img,
            'price' => $product->price,
            'quantity' => $request->input('quantity'),
            'total' => $product->price * $request->input('quantity'),
        ];

        $cart = session()->get('cart', []);

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
        $found = false;
        foreach ($cart as &$item) {
            if ($item['id_product'] == $cartItem['id_product']) {
                // Cập nhật số lượng và tổng thành tiền
                $item['quantity'] += $cartItem['quantity'];
                $item['total'] = $item['price'] * $item['quantity'];
                $found = true;
                break;
            }
        }
        if (!$found) {
            $cart[] = $cartItem;
        }

        session()->put('cart', $cart);

        return redirect()->route('cart');
    }

    public function payment(Request $request)
    {
        $paymentMethod = $request->input('payment_method');
        if ($paymentMethod === 'momo') {
            return $this->Momo($request);
        } elseif ($paymentMethod === 'vnpay') {
            return $this->createVNPayUrl($request);
        }

        $id_user = Auth::id();

        if (!$id_user) {
            $user = User::create([
                'name' => $request->input('customer_name'),
                'email' => $request->input('customer_email'),
                'address' => $request->input('customer_address'),
                'phone' => $request->input('customer_phone'),
            ]);
            $id_user = $user->id;
        }

        $data = $request->only([
            'receiver_name',
            'receiver_phone',
            'receiver_address',
            'customer_name',
            'customer_email',
            'customer_address',
            'customer_phone',
            'payment_method'
        ]);

        $cart = session()->get('cart', []);
        $totalAmount = array_sum(array_column($cart, 'total'));

        // Thêm thông tin người đặt hàng vào thông tin người nhận nếu không có thông tin riêng
        if (empty($data['receiver_name']) || empty($data['receiver_phone']) || empty($data['receiver_address'])) {
            $data['receiver_name'] = $data['customer_name'];
            $data['receiver_phone'] = $data['customer_phone'];
            $data['receiver_address'] = $data['customer_address'];
        }

        $data['total_amount'] = $totalAmount;
        $data['id_user'] = $id_user;

        $order = Order::create($data);
        $order_id = $order->id;

        foreach ($cart as $item) {
            Cart::create([
                'id_product' => $item['id_product'],
                'name' => $item['name'],
                'image' => $item['img'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'total' => $item['total'],
                'id_order' => $order_id,
            ]);
        }

        session()->forget('cart');

        return redirect()->route('cartDetail')->with('success', 'Order placed successfully!');
    }

    public function orderhistory()
    {
        if (Auth::check()) {
            $id_user = Auth::id();
        } 
        $orders = Order::where('id_user', $id_user)->get();
        return view('history', compact('orders'));
    }

    public function detailOrder($id)
    {
        $cartItems = Cart::where('id_order', $id)->get();
        return view('history_detail', compact('cartItems'));
    }

    public function removeCart($id)
    {
        $cart = session()->get('cart', []);

        foreach ($cart as $key => $item) {
            if ($item['id_product'] == $id) {
                unset($cart[$key]);
                break;
            }
        }
        session()->put('cart', $cart);

        return redirect()->route('cart');
    }
}
