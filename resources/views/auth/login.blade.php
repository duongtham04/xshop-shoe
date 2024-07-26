@extends('layout')
@section('content')
<div class="container">
          <div class="m-auto w-25 pt-4">
               @if(session('error'))
                    <div class="alert alert-danger">
                         {{ session('error') }}
                    </div>
               @endif
               <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="text-center" style="font-size: 30px;">ĐĂNG NHẬP</div>
                    <div class="mb-3">
                         <label for="email" class="form-label"><i class="fa-regular fa-user fa-lg"></i>Email</label>
                         <input type="email" name="email" class="form-control border border-1 border-dark" id="email" placeholder="exam@.com" required>
                    </div>

                    <div class="mb-3">
                         <label for="password" class="form-label"><i class="fa-solid fa-lock"></i>Mật khẩu</label>
                         <input type="password" name="password" class="form-control border border-1 border-dark" id="password" required>
                    </div>

                    <div class="mb-3">
                         <button type="submit" class="btn btn-dark px-4">Đăng nhập</button>
                         <a href="{{ route('password.request') }}" class="ms-4 text-decoration-none text-info">Quên mật khẩu</a>
                    </div>
                    <a href="/register" class="d-flex justify-content-center text-decoration-none text-danger">Tạo tài khoản</a>
                    <hr>
                    <div class="mb-3 d-flex">
                         <button type="button" class="m-2 w-100 p-2 bg-light"><i class="fa-brands fa-facebook fa-lg me-2" style="color: #0165b2;"></i>Facebook</button>
                         <button type="button" class="m-2 w-100 p-2 bg-light"><i class="fa-brands fa-google fa-lg me-2" style="color: #63E6BE;"></i>Google</button>
                    </div>
               </form>
          </div>
      </div>
@endsection
