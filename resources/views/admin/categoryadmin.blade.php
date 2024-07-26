@extends('admin.layoutadmin')
@section('title', 'Quản trị Xshop')
@section('content')
<h1 class="text-center my-3">QUẢN LÝ DANH MỤC</h1>
      <div class="container">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-left: 170px; margin-bottom: 20px;">
               ADD Category
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
                        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="">Tên danh mục</label>
                                <input type="text" class="form-control" placeholder="Thêm tên sản phẩm" name="name">
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-dark float-end" type="submit">ADD</button>
                            </div>    
                        </form>
                   </div>
               </div>
               </div>
           </div>
           <!-- Modal UPDATE-->
           @foreach( $categories as $category )
           <div class="modal fade" id="exampleModalup{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <div class="mb-3">
                            <label for="">Tên danh mục</label>
                            <input type="text" class="form-control" placeholder="Thêm tên sản phẩm" name="name" value="{{$category -> name}}">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-dark float-end" type="submit">UPDATE</button>
                        </div>        
                    </form>
                </div>
            </div>
            </div>
        </div>
        @endforeach
          <table class="table table-hover align-middle w-75 m-auto">
               <thead>
                
                   <tr class="text-center">
                       <th>STT</th>
                       <!-- <th scope="col">IMG</th> -->
                       <th scope="col">Tên danh mục</th>
                       <th scope="col" colspan="2">Ngày</th>
                       <th scope="col">Thao tác</th>
                   </tr>
               </thead>
               @foreach ($categories as $index => $category)
                   <tr>
                      <td class="text-center">{{ $index + 1}}</td>

                       <td class="text-center">{{ $category -> name }}</td>

                       <td class="text-center">{{ $category -> created_at }}</td>

                       <td class="text-center">{{ $category -> updated_at }}</td>
                       <td style="max-width: 15px;" class="text-center">
                       <button type="submit" class="btn btn-link link-danger text-decoration-none p-0 m-0" data-bs-toggle="modal" data-bs-target="#exampleModalup{{$category->id}}">
                            <i class="fa-solid fa-pen-to-square" style="color: #e41b39;"></i> |
                        </button>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link link-danger text-decoration-none p-0 m-0"  onclick="return confirm('Bạn có muốn xóa danh mục này?')">
                                    <i class="fa-solid fa-trash" style="color: #e41b39;"></i>
                                </button>
                            </form>
                       </td>
                       <td>
                        <button class="btn btn-danger">
                            <a href="{{ route('admin.category_detailadmin', $category -> id) }}" class="text-decoration-none text-light">
                                Xem chi tiết
                            </a>
                        </button>
                         </td>
                   </tr>
                @endforeach
           </table>
           <div class="d-flex justify-content-center pb-5 m-2">
               <nav aria-label="...">
               <ul class="pagination justify-content-center">
                    @if ($categories->previousPageUrl())
                    <li class="page-item">
                        <a class="page-link" href="{{ $categories->previousPageUrl() }}" rel="prev">
                        <i class="fa-solid fa-angles-right fa-rotate-180"></i>
                        </a>
                    </li>
                    @else
                    <li class="page-item disabled">
                        <span class="page-link"><i class="fa-solid fa-angles-right fa-rotate-180"></i></span>
                    </li>
                    @endif

                    @foreach ($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)
                         <li class="page-item {{ $page == $categories->currentPage() ? 'active' : '' }}">
                              <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                         </li>
                    @endforeach

                    @if ($categories->nextPageUrl())
                    <li class="page-item">
                        <a class="page-link" href="{{ $categories-> nextPageUrl() }}" rel="next">
                              <i class="fa-solid fa-angles-right"></i>
                        </a>
                    </li>
                    @else
                    <li class="page-item disabled">
                        <span class="page-link"><i class="fa-solid fa-angles-right"></i></span>
                    </li>
                    @endif
               </ul>
            </nav>
          </div>
      </div>  
@endsection