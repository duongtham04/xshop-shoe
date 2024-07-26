@extends('admin.layoutadmin')
@section('title', 'Quản trị Xshop')
@section('content')
<div class="container py-5 m-auto">
    <div class="col-sm-2 pb-4 m-auto">
          <a class="btn btn-outline-danger w-100 fw-bold" style="height: 40px" href="/categoryadmin">
               <i class="fa-solid fa-arrow-left"></i> QUAY LẠI
          </a>
    </div>
    <table class="table table-hover align-middle w-75 text-center m-auto">
               <thead>
                   <tr>
                       <th>STT</th>
                       <th scope="col">Hình</th>
                       <th scope="col">Tên</th>
                       <th scope="col">Đơn giá</th>
                       <th scope="col">Số lượng</th>
                   </tr>
               </thead>
               @foreach ($productItems as $index => $product)
                   <tr>
                      <td>{{ $index + 1}}</td>

                       <td><img src="{{ $product -> img }}" alt="{{ $product -> name }}" style="width:60px"></td>

                       <td>{{ $product -> name }}</td>

                       <td class="text-danger">{{ number_format($product -> price, 0, ',', '.') }} VND</td>

                       <td>Số lượng: {{ $product -> sold }}</td>
                   </tr>
               @endforeach
           </table>
   
</div>
@endsection