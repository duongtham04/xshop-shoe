@extends('layout')
@section('title', 'Xshop | Giày thể thao')
@section('content')
<div class="container py-5 my-5">
    <form class="row" action="{{ route('payment') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-sm-6">
            <h5 class="fw-bold">THANH TOÁN VÀ GIAO HÀNG</h5>
            <hr/>
            @if(Auth::user())
                <div class="mb-3">
                    <label for="" class="fw-bold">Họ và tên:</label>
                    <input type="text" placeholder="Họ và tên" class="form-control" name="customer_name" value="{{ Auth::user() -> name}}"/>
                </div>

                <div class="mb-3">
                    <label for="" class="fw-bold">Tỉnh thành:</label>
                    <input type="text" placeholder="Địa chỉ" class="form-control" name="customer_address" value="{{ Auth::user() -> address}}"/>
                </div>

                <div class="mb-3">
                    <label for="" class="fw-bold">Số điện thoại:</label>
                    <input type="text" placeholder="Số điện thoại" class="form-control" name="customer_phone" value="{{ Auth::user() -> phone_number}}"/>
                </div>

                <div class="mb-3">
                    <label for="" class="fw-bold">Địa chỉ email:</label>
                    <input type="text" placeholder="Email" class="form-control" required name="customer_email" value="{{ Auth::user() -> email}}"/>
                </div>
            @else
                <div class="mb-3">
                    <label for="" class="fw-bold">Họ và tên:</label>
                    <input type="text" placeholder="Họ và tên" class="form-control" name="customer_name"/>
                </div>

                <div class="mb-3">
                    <label for="" class="fw-bold">Địa chỉ:</label>
                    <input type="text" placeholder="Địa chỉ" class="form-control" name="customer_address" />
                </div>

                <div class="mb-3">
                    <label for="" class="fw-bold">Số điện thoại:</label>
                    <input type="text" placeholder="Số điện thoại" class="form-control" name="customer_phone"/>
                </div>

                <div class="mb-3">
                    <label for="" class="fw-bold">Địa chỉ email:</label>
                    <input type="text" placeholder="Email" class="form-control" required name="customer_email"/>
                </div>
            @endif  
            <div class="accordion row g-2" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Thông tin người nhận khác
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row g-2">
                                    <label for="receiver_name" class="fw-bold">Họ và tên người nhận:</label>
                                    <input type="text" placeholder="Họ và tên" name="receiver_name" class="form-control" />
                                </div>

                                <div class="row g-2">
                                    <label for="receiver_address" class="fw-bold">Địa chỉ người nhận:</label>
                                    <input type="text" placeholder="Địa chỉ" name="receiver_address" class="form-control" />
                                </div>

                                <div class="row g-2">
                                    <label for="receiver_phone" class="fw-bold">Số điện thoại người nhận:</label>
                                    <input type="text" placeholder="Số điện thoại" name="receiver_phone" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
        </div>
        
        <div class="col-sm-6">
            <h5 class="fw-bold text-center">ĐƠN HÀNG CỦA BẠN</h5>
            <div class="card">
                <div class="card-body">
                    @foreach($cart as $index => $showcart)
                    <div class="row">
                        <img class="col-sm-2" src="{{ $showcart['img'] }}" alt="" width="25px" />
                        <p class="col-sm-5">{{ $showcart['name'] }} x {{ $showcart['quantity'] }}</p>
                        <p class="col-sm-5 text-end">{{ number_format($showcart['price'], 0, ',', '.') }} đ</p>
                    </div>
                    <br>
                    @endforeach
                    <div class="row">
                        <h6 class="col-sm-4 fw-bold">Tạm tính:</h6>
                        <p class="col-sm-8 text-end">{{ number_format($totalAmount), 0, ',', '.'}} đ</p>
                    </div>
                    <div class="row">
                        <h6 class="col-sm-4 fw-bold">Giao hàng:</h6>
                        <p class="col-sm-8 text-end">
                        Tiêu chuẩn (3-4 ngày): <span class="fw-bold">35,000₫</span>
                        </p>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" />
                        <label class="form-check-label" for="flexRadioDefault1">
                            Thanh toán khi nhận hàng (COD)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked />
                        <label class="form-check-label" for="flexRadioDefault2">
                            Chuyển khoản ngân hàng
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" checked />
                        <label class="form-check-label" for="flexRadioDefault3">
                            Chuyển qua MOMO
                        </label>
                    </div>
                    <hr />
                    <div class="row">
                        <h6 class="col-sm-6 fw-bold">Thành tiền:</h6>
                        <p class="col-sm-6 text-end">{{ number_format($totalAmount + 35000), 0, ',', '.' }} đ</p>
                    </div>
                    <div class="col-sm-12 pb-4">
                        <button type="submit" class="w-100 fw-bold text-bg-danger" style="height: 40px">
                                THANH TOÁN</a>
                        </button>
                    </div>
            </div>
        </div>
    </div>
  </div>
    </form>
</div>
@endsection