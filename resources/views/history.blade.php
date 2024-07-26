@extends('layout')
@section('title', 'Xshop | Giày thể thao')
@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-center">Lịch sử mua hàng</h2>
        <table class="table table-hover align-middle text-center">
          <thead>
            <tr>
              <th scope="col">STT</th>
              <th scope="col">Mã đơn hàng</th>
              <th scope="col">Tên</th>
              <th scope="col">Ngày đặt</th>
              <th scope="col">Tổng cộng</th>
              <th scope="col">Trạng thái</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
           @foreach($orders as $index => $order)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $order -> id}}</td>
                <td>{{ $order -> customer_name}}</td>
                <td>{{ $order -> created_at}}</td>
                <td>{{ number_format($order -> total_amount, 0, ',', '.')}} VND</td>
                <td>
                    @if($order->status == 0)
                            <span class="badge bg-warning text-dark">
                                <i class="fas fa-box"></i> Đang chuẩn bị hàng
                            </span>
                        @elseif($order->status == 1)
                            <span class="badge bg-info text-dark">
                                <i class="fas fa-truck-loading"></i> Đang chuẩn bị giao hàng
                            </span>
                        @elseif($order->status == 2)
                            <span class="badge bg-primary text-light">
                                <i class="fas fa-shipping-fast"></i> Đang giao hàng
                            </span>
                        @elseif($order->status == 3)
                            <span class="badge bg-success text-light">
                                <i class="fas fa-check"></i> Đã giao hàng
                            </span>
                        @elseif($order->status == 4)
                            <span class="badge bg-danger text-light">
                                <i class="fas fa-times"></i> Đã hủy
                            </span>
                        @endif
                </td>
                <td>
                  <button class="btn btn-danger">
                    <a href="{{route('history_detail', $order -> id)}}" class="text-decoration-none text-light">
                        Xem chi tiết
                    </a>
                    </button>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
</div>
@endsection