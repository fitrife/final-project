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

        {{-- Custom Style --}}
        <link rel="stylesheet" href="{{ asset('css/style.css?v=)').time() }}">

    </head>
    <body>

    <!-- login section start -->
    <section class="login bg-light section-padding d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show w-md-50" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-danger w-md-50">
                    {{ session('error') }}
                </div>
                @endif

                @if(session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show w-md-50" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                

                <div class="bg-white col-md-7 col-lg-6 col-xl-5 py-5 px-4 px-sm-5">
                <div class="login-form box">
                    {{-- <h2 class="form-title text-center">Login Administrator</h2> --}}
                    <div class="brand-logo mb-2">
                        <img src="{{ asset('img/logo.webp') }}" alt="logo" style="width: 120px">
                    </div>
                    <h2 class="section-title mb-2">Login Administrator</h2>
                    <form action="/login" method="post">
                        <div class="row g-3">
                          @csrf
                          <div class="col-12">
                            <div class="form-floating">
                              <input
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="email"
                                name="email"
                                required 
                                value="{{ old('email') }}"
                                placeholder="Email"
                              />
                              @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                              @enderror
                              <label for="email">Email</label>
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="form-floating">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required value="{{ old('password') }}" placeholder="Password">
                              @error('password')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror
                              <label for="password">Password</label>
                            </div>
                          </div>
                          <div class="col-12">
                            <button class="btn btn-primary w-100 py-3 px-5" type="submit" id="login">
                              Login
                            </button>
                          </div>
                        </div>
                      </form>
                </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login section end -->

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
        
    </body>
</html>