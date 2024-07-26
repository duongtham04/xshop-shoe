@extends('layout')
@section('title', 'Xshop | Giày thể thao')
@section('content')
<div class="container">
          <div class="m-auto w-25 pt-4">
               <form>
                    <div class="text-center" style="font-size: 30px;">Nhập email của bạn</div>
                    <div class="mb-3">
                         <label for="exampleInputEmail1" class="form-label">Email</label>
                         <input type="email" class="form-control border border-1 border-dark" id="exampleInputEmail1" >
                    </div>
                    <div class="mb-3">
                         <a href="#" class="text-decoration-none btn btn-dark">Gửi</a>
                    </div>
               </form>
          </div>
</div>
@endsection