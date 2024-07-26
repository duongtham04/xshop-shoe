@extends('layout')
@section('title', 'Xshop | Giày thể thao')
@section('content')
<div class="container my-5">
          <h1 class="text-center m-3">LIÊN HỆ VỚI XSHOP</h1>
          <div class="row">
               <div class="col-sm-7">
                    <form>
                         <div class="row">
                         <div class="mb-3 col-sm-6">
                              <label for="exampleInputEmail1" class="form-label">Họ và tên của bạn</label>
                              <input type="email" class="form-control border border-1 border-dark" id="exampleInputEmail1">
                         </div>
                         <div class="mb-3 col-sm-6">
                              <label for="exampleInputEmail1" class="form-label">Email</label>
                              <input type="email" class="form-control border border-1 border-dark" id="exampleInputEmail1" placeholder="exam@.com">
                         </div>
                         </div>
     
                         <div class="mb-3">
                             <label for="exampleInputPhone" class="form-label">Số điện thoại</label>
                             <input type="text" class="form-control border border-1 border-dark" id="exampleInputPhone">
                         </div>

                        <div class="mb-3">
                              <label for="exampleInputNote" class="form-label">Nội dung bạn muốn nhắn gửi</label>
                              <textarea class="form-control border border-1 border-dark" id="exampleInputNote" rows="3"></textarea>
                         </div>
                     

                         <div class="mb-3">
                              <button type="submit" class="btn btn-dark px-4">Gửi tới Xshop</button>
                         </div>
                    </form>
               </div>
               <div class="col-sm-5 bg-dark text-light p-3 text-center">
                    <i class="fa-solid fa-mobile-screen-button fa-2xl pb-5"></i>  
                    <h2><strong>032 788 3144</strong></h2>
                    <p class="pb-3">Hỗ trợ từ 9:00 - 21:00</p>
                    <p><strong>Địa chỉ:</strong> Quận 12, TP.HCM</p>
                    <p><strong>Email</strong> xshop12@gmal.com</p>
               </div>
          </div>
</div>
@endsection