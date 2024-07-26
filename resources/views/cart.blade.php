@extends('layout')
@section('title', 'Xshop | Giày thể thao')
@section('content')
<div class="container m-auto my-5">
     <div class="row">
          <div class="col-8">
               <table class="table table-hover align-middle w-100 text-center">
                    <thead>
                         <tr>
                              <th scope="col">Tên</th>
                              <th scope="col">Hình</th>
                              <th scope="col">Đơn giá</th>
                              <th scope="col">Số lượng</th>
                              <th scope="col">Thao tác</th>
                         </tr>
                    </thead>
                    @foreach ($cart as $showcart)
                         <tr>
                              <td>{{ $showcart['name'] }}</td>

                              <td><img src="{{$showcart['img']}}" alt="" style="width:60px"></td>

                              <td class="text-danger">{{ number_format($showcart['price'], 0, ',', '.') }} VNĐ</td>

                              <td style="max-width: 10px;">Số lượng: {{ $showcart['quantity'] }}</td>

                              <td style="max-width: 15px;">
                                  <form action="{{ route('removeCart', ['id' => $showcart['id_product']]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link"><i class="fa-solid fa-trash" style="color: #e41b39;"></i></button>
                                        <input type="hidden" name="_method" value="DELETE">
                                   </form>
                              </td>
                         </tr>
                    @endforeach
               </table>
          </div>
          <div class="col-4">
                <div class="d-flex flex-row justify-content-between m-2">
                    <span>Tổng tiền hàng</span>
                    <span id="spanTongTienHang">{{ number_format($totalAmount, 0, ',', '.') }} VNĐ</span>
                </div>
                <div class="d-flex flex-row justify-content-between m-2">
                    <span>Giảm giá sản phẩm</span>
                    <span id="spanGiamGia">- 00 VNĐ</span>
                </div>
                <div class="d-flex flex-row justify-content-between m-2">
                    <span>Giảm giá coupon</span>
                    <span id="spanGiamGiaCoupon">- 00 VNĐ</span>
                </div>
                <div class="d-flex flex-row justify-content-between m-2">
                    <span>Phí vận chuyển</span>
                    <span id="shipingfee">00 VNĐ</span>
                </div>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom"></div>
               <div class="d-flex flex-row justify-content-between m-2">
                    <span style="color:#ee4d2d">TỔNG</span>
                    <span id="spanTotal" style="color:#ee4d2d">{{ number_format($totalAmount, 0, ',', '.') }} VNĐ</span>
               </div>
               <div class="d-flex flex-row justify-content-between m-2">
                    <button class="btn btn-danger" type="submit">
                         <a href="/cartDetail" class="text-light text-decoration-none">
                              Thanh toán
                         </a>
                    </button>
               </div>
          </div>
     </div>
     <a class="btn btn-outline-danger w-100 fw-bold" style="height: 40px" href="/product">
               <i class="fa-solid fa-arrow-left"></i> TIẾP TỤC MUA HÀNG
     </a>
</div>
@endsection