<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} | Pusat Pelatihan K3</title>

    {{-- Icon --}}
    <link rel="icon" href="{{ asset('img/logo.webp') }}">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    {{-- Slick --}}
    <link
      rel="stylesheet"
      type="text/css"
      href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
      integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    {{-- Animate --}}
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />

    {{-- Custom Style --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>

      <!-- Topbar start -->
      <div id="top-bar" class="top-bar">
        <div class="container">
          <div class="row">
            <div class="top-info col-lg-8 col-md-8 m-auto">
              <ul class="list-unstyled text-center text-md-start">
                <li>
                  <i class="fas fa-map-marker-alt"></i>
                  Jl. Ringroad Selatan, Gamping, Sleman, Daerah Istimewa
                  Yogyakarta, 55294
                </li>
              </ul>
            </div>
            <!--/ Top info end -->
  
            <div class="top-contact col-lg-4 col-md-4 text-center text-md-right">
              <ul class="list-unstyled">
                <li class="me-lg-3 me-2">
                  <i class="fa-solid fa-envelope"></i> cs@pusatpelatihank3.co.id
                </li>
                <li><i class="fa-solid fa-square-phone"></i> 0274 xxxxxxx</li>
              </ul>
            </div>
            <!--/ Top social end -->
          </div>
          <!--/ Content row end -->
        </div>
        <!--/ Container end -->
      </div>
      <!-- Topbar end -->

      @include('partials.navbar')

      @yield('container')

      @include('partials.footer')

      <!-- whatsapp start -->
      <div id="whatsapp-chat" class="hide">
        <div class="header-chat">
          <div class="head-home">
            <h3>Halo!</h3>
            <p>
              Apabila kamu punya pertanyaan, silahkan chat admin di bawah ini.
            </p>
          </div>
          <div class="get-new hide">
            <div id="get-label"></div>
            <div id="get-nama"></div>
          </div>
        </div>
        <div class="home-chat">
          <!-- Info Contact Start -->
          <a class="informasi" href="javascript:void" title="Chat Whatsapp">
            <div class="info-avatar">
              <img src="{{ asset('img/avatar.webp') }}" />
            </div>
            <div class="info-chat">
              <span class="chat-label">Admin</span>
              <span class="chat-nama">Esti</span>
            </div>
            <span class="my-number">+6282139227264</span>
          </a>
          <!-- Info Contact End -->
          <!-- <div class='blanter-msg'>Call us to <b>+62123456789</b> from <i>0:00hs a 24:00hs</i></div> -->
        </div>
        <div class="start-chat hide">
          <div class="first-msg">
            <span>Halo! Ada yang bisa kami bantu ?</span>
          </div>
          <div class="blanter-msg">
            <textarea
              id="chat-input"
              placeholder="Tulis pertanyaanmu disini"
              maxlength="120"
              row="1"
            ></textarea>
            <a href="javascript:void;" id="send-it">Kirim</a>
          </div>
        </div>
        <div id="get-number"></div>
        <a class="close-chat" href="javascript:void">×</a>
      </div>
      <a class="blantershow-chat" href="javascript:void" title="Show Chat">
        <i class="fab fa-whatsapp me-2"></i>Chat Dengan Admin
      </a>
      <!-- whatsapp end -->

    {{-- JQuery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    {{-- Owl Carousel --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    {{-- SweetAlert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Slick  --}}
    <script
      type="text/javascript"
      src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
    ></script>
    <script src="{{ asset('plugins/slick-animation/slick-animation.min.js') }}"></script>

    {{-- Color Box --}}
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.6.4/jquery.colorbox-min.js"
      integrity="sha512-DAVSi/Ovew9ZRpBgHs6hJ+EMdj1fVKE+csL7mdf9v7tMbzM1i4c/jAvHE8AhcKYazlFl7M8guWuO3lDNzIA48A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>

    {{-- Shuffle --}}
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Shuffle/6.1.0/shuffle.min.js"
      integrity="sha512-r8mIpk3ypCMwNxH6srRZGbjHQlOFt3Mq2vrZ/iymx6g9JUqTeVavofeX6gbrxAC74X5HmBy5gxyhCm6OiXrM0Q=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>

    {{-- Custom Script --}}
    <script src="{{ asset('js/script.js') }}"></script>
    

    @yield('myjsfile')
    
</body>
</html>
