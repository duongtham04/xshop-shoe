@extends('layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}" class="w-50 m-auto">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="text-center mb-4" style="font-size: 30px;">CẬP NHẬT LẠI MẬT KHẨU</div>

                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="Email" value="{{ $email ?? old('email') }}" required autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" placeholder="Mật khẩu mới" required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" class="form-control" name="password_confirmation"
                                placeholder="Xác nhận mật khẩu" required>
                        </div>
                        <!-- Submit Button -->
                        <div class="mb-3">
                                <button type="submit" class="btn btn-dark">
                                    Lưu
                                </button>
                        </div>
                        <!-- Success Message -->
                        @if (session('status'))
                            <div class="alert alert-success mt-3">
                                {{ session('status') }}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
