@extends('admin.layoutadmin')
@section('title', 'Quản trị Xshop')
@section('content')
<h1 class="text-center my-3">QUẢN LÝ TÀI KHOẢN</h1>
      <div class="container">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-left: 170px; margin-bottom: 20px;">
               ADD USER
           </button>
           
           <!-- Modal ADD-->
           <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                   <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>
                   <div class="modal-body">
                   <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label"><i class="fa-regular fa-user fa-lg"></i>Tên</label>
                            <input type="text" class="form-control border border-1 border-dark" id="exampleInputEmail1" name="name">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label"><i class="fa-regular fa-user fa-lg"></i>Email</label>
                            <input type="text" class="form-control border border-1 border-dark" id="exampleInputEmail1" name="email">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPhone" class="form-label"><i class="fa-solid fa-phone"></i>Số điện thoại</label>
                            <input type="text" class="form-control border border-1 border-dark" id="exampleInputPhone" name="phone_number">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label"><i class="fa-solid fa-lock"></i>Mật khẩu</label>
                            <input type="password" class="form-control border border-1 border-dark" id="exampleInputPassword1" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label"><i class="fa-solid fa-user-tag"></i> Vai trò</label>
                            <select class="form-control border border-1 border-dark" id="role" name="role" required>
                                <option value="1">User</option>
                                <option value="2">Admin</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-dark px-4">ADD</button>
                        </div>
                        <hr>
                    </form>
                   </div>
               </div>
               </div>
           </div>
           <!-- Modal UPDATE-->
           @foreach( $users as $user )
           <div class="modal fade" id="exampleModalup{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <h3>Thông tin tài khoản</h3>
                        <div class="mb-3">
                             <label for="">Tên: {{ $user -> name }}</label>
                        </div>
                        <div class="mb-3">
                             <label for="">Email: {{ $user -> email }}</label>
                        </div>
                        <div class="mb-3">
                             <label for="">Số điện thoại: {{ $user -> phone_number }}</label>
                        </div>
                        <div class="mb-3">
                             <label for="">Địa chỉ: {{ $user -> address }}</label>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label"><i class="fa-solid fa-user-tag"></i> Vai trò</label>
                            <select class="form-control border border-1 border-dark" id="role" name="role" required>
                                <option value="1"{{ $user->role == 1 ? 'selected' : '' }}>User</option>
                                <option value="2"{{ $user->role == 2 ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>
                        <div class="mb-3">
                             <button class="btn btn-dark float-end">UPDATE</button>
                        </div> 
                    </form>
                </div>
            </div>
            </div>
        </div>
        @endforeach
          <table class="table table-bordered align-middle w-75 text-center m-auto">
               <thead>
                   <tr>
                       <th>STT</th>
                       <th scope="col">Tên</th>
                       <th scope="col">Email đăng nhập</th>
                       <th scope="col">Số điện thoại</th>
                       <th scope="col">Địa chỉ</th>
                       <th scope="col">vai trò</th>
                       <th scope="col" colspan="2">Thao tác</th>
                   </tr>
               </thead>
               @foreach ($users as $index => $user)
                    <tr>
                      <td>{{ $index + 1 }}</td>

                       <td>{{ $user -> name }}</td>

                       <td>{{ $user -> email }}</td>

                       <td class="text-danger">{{$user -> phone_number}}</td>

                        <td>{{$user -> address}}</td>

                        <td>
                            @if($user->role == 1)
                                User
                            @elseif($user->role == 2)
                                Admin
                            @endif
                        </td>

                        <td>
                            <a href="" class="link-danger text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModalup{{ $user->id }}"><i class="fa-solid fa-pen-to-square fa-lg" style="color: #e41b39;"></i> | </a>
                            @if($user->locked)
                                <a type="button" href="{{ route('unlockUser', ['id' => $user->id]) }}"><i class="fa-solid fa-lock fa-lg" style="color: #e41b39;"></i></a>
                            @else
                                <a type="button" class="" href="{{ route('lockUser', ['id' => $user->id]) }}"><i class="fa-solid fa-lock-open fa-lg" style="color: #e41b39;"></i></a>
                            @endif
                        </td>
                   </tr>
                @endforeach
           </table>
      </div>
@endsection