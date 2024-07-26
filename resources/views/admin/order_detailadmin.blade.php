@extends('admin.layoutadmin')
@section('title', 'Quản trị Xshop')
@section('content')
<div class="container py-5">
    <h3 class="fw-bold">CHI TIẾT ĐƠN HÀNG</h3>
    <div class="col-sm-2 pb-4">
          <a class="btn btn-outline-danger w-100 fw-bold" style="height: 40px" href="/orderadmin">
               <i class="fa-solid fa-arrow-left"></i> QUAY LẠI
          </a>
    </div>
    <table class="table align-middle text-center">
        <thead>
            <tr>
               <th scope="col">STT</th>
               <th scope="col">Mã đơn hàng</th>
               <th scope="col">Tên sản phẩm</th>
               <th scope="col">Hình</th>
               <th scope="col">Giá</th>
               <th scope="col">Số lượng</th>
               <th scope="col">Tổng</th>
               <th scope="col">Ngày mua hàng</th>
            </tr>
        </thead>
        @foreach( $cartItems as $index => $cartItem )
          <tbody>
            <tr>
               <th scope="row">{{ $index + 1 }}</th>
               <td>{{$cartItem -> id_order}}</td>
               <td>{{$cartItem -> name}}</td>
               <td>
                    <img src="{{asset($cartItem -> image)}}" alt="" style="width: 100px" />
               </td>
               <td>{{ number_format($cartItem->price, 0, ',', '.') }} VND</td>
               <td>{{ $cartItem -> quantity }}</td>
               <td>{{ number_format($cartItem->total, 0, ',', '.') }} VND</td>
               <td>{{ $cartItem -> created_at }}</td>
            </tr>
          </tbody>
        @endforeach
    </table>
   
</div>
@endsection