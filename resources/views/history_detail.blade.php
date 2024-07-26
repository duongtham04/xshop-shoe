@extends('layout')
@section('title', 'Xshop | Giày thể thao')
@section('content')
<div class="container py-5">
    <h3 class="fw-bold">CHI TIẾT ĐƠN HÀNG</h3>
    @foreach( $cartItems as $index => $cartItem )
    <div class="row mb-3">
        <div class="col-md-6">
            <h5>Mã đơn hàng: {{$cartItem -> id_order}}</h5>
            <p>Ngày đặt hàng: {{$cartItem -> created_at}}</p>
          </div>
    </div>
    <table class="table align-middle text-center">
        <thead>
            <tr>
               <th scope="col">STT</th>
               <th scope="col">Hình</th>
               <th scope="col">Tên sản phẩm</th>
               <th scope="col">Giá</th>
               <th scope="col">Số lượng</th>
            </tr>
        </thead>
        <tbody>
            <tr>
               <th scope="row">1</th>
               <td>
                    <img src="{{asset($cartItem -> image)}}" alt="" style="width: 80px" />
               </td>
               <td>{{$cartItem -> name}}</td>
               <td>{{ number_format($cartItem->price, 0, ',', '.') }} VND</td>
               <td>{{ $cartItem -> quantity }}</td>
            </tr>
        </tbody>
    </table>
    @endforeach
    <div class="col-sm-2 pb-4">
          <a class="btn btn-outline-danger w-100 fw-bold" style="height: 40px" href="/history">
               <i class="fa-solid fa-arrow-left"></i> QUAY LẠI
          </a>
    </div>
   
</div>
@endsection