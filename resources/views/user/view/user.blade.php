<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sewa Lapangan Badminton</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">


</head>

<body>

  @include('navbar')
  
  <div class="intro intro-carousel swiper position-relative">
  
      <div class="swiper-wrapper">
  
          <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url({{ asset('assets/img/futsal.jpg') }})">
              <div class="overlay overlay-a"></div>
              <div class="intro-content display-table">
                  <div class="table-cell">
                      <div class="container">
                          <div class="row">
                              <div class="col-lg-8">
                                  <div class="intro-body">
                                      @auth
                                      <h1 class="intro-title mb-4">
                                          <span class="color-b">Selamat Datang {{ Auth::user()->name }} di Layanan Booking Lapangan !</span>
                                      </h1>
                                      @endauth
                                      @guest
                                      <h1 class="intro-title mb-4">
                                          <span class="color-b">Selamat Datang di Layanan Booking Lapangan!</span>
                                      </h1>
                                      @endguest
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="swiper-pagination"></div>
  
      <main id="main">

        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

        <script src="{{ asset('assets/js/main.js') }}"></script>
        @include('layanan')

</body>

</html>
