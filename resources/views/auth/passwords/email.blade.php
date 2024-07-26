@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <form class="m-auto w-50 pt-4" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="text-center" style="font-size: 30px;">Nhập email của bạn</div>
                    <div class="mb-3">
                         <label for="exampleInputEmail1" class="form-label">Email</label>
                         <input type="email" class="form-control border border-1 border-dark" id="exampleInputEmail1" name="email">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn text-bg-dark">
                                    Gửi
                         </button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
