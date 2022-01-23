<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('front/css/main.css')}}">
  <title>Hello, world!</title>
  <style>

  </style>
  @yield('style')
</head>

<body>
  <header>
    @include('front.layout.top')
    @include('front.layout.bottom')
    <div class="header-mobile">
      <img src="/uploads/setting/logo.jpg" alt="">
      <button data-mode="toogle-sidebar">
        <i class="fas fa-bars"></i>
      </button>
    </div>
  </header>
  @yield('content')
  @include('front.layout.footer')
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/43f4dfae9c.js" crossorigin="anonymous"></script>
  @yield('script')
  
</body>

</html>