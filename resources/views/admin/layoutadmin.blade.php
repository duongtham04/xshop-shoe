<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>@yield('title')</title>
     <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
     <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
     @include('admin.partials.header')
     @yield('content')
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>  
<script src="https://kit.fontawesome.com/92da2d2d85.js" crossorigin="anonymous"></script>
</body>
</html>