@extends('layout')
@section('title', 'Xshop | Giày thể thao')
@section('content')
<div id="carouselExampleAutoplaying" class="carousel slide container" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="img/banner1.jpg" class="d-block w-100" alt="...">
               <div class="carousel-caption d-none d-md-block text-center">
               <h1>Giày Nam</h1>
               <button type="button" class="btn btn-outline-danger">XEM THÊM</button>
               </div>
          </div>

            <div class="carousel-item">
              <img src="img/banner2.png" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block text-center">
               <h1>GIÀY NỮ</h1>
               <button type="button" class="btn btn-outline-danger">XEM THÊM</button>
             </div>
            </div>

            <div class="carousel-item">
              <img src="img/banner3.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block text-center">
               <h1>GIÀY ĐÔI</h1>
               <button type="button" class="btn btn-outline-danger">XEM THÊM</button>
             </div>
            </div>
          </div>

          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>

          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
</div>
<div class="container" ng-app="myApp" ng-controller="HomeController">
     <div class="row m-auto col-sm-12">
          <h1 class="pt-5 text-center">
               Sản Phẩm HOT
               <i class="fa-solid fa-fire" style="color: #ff3333;"></i>
          </h1>
          <div class="col-sm-3 poly-prod my-2" id="bestseller-products" ng-repeat="product in bestSellerProducts">          
               <div class="rounded w-100 py-2 product">
                    <div>
                         <a><img src="@{{ product.img}}" class="p-0 m-0" alt="" style="width: 300px;"></a>
                    </div>

                    <a class="text-black text-decoration-none">
                         <h7>
                              @{{ product.name }}
                         </h7>
                    </a>

                    <div class="mb-2 text-danger-emphasis">
                         @{{ product.formattedPrice }}
                    </div>  
               </div>        
          </div>
     </div>

     <div class="row m-auto col-sm-12">
          <h1 class="pt-5 text-center">
               Sản Phẩm Mới
          </h1>
          <div class="col-sm-3 poly-prod my-2" ng-repeat="product in newProducts">          
               <div class="rounded w-100 py-2 product">
                    <div>
                         <a><img src="@{{ product.img }}" class="p-0 m-0" alt="" style="width: 300px;"></a>
                    </div>
                    <a class="text-black text-decoration-none">
                         <h7>
                              @{{ product.name }}
                         </h7>
                    </a>
                    <div class="mb-2 text-danger-emphasis">
                         @{{ product.formattedPrice  }} 
                    </div>  
               </div>        
          </div>
     </div>


     <div class="row m-auto col-sm-12" style="padding-bottom: 150px;">
          <h1 class="pt-4 text-center w-100 position-relative">
               <hr class="line-left">
               <span class="mx-2">THỜI TRANG XSHOP</span>
               <hr class="line-right">
           </h1>
          <div class="col-sm-4 poly-prod my-2">          
               <div class="rounded w-100 py-2">
                    <div>
                         <img src="img/tintuc1.jpg" class="w-75 h-100" alt="">
                    </div>
                    <h6 class="mt-2 w-75 m-auto">
                         Top 9 mẫu giày thể thao nam MWC được ưa chuộng
                    </h6>         
               </div>
               
          </div>
          <div class="col-sm-4 poly-prod my-2">          
               <div class="rounded w-100 py-2">
                    <div>
                         <img src="img/tintuc2.jpg" class="w-75 h-100" alt="">
                    </div>
                    <h6 class="mt-2 w-75 m-auto">
                         Top 7 Mẫu Giày Boot Cổ Điển Bạn Nên Sở Hữu Trong Tủ Đồ
                    </h6>         
               </div>
               
          </div>
          <div class="col-sm-4 poly-prod my-2">          
               <div class="rounded w-100 py-2">
                    <div>
                         <img src="img/tintuc3.jpg" class="w-75 h-100" alt="">
                    </div>
                    <h6 class="mt-2 w-75 m-auto">
                         GIÀY THỂ THAO - ITEM TIỆN ÍCH CHO MÙA DU LỊCH
                    </h6>         
               </div>
               
          </div>
     </div>
</div>
<script>
     var app = angular.module('myApp', ['ngSanitize']);
     app.service('ProductService', function($http) {
        this.getNewProducts = function() {
            return $http.get('http://127.0.0.1:8000/api/products_lasted');
        };
        this.getBestSellers = function() {
            return $http.get('http://127.0.0.1:8000/api/products_bestseller');
        };
     });

     app.controller('HomeController', function($scope, ProductService) {
        console.log('HomeController initialized');

        ProductService.getNewProducts().then(function(response) {
            console.log('New products fetched:', response.data);
            $scope.newProducts = formatProducts(response.data);
        }, function(error) {
            console.error('Error fetching new products:', error);
        });

        ProductService.getBestSellers().then(function(response) {
            console.log('Best seller products fetched:', response.data);
            $scope.bestSellerProducts = formatProducts(response.data);
        }, function(error) {
            console.error('Error fetching best seller products:', error);
        });

        function formatProducts(products) {
            for (var i = 0; i < products.length; i++) {
                var product = products[i];
                product.formattedPrice = product.price.toLocaleString('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                });
            }
            return products;
        }
    });
</script>
@endsection