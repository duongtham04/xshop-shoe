@extends('admin.layoutadmin')
@section('title', 'Quản trị Xshop')
@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-center">Quản lý Bình luận</h2>
    <div class="card">
      <div class="card-header">
        Bình luận mới nhất
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Nguyễn Văn A</h5>
            <small>3 ngày trước</small>
          </div>
          <p class="mb-1">Sản phẩm rất tốt, tôi rất hài lòng!</p>
          <small><button type="button" class="btn btn-sm btn-outline-primary">Phê duyệt</button> <button type="button" class="btn btn-sm btn-outline-danger">Xóa</button></small>
        </li>
        <li class="list-group-item">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Trần Thị B</h5>
            <small>5 ngày trước</small>
          </div>
          <p class="mb-1">Chất lượng sản phẩm khá tốt nhưng giao hàng chậm.</p>
          <small><button type="button" class="btn btn-sm btn-outline-primary">Phê duyệt</button> <button type="button" class="btn btn-sm btn-outline-danger">Xóa</button></small>
        </li>
        <li class="list-group-item">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Lê Văn C</h5>
            <small>1 tuần trước</small>
          </div>
          <p class="mb-1">Sản phẩm không như mong đợi, cần cải thiện.</p>
          <small><button type="button" class="btn btn-sm btn-outline-primary">Phê duyệt</button> <button type="button" class="btn btn-sm btn-outline-danger">Xóa</button></small>
        </li>
      </ul>
    </div>
  </div>
@endsection