@extends('layout')
@section('title', 'Xshop | Giày thể thao')
@section('content')
<div class="container me-auto">
     <h1 class="text-center">HỒ SƠ CÁ NHÂN</h1>
     <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row ms-5 ps-5">
            <div class="col-5">
                <div class="mb-3">
                    <label for="name" class="form-label">Tên</label>
                    <input type="text" name="name" class="form-control border border-1 border-dark" value="{{ Auth::user()->name }}">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control border border-1 border-dark" value="{{ Auth::user()->email }}">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" name="password" class="form-control border border-1 border-dark"  disabled>
                </div>

                <div class="mb-3">
                    <label for="phone_number" class="form-label">Số điện thoại</label>
                    <input type="text" name="phone_number" class="form-control border border-1 border-dark" value="{{ Auth::user()->phone_number }}">
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Địa chỉ</label>
                    <input type="text" name="address" class="form-control border border-1 border-dark" value="{{ Auth::user()->address }}">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-dark">Lưu thay đổi</button>
                </div>
            </div>
            <div class="col-7 d-flex flex-column justify-content-center" style="padding-left: 200px;">
                <img src="{{ asset(Auth::user()->avatar) }}" alt="avatar" class="circle-image rounded-circle" name="avatar">
                <input type="file" name="avatar">
            </div>
        </div>
     </form>
</div>
<style>
     .circle-image {
            width: 200px; /* Điều chỉnh kích thước theo ý bạn */
            height: 200px; /* Điều chỉnh kích thước theo ý bạn */
            object-fit: cover; /* Đảm bảo hình ảnh không bị méo */
        }
</style>
@endsection
