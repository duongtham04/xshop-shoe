@extends('layout')
@section('title', 'Xshop | Giày thể thao')
@section('content')
<div class="container">
          <div class="row py-4">
               @if(isset($query))
                    <div class="col-12">
                         <h3 class="text-center text-danger">Kết quả tìm kiếm cho "{{ $query }}":</h3>
                    </div>
               @endif
               <div class="col-2">
                    <h2><i class="fa-solid fa-layer-group" style="color: #f2121a;"></i>Danh Mục</h2>
                    <ul class="list-group ">
                              <li class="list-group-item link-offset-1-hover">
                                   <a href="/product" class="text-decoration-none text-dark">Tất cả sản phẩm</a>
                              </li>
                         @foreach ($categories as $category)     
                              <li class="list-group-item link-offset-1-hover">
                                   <a href="{{ route('product_by_category', ['category_id' => $category->id]) }}" class="text-decoration-none text-dark">{{ $category->name }}</a>
                              </li>
                         @endforeach
                    </ul>            
               </div>
               
               <div class=" col-10 m-auto">
               <select name="sort" onchange="this.form.submit()" class="form-select w-25">
                            <option value="">Sắp xếp theo</option>
                            <option value="price_asc">Giá tăng dần</option>
                            <option value="price_desc" >Giá giảm dần</option>
                            <option value="name_asc" >Tên A-Z</option>
                            <option value="name_desc">Tên Z-A</option>
               </select>
               <div class="row">
                    @foreach ( $products as $product)
                    <div class="col-sm-3 poly-prod my-2">          
                         <div class="rounded py-2 product productsp">
                              <div> 
                                   <a href="/detailproduct/{{ $product -> id }}"><img src="{{ $product -> img }}" class="p-0 m-0" alt="" style="max-height: 180px;"></a>
                              </div>
                              <a href="/detailproduct" class="text-black text-decoration-none">
                                   <h7>
                                        {{ $product -> name }}
                                   </h7>
                              </a>
                              <div class="mb-2 text-danger-emphasis">
                                   {{ number_format($product -> price, 0, ',', '.') }}VNĐ 
                              </div>  
                         </div>        
                    </div>
                    @endforeach
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
</div>
</div>
</div>
@endsection