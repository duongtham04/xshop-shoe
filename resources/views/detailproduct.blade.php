@extends('layout')
@section('title', 'Xshop | Giày thể thao')
@section('content')
<div class="container py-4">
        <div>Home->Product->Detail</div>
          <div class="row">
               <div class="col-sm-7">
                    <div class="row m-auto">
                        <div class="col-11 m-2">
                            <img src="{{ asset( $product->img ) }}" alt="" srcset="" class="w-100">
                        </div>
                    </div>
               </div>
               <div class="col-sm-5 pe-5">
                        <form action="{{ route('addToCart') }}" method="POST" class="col-9">
                         @csrf
                        <input type="hidden" name="id_product" value="{{ $product->id }}">
                        <h4>{{ $product->name }}</h4>
                        <div class="row w-75 mb-2">
                            <span class="col-6">125 đánh giá</span>
                            <span class="col-6">200 lượt thích</span>
                        </div>
                        <h5 class="text-danger my-4">{{ number_format($product->price) }} VNĐ</h5>

                        <h5>Số lượng</h5>
                        <input type="number" class="form-control text-center m-2" name="quantity" value="1" min="1" style="max-width: 100px;">
                            <div class="row">
                                <div class="col-4">
                                    <button class="btn btn-danger" type="submit">Mua ngay</button>
                                </div>
                                <div class="col-8">
                                    <button class="btn btn-outline-danger" type="submit"><i class="fa-solid fa-cart-shopping" style="color: #e60f0f;"></i>Thêm vào giỏ hàng</button>
                                </div>
                            </div>
                        </form>
                   
                        <div class="row my-3 text-center">
                            <div class="col-4 text-center">
                                <img src="{{asset('img/icon3.jpg')}}" alt="" style="max-width: 30px;">
                                <p style="font-size: 12px;">Bảo hành keo vĩnh viễn</p>
                            </div>
                            <div class="col-4 text-center">
                                <img src="{{asset('img/icon4.jpg')}}" alt="" style="max-width: 30px;">
                                <p style="font-size: 12px;">Miễn phí vận chuyển toàn quốc
                                    cho đơn hàng từ 150k</p>
                            </div>
                            <div class="col-4 text-center">
                                <img src="{{asset('img/icon5.jpg')}}" alt="" style="max-width: 30px;">
                                <p style="font-size: 12px;">Đổi trả dễ dàng
                                    (trong vòng 7 ngày nếu lỗi nhà sản xuất)</p>
                            </div>
                            <div class="col-4 text-center">
                                <img src="{{asset('img/icon2.jpg')}}" alt="" style="max-width: 30px;">
                                <p style="font-size: 12px;">Hotline 1900.633.349
                                    hỗ trợ từ 8h30-21h30</p>
                            </div>
                            <div class="col-4 text-center">
                                <img src="{{asset('img/icon1.jpg')}}" alt="" style="max-width: 30px;">
                                <p style="font-size: 12px;">Giao hàng tận nơi,
                                    nhận hàng xong thanh toán</p>
                            </div>
                            <div class="col-4 text-center">
                                <img src="{{asset('img/icon3.jpg')}}" alt="" style="max-width: 30px;">
                                <p style="font-size: 12px;">Ưu đãi tích điểm và
                                    hưởng quyền lợi thành viên từ XSHOP</p>
                            </div>
                        </div>

               </div>
          </div>
        <div class="border border-1 border-black">
          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Mô tả</button>
              <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Đánh giá</button>   
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                <div class="container">
                <p>
                    <strong>Ô TẢ SẢN PHẨM : Giày Thể Thao Nam MWC NATT- 5703</strong><br>

                    <li>Giày được thiết kế dáng buộc dây năng động,mặt giày sử dụng da lộn phối vải dệt thời trang, phối màu trẻ trung phong cách.</li><br>

                    <li>Đặc biệt sản phẩm sử dụng chất liệu cao cấp có độ bền tối ưu giúp bạn thoải mái trong mọi hoàn cảnh.</li><br>

                    <li>Giày thoáng khí cả mặt trong lẫn mặt ngoài khiến người mang luôn cảm thấy dễ chịu dù hoạt động trong thời gian dài.</li><br>

                    <strong>CHI TIẾT SẢN PHẨM</strong><br>

                    <li>Chiều cao : khoảng 3cm</li><br>

                    <li>Chất liệu : da lộn phối vải dệt</li><br>

                    <li>Đế : êm mềm, độ đàn hồi tốt, chống trơn trượt</li><br>

                    <li>Kiểu dáng : giày Sneaker cổ thấp</li><br>

                    <li>Màu sắc : Trắng xám - Đen trắng</li><br>

                    <li>Size : 38 - 39 - 40 - 41 </li><br>

                    <li>Xuất xứ : Việt Nam </li><br>

                    <li>Chú ý : Kích thước so sánh một cách cẩn thận,vui lòng cho phép sai số 1-3 cm do đo lường thủ công</li><br>
                    
                    <li>Do màn hình hiển thị khác nhau và ánh sáng khác nhau, hình ảnh có thể chênh lệch 5->10% màu sắc thật của sản phẩm.</li><br>

                    <li>Cảm ơn bạn đã thông cảm.</li>
                </p>
            </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                <div class="container">
                    <h4>Chưa có đánh giá</h4>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">...</div>
            <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">...</div>
          </div>
        </div>

        <div class="row my-4">
            <p>Có thể bạn sẽ thích</p>
            <div class="col-sm-3 poly-prod">          
                <div class=" rounded w-100 py-2 product productsp">
                     <div>
                          <img src="img/z3670524548451_164c45a47d467ce7957e23cff6badeb1-300x300.jpg" alt="">
                     </div>
                     <h7>
                          Giày Thể Thao Nam NATT- 5703
                     </h7>
                     <div class="mb-2 text-danger-emphasis">
                          600.000 VNĐ        
                     </div>
                     
                </div>     
           </div>
           <div class="col-sm-3 poly-prod">          
                <div class=" rounded w-100 py-2 product productsp">
                     <div>
                          <img src="img/z3728988919198_322c6eccb2cadf5cf0ac52f79f6dc781-300x300.jpg" alt="">
                     </div>
                     <h7>
                          Giày Thể Thao Nam NATT- 5703
                     </h7>
                     <div class="mb-2 text-danger-emphasis">
                          450.000 VNĐ        
                     </div>
                     
                </div>     
           </div>
           <div class="col-sm-3 poly-prod">          
                <div class=" rounded w-100 py-2 product productsp">
                     <div>
                          <img src="img/z3922872057231_857ed08c294f0f86a4fdca9963ec19e7-300x300.jpg" alt="">
                     </div>
                     <h7>
                          Giày Thể Thao Nam NATT- 5703
                     </h7>
                     <div class="mb-2 text-danger-emphasis">
                          250.000 VNĐ        
                     </div>
                     
                </div>     
           </div>
           <div class="col-sm-3 poly-prod">          
                <div class=" rounded w-100 py-2 product productsp">
                     <div>
                          <img src="img/giaynam.jpg" alt="">
                     </div>
                     <h7>
                          Giày Slipon nam MWC NASL- 6067
                     </h7>
                     <div class="mb-2 text-danger-emphasis">
                          130.000 VNĐ        
                     </div>     
                </div>     
           </div>
        </div>
</div>
@endsection