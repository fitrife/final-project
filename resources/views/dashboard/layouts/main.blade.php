<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrator | Pusat Pelatihan K3</title>

    <!-- Icon -->
    <link rel="icon" href="{{ asset('img/logo.webp') }}" type="image/x-icon" />

    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- Bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <!-- Datatables -->
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('plugins/datatables/datatables.min.css') }}"
    />
    {{-- <link href="https://cdn.datatables.net/v/bs5/dt-1.13.3/datatables.min.css"/> --}}
    <!-- Summernote -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.css">
    {{-- CK Editor --}}

    <!-- Pusat Pelatihan K3 Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  </head>
  <body>

    @include('dashboard.layouts.sidebar')

    <!-- main wrapper start -->
    <div class="admin-wrapper bg-light">
      <div class="p-2">

        @include('dashboard.layouts.header')
        @include('dashboard.layouts.sidebar')
        @yield('container')
     
      </div>
    </div>
    <!-- main wrapper end -->

    <!-- JQuery -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
      integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <!-- Bootstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
    <!-- Summernote -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.js"></script>
    {{-- ck editor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

    <!-- Pelatihan K3 -->
    <script src="{{ asset('js/script.js') }}"></script>
    <script
      type="text/javascript"
      charset="utf8"
      src="{{ asset('plugins/datatables/datatables.min.js') }}"
    ></script>
    {{-- <script src="https://cdn.datatables.net/v/bs5/dt-1.13.3/datatables.min.js"></script> --}}
    <script>
      $(document).ready(function() {
          $('#body, #description, #duration, #certificate, #participant_requirement, #goal, #theory, #method, #facility').summernote({
            height: 150,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            popatmouse: true
          });
          $(".note-editor .dropdown-toggle").on("click", (e) => {
                  if ($(e.currentTarget).attr("aria-expanded")) {
                      $(e.currentTarget).dropdown("toggle")
                  }
          });
          $('span.note-icon-caret').remove();
      });
    </script>
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create( document.querySelector( '#body' ), {
              ckfinder: {
                  uploadUrl: "{{ route('posts.upload').'?_token='.csrf_token() }}"
              }
          })
          .then( editor => {
              console.log( editor );
          } )
          .catch( error => {
              console.error( error );
          } );
    </script> --}}
    @yield('myjsfile')
  </body>
</html>
