@extends('layout')
@section('content')
<div class="container">
     <div class="m-auto w-25 pt-4">
          @if(session('success'))
               <div class="alert alert-success">
                    {{ session('success') }}
               </div>
          @endif
          @if ($errors->any())
               <div class="alert alert-danger">
                    <ul>
                         @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                         @endforeach
                    </ul>
               </div>
          @endif
          <form method="POST" action="{{ route('register') }}">
               @csrf
               <div class="text-center" style="font-size: 30px;">ĐĂNG KÝ</div>
               <div class="mb-3">
                    <label for="email" class="form-label"><i class="fa-regular fa-user fa-lg"></i>Email</label>
                    <input type="email" name="email" class="form-control border border-1 border-dark" id="email" placeholder="exam@.com">
               </div>

               <div class="mb-3">
                    <label for="phone" class="form-label"><i class="fa-solid fa-phone"></i>Số điện thoại</label>
                    <input type="text" name="phone_number" class="form-control border border-1 border-dark" id="phone">
               </div>

               <div class="mb-3">
                    <label for="password" class="form-label"><i class="fa-solid fa-lock"></i>Mật khẩu</label>
                    <input type="password" name="password" class="form-control border border-1 border-dark" id="password">
                    <!-- <label for="">Mật khẩu có ít nhất <span class="text-danger">8</span> ký tự, 1 ký tự viết hoa</label> -->
               </div>

               <div class="mb-3">
                    <label for="password_confirmation" class="form-label"><i class="fa-solid fa-lock"></i>Nhập lại mật khẩu</label>
                    <input type="password" name="password_confirmation" class="form-control border border-1 border-dark" id="password_confirmation">
               </div>

               <div class="mb-3">
                    <button type="submit" class="btn btn-dark px-4">Đăng ký</button>
                    <a href="/login" class="ms-4 text-decoration-none text-danger">Bạn đã có tài khoản?</a>
               </div>
               <hr>
          </form>
     </div>
</div>
@endsection
