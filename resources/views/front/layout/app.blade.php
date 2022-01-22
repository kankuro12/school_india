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
  <div class="footer">
    <div class="footer-inner">
      <div class="row">
        <div class="col-md-3">
            <div class="footer-element">
              <div class="title">
                About PUSET
              </div>
              <div class="inner">
                <div>
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis unde sapiente repellendus fugiat corporis molestiae doloremque id assumenda praesentium numquam excepturi quam laboriosam voluptates officia, laudantium quas ad possimus quo!
                </div>
                <ul class="mt-3">
                  <li>
                    <a href="">
                      <i class="fas fa-clock mr-2"></i> Email Address
                    </a>
                  </li>
                  <li>
                    <a href="">
                      <i class="fas fa-clock mr-2"></i> Email Address
                    </a>
                  </li>
                  <li>
                    <a href="">
                      <i class="fas fa-clock mr-2"></i> Email Address
                    </a>
                  </li>
                </ul>
              </div>
             
              
            </div>
        </div>
        <div class="col-md-2">
          <div class="footer-element ps-3">
            <div class="title">
              Quick Links
            </div>
            <div class="inner">
              <ul class="footer-list">
                <li><a href="">Someting</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="footer-element ps-3">
            <div class="title">
             Important Links
            </div>
            <div class="inner">
              <ul class="footer-list">
                <li><a href="">Chure Development Board</a></li>
                <li><a href="">Ministry of Forest and Environment</a></li>
                
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4 p-0">
          <div class="footer-element">
            <div class="gmap_canvas">
              <iframe  id="gmap_canvas"
              src="https://maps.google.com/maps?q=biratnagar&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
              scrolling="no" marginheight="0" marginwidth="0"></iframe>
        
            </div>
          </div>
        </div>

      </div>
      <hr>
      <div class="row">
        <div class="col-md-6">
          <div class="social-links">
            <a href="" class="social-link">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="" class="social-link">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="" class="social-link">
              <i class="fab fa-facebook-f"></i>
            </a>
          </div>
        </div>
        <div class="col-md-6 d-flex justify-content-center justify-content-md-end align-items-center">
          @copyright all
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/43f4dfae9c.js" crossorigin="anonymous"></script>
  @yield('script')
  
</body>

</html>