@extends('layout')
@section('title', 'Xshop | Giày thể thao')
@section('content')
<div class="container">
          <div class="m-auto w-25 pt-4">
               <form>
                    <div class="text-center" style="font-size: 30px;">CẬP NHẬT LẠI MẬT KHẨU</div>
                    <div class="mb-3">
                         <label for="exampleInputEmail1" class="form-label">NHẬP MẬT KHẨU</label>
                         <input type="email" class="form-control border border-1 border-dark" id="exampleInputEmail1" >
                    </div>   
                    <div class="mb-3">
                         <label for="exampleInputEmail1" class="form-label">NHẬP LẠI MẬT KHẨU</label>
                         <input type="email" class="form-control border border-1 border-dark" id="exampleInputEmail1" >
                    </div>
               </form>
          </div>
</div>
@endsection