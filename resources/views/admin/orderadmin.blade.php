@extends('admin.layoutadmin')
@section('title', 'Quản trị Xshop')
@section('content')
<h1 class="text-center my-3">QUẢN LÝ ĐƠN HÀNG</h1>
<div class="container my-5">
        <table class="table  table-hover align-middle text-center">
          <thead>
            <tr>
              <th scope="col">Mã đơn hàng</th>
              <th scope="col">Tên</th>
              <th scope="col">Địa chỉ</th>
              <th scope="col">Số điện thoại</th>
              <th scope="col">Ngày đặt</th>
              <th scope="col">Tổng cộng</th>
              <th scope="col">Trạng thái</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orders as $index => $order)
            <tr>
                <td>{{ $order ->  id }}</td>
                <td>{{ $order ->  customer_name}}</td>
                <td>{{ $order ->  customer_address}}</td>
                <td>{{ $order ->  customer_phone}}</td>
                <td>{{ $order ->  created_at}}</td>
                <td>{{ number_format($order -> total_amount, 0, ',', '.')}} VND</td>
                <td>
                  <form action="{{ route('update_order_status', $order->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <select name="status" class="form-select status-dropdown text-center w-75" onchange="this.form.submit()">
                        <option value="0" {{ $order->status == '0' ? 'selected' : '' }}>Đang chuẩn bị hàng</option>
                        <option value="1" {{ $order->status == '1' ? 'selected' : '' }}>Đang chuẩn bị giao hàng</option>
                        <option value="2" {{ $order->status == '2' ? 'selected' : '' }}>Đang giao hàng</option>
                        <option value="3" {{ $order->status == '3' ? 'selected' : '' }}>Đã giao hàng</option>
                        <option value="4" {{ $order->status == '4' ? 'selected' : '' }}>Đã hủy đơn hàng</option>
                    </select>
                  </form>
                </td>
                <td>
                    <button class="btn btn-danger">
                      <a href="{{ route('admin.order_detailadmin', $order -> id) }}" class="text-decoration-none text-light">
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