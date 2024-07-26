@extends('admin.layoutadmin')
@section('title', 'Quản trị Xshop')
@section('content')
<h1 class="text-center my-3">QUẢN LÝ SẢN PHẨM</h1>
      <div class="container">
          <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
               ADD product
           </button>
           <form class="d-flex m-2 w-50" role="search" action="{{ route('productadmin.search') }}" method="GET">
                <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-danger" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>

           <!-- Modal ADD-->
           <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                   <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>
                   <div class="modal-body">
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="mb-3">
                                <label for="">Tên sản phẩm</label>
                                <input type="text" class="form-control" placeholder="Thêm tên sản phẩm" name="name">
                            </div>

                            <div class="mb-3">
                                <label for="">Giá</label>
                                <input type="number" class="form-control" placeholder="Thêm giá sản phẩm" name="price">
                            </div>


                            <div class="mb-3">
                                <label for="">Hình ảnh</label>
                                <input type="file" class="form-control" name="img">
                            </div>

                            <div class="mb-3">
                                <label for="description">Mô tả</label><br>
                                <textarea id="description" name="description" class="form-control"></textarea><br>
                            </div>

                            <div class="mb-3">
                                <label for="category_id">Danh mục:</label><br>
                                <select name="category_id" id="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select><br>
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
            @foreach ( $products as $product )
            <div class="modal fade" id="exampleModalup{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content align-middle">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="">Tên sản phẩm</label>
                                <input type="text" class="form-control" placeholder="Thêm tên sản phẩm" name="name"  value="{{ $product->name }}">
                            </div>

                            <div class="mb-3">
                                <label for="">Giá</label>
                                <input type="number" class="form-control" placeholder="Thêm giá sản phẩm" name="price" value="{{ $product->price }}">
                            </div>


                            <div class="mb-3">
                                <label for="">Hình ảnh</label>
                                <input type="file" class="form-control" name="img">
                                <img src="{{ asset( $product->img ) }}" alt="Product Image" style="width: 100px;"><br>
                            </div>

                            <div class="mb-3">
                                <label for="description">Mô tả</label><br>
                                <textarea id="description" name="description" class="form-control">{{ $product->description }}</textarea><br>
                            </div>

                            <div class="mb-3">
                                <label for="category_id">Danh mục:</label><br>
                                <select name="category_id" id="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{$product->category_id == $category->id ? 'selected' : '' }}">{{ $category->name }}</option>
                                    @endforeach
                                </select><br>
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
          <table class="table table-hover align-middle w-100">
               <thead>
                   <tr>
                       <th>STT</th>
                       <th scope="col" colspan="2">Sản phẩm</th>
                       <th scope="col">Đơn giá</th>
                       <th scope="col">Số lượng</th>
                       <th scope="col">Thao tác</th>
                   </tr>
               </thead>
               @foreach ($products as $index => $product)
                   <tr>
                      <td>{{ $index + 1}}</td>

                       <td><img src="{{ $product -> img }}" alt="{{ $product -> name }}" style="width:60px"></td>

                       <td>{{ $product -> name }}</td>


                       <td class="text-danger">{{ $product -> price }}</td>

                       <td>Số lượng: {{ $product -> sold }}</td>

                       <td style="max-width: 15px;">

                        <button type="submit" class="btn btn-link link-danger text-decoration-none p-0 m-0" data-bs-toggle="modal" data-bs-target="#exampleModalup{{$product->id}}">
                            <i class="fa-solid fa-pen-to-square" style="color: #e41b39;"></i>
                        </button> |
                            <!-- <a href="" class="link-danger text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModalup"><i class="fa-solid fa-pen-to-square" style="color: #e41b39;"></i></a> -->
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link link-danger text-decoration-none p-0 m-0"  onclick="return confirm('Bạn có muốn xóa sản phẩm này?')">
                                <i class="fa-solid fa-trash" style="color: #e41b39;"></i>
                            </button>
                        </form>
                       </td>
                   </tr>
                   @endforeach
           </table>
           <div class="d-flex justify-content-center pb-5">
               <nav aria-label="...">
               <ul class="pagination justify-content-center">
                    @if ($products->previousPageUrl())
                    <li class="page-item">
                        <a class="page-link" href="{{ $products->previousPageUrl() }}" rel="prev">
                        <i class="fa-solid fa-angles-right fa-rotate-180"></i>
                        </a>
                    </li>
                    @else
                    <li class="page-item disabled">
                        <span class="page-link"><i class="fa-solid fa-angles-right fa-rotate-180"></i></span>
                    </li>
                    @endif

                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                         <li class="page-item {{ $page == $products->currentPage() ? 'active' : '' }}">
                              <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                         </li>
                    @endforeach

                    @if ($products->nextPageUrl())
                    <li class="page-item">
                        <a class="page-link" href="{{ $products-> nextPageUrl() }}" rel="next">
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