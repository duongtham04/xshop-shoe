@extends('layout')
@section('title', 'Xshop | Giày thể thao')
@section('content')
<div class="container">
     <div class="m-auto w-25 pt-4">
          <form>
               <div class="text-center" style="font-size: 30px;">ĐĂNG KÝ</div>
               <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"><i class="fa-regular fa-user fa-lg"></i>Email</label>
                    <input type="email" class="form-control border border-1 border-dark" id="exampleInputEmail1" placeholder="exam@.com">
               </div>

               <div class="mb-3">
                    <label for="exampleInputPhone" class="form-label"><i class="fa-solid fa-phone"></i>Số điện thoại</label>
                    <input type="text" class="form-control border border-1 border-dark" id="exampleInputPhone">
               </div>

               <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"><i class="fa-solid fa-lock"></i>Mật khẩu</label>
                    <input type="password" class="form-control border border-1 border-dark" id="exampleInputPassword1">
                    <label for="">Mật khẩu có ít nhất <span class="text-danger">8</span> ký tự, 1 ký tự viết hoa</label>
               </div>

               <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"><i class="fa-solid fa-lock"></i>Nhập lại mật khẩu</label>
                    <input type="password" class="form-control border border-1 border-dark" id="exampleInputPassword1">
               </div>
               <div class="mb-3">
                    <button type="submit" class="btn btn-dark px-4">Đăng ký</button>
                    <a href="login.html" class="ms-4 text-decoration-none text-danger">Bạn đã có tài khoản?</a>
               </div>
               <hr>
          </form>
     </div>
</div>
@endsection