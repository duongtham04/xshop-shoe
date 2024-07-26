@extends('layout')
@section('title', 'Xshop | Giày thể thao')
@section('content')
<div class="container">
          <div class="m-auto w-25 pt-4">
               <form>
                    <div class="text-center" style="font-size: 30px;">ĐĂNG NHẬP</div>
                    <div class="mb-3">
                         <label for="exampleInputEmail1" class="form-label">Nhập Email</label>
                         <input type="email" class="form-control border border-1 border-dark" id="exampleInputEmail1" >
                    </div>

                    <div class="mb-3">
                         <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                         <input type="password" class="form-control border border-1 border-dark" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                         <button type="submit" class="btn btn-dark">Đăng nhập</button>
                         <a href="/forgot" class="ms-4 text-decoration-none text-primary">Quên mật khẩu</a>
                    </div>
                    <a href="/register" class="d-flex justify-content-center text-decoration-none text-danger">Tạo tài khoản</a>
                    <hr>
                    <div class="mb-3 d-flex ">
                         <button type="button" class="m-2 w-100 p-2 bg-light"><i class="fa-brands fa-facebook fa-lg me-2" style="color: #0165b2;"></i>Facebook</button>
                         <button type="button" class="m-2 w-100 p-2 bg-light"><i class="fa-brands fa-google fa-lg me-2" style="color: #63E6BE;"></i>Google</button>
                    </div>
               </form>
          </div>
      </div>
@endsection