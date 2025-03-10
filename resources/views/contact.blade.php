@extends('layouts.main')
@section('container')
    <!-- Banner start -->
    <div
      id="banner-page"
      class="banner-page"
      style="background-image: url(img/banner-kontak-us.webp); background-position: 50% 25%;"
    >
      <div class="page-title">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 inner">
              <div class="page-heading">
                <h1 class="page-title">Kontak</h1>
              </div>
            </div>
            <!-- Col end -->
          </div>
          <!-- Row end -->
        </div>
        <!-- Container end -->
      </div>
      <!-- Banner text end -->
    </div>
    <!-- Banner end -->


    <!-- Contact Start -->
    <section class="contact section-padding">
        <div class="container">
          <div class="row g-5">
            <div
              class="col-lg-6 wow fadeInUp"
              data-wow-delay="0.1s"
              style="
                visibility: visible;
                animation-delay: 0.1s;
                animation-name: fadeInUp;
              "
            >
              <h2 class="section-title">Kontak</h2>
              <h3 class="section-sub-title mb-3">Hubungi Kami</h3>
              <p class="mb-4">
                Kami siap membantu Anda! Jika Anda memiliki pertanyaan mengenai layanan pelatihan, sertifikasi, atau konsultasi, jangan ragu untuk menghubungi kami. Tim kami yang profesional akan memberikan informasi yang Anda butuhkan dengan cepat dan akurat.
                <br>Baik Anda ingin mendaftar pelatihan, mendapatkan informasi lebih lanjut tentang sertifikasi, atau berdiskusi mengenai kebutuhan khusus perusahaan Anda, kami selalu siap melayani. Hubungi kami melalui email atau telepon, dan kami akan merespons sesegera mungkin.
              </p>
              <div class="row pt-2">
                <div class="col-sm-6">
                  <div class="d-flex align-items-center">
                    <div
                      class="flex-shrink-0 btn-lg-square rounded-circle bg-primary"
                    >
                      <i class="fa fa-envelope-open text-white"></i>
                    </div>
                    <div class="ms-3">
                      <p class="mb-2">Email us</p>
                      <h5 class="mb-0">cs@pusatpelatihank3.co.id</h5>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="d-flex align-items-center">
                    <div
                      class="flex-shrink-0 btn-lg-square rounded-circle bg-primary"
                    >
                      <i class="fa fa-phone-alt text-white"></i>
                    </div>
                    <div class="ms-3">
                      <p class="mb-2">Telepon</p>
                      <h5 class="mb-0">0274 xxxxxxx</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="col-lg-6 wow fadeInUp"
              data-wow-delay="0.5s"
              style="
                visibility: visible;
                animation-delay: 0.5s;
                animation-name: fadeInUp;
              "
            >
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
              <form method="post" action="/kontak-kami" enctype="multipart/form-data">
                <div class="row g-3">
                  @csrf  
                  <div class="col-12">
                    <div class="form-floating">
                      <input
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        id="name"
                        name="name"
                        required 
                        value="{{ old('name') }}"
                        placeholder="Nama"
                      />
                      @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                      <label for="name">Nama</label>
                    </div>
                  </div>
                  <div class="col-md-6" hidden>
                    <div class="form-floating">
                      <input
                        type="text"
                        class="form-control @error('slug') is-invalid @enderror"
                        id="slug"
                        name="slug"
                        required 
                        value="{{ old('slug') }}"
                        placeholder="Slug"
                      />
                      @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                      <label for="slug">Slug</label>
                    </div>
                  </div>
                  <div class="col-md-6">
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
                  <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" required value="{{ old('phone') }}" placeholder="No. Telepon (Whatsapp)">
                      @error('phone')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                      <label for="phone">No. Telepon (Whatsapp)</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-floating">
                      <textarea type="text" class="form-control @error('message') is-invalid @enderror" id="message" name="message" required value="{{ old('message') }}" placeholder="Pesan" style="height: 150px">@error('message')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror</textarea> 
                      <label for="message">Pesan</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary py-3 px-5" type="submit" id="sendmessage">
                      Kirim Pesan
                    </button>
                  </div>
                </div>
              </form>
            </div> 
          </div>
        </div>
      </section>
      <!-- Contact End -->

@endsection

@section('myjsfile')
    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');
    
        name.addEventListener('change', function() {
            fetch('/kontak-kami/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
  </script>
@endsection