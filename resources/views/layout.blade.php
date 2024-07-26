<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>@yield('title')</title>
     <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
     <link rel="stylesheet" href="{{ asset('css/style.css') }}">
     <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular-sanitize.js"></script>

</head>
<body>
     @include('partials.header')

     @yield('content')

     @include('partials.footer')
     
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>  
<script src="https://kit.fontawesome.com/92da2d2d85.js" crossorigin="anonymous"></script>
</body>
</html>