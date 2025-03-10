@extends('layouts.main')
@section('container')
    <!-- Banner start -->
    <div id="banner-page" class="banner-page" style="background-image: url(/img/pendaftaran-allprogram.webp)">
        <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 inner">
                    <div class="page-heading">
                        <h1 class="page-title">Program dan Pembinaan</h1>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <!-- Banner end -->

    <!-- Course Start -->
    <section id="program-area" class="program-area bg-light section-padding">
        <div class="container">
          @if($trainings->count())
            <div class="row d-flex justify-content-center align-items-center">
              @foreach($trainings as $training)
              <div class="col-lg-4 mb-3">
                <a href="/program-pembinaan/{{ $licenses->slug }}">
                  <div class="card d-flex flex-column-reverse flex-md-row flex-lg-row justify-content-between">
                    <div class="card-body">{{ $licenses->name }}</div>
                    <div class="card-image">
                      @if ($licenses->image)
                      <img src="{{ asset('storage/' .$licenses->image) }}" alt="{{ $licenses->name }}">
                      @endif
                    </div>
                  </div>
                </a>
              </div>
              @endforeach
            @endif
          @if($category->count())
                    <div class="tab-content nav-program" id="nav-tabContent">
                        @foreach ($trainings as $training)
                        <div class="col-sm-11 col-md-6 col-lg-4 m-2">
                            <div class="program-img-container">
                                @if ($training->image)
                                <img src="{{ asset('storage/' .$training->thumbnail) }}" alt="{{ $training->category->name }}" class="img-fluid">
                                @else
                                <img src="https://source.unsplash.com/500x400?{{ $training->name }}" class="img-fluid" alt="{{ $training->name }}">
                                @endif
                                {{-- <img
                                    class="img-fluid"
                                    src="{{ asset('storage/' .$training->thumbnail) }}"
                                    alt="program-img"
                                /> --}}
                                <div class="program-item-info">
                                    <div class="program-item-info-content">
                                        <h3 class="program-item-title">
                                        <a href="/pelatihan?pelatihan={{ $training->trainingcategories->slug }}"
                                            >{{ $training->slug }}</a
                                        >
                                        </h3>
                                        <p class="program-cat">{{ $training->training_categories_id }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="col-12 text-center">
                        <p>Program Tidak Ditemukan</p>
                    </div>
                    @endif
          {{-- <div class="row">
            <div class="col-12 text-center">
              <div class="row shuffle-wrapper">
                <div class="col-1 shuffle-sizer"></div>
  
                <div class="col-lg-4 col-md-6 shuffle-item">
                  <div class="program-img-container">
                    <a
                      class="gallery-popup"
                      href="images/banner-1.jpg"
                      aria-label="program-img"
                    >
                      <img
                        class="img-fluid"
                        src="images/banner-1.jpg"
                        alt="program-img"
                      />
                    </a>
                    <div class="program-item-info">
                      <div class="program-item-info-content">
                        <h3 class="program-item-title">
                          <a href="kemnaker-program.html">Nama Program 1</a>
                        </h3>
                        <p class="program-cat">Sertifikasi Kemnaker RI</p>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- shuffle item 1 end -->
  
                <div class="col-lg-4 col-md-6 shuffle-item">
                  <div class="program-img-container">
                    <a
                      class="gallery-popup"
                      href="images/banner-1.jpg"
                      aria-label="program-img"
                    >
                      <img
                        class="img-fluid"
                        src="images/banner-1.jpg"
                        alt="program-img"
                      />
                    </a>
                    <div class="program-item-info">
                      <div class="program-item-info-content">
                        <h3 class="program-item-title">
                          <a href="kemnaker-program.html">Nama Program 2</a>
                        </h3>
                        <p class="program-cat">Sertifikasi Kemnaker RI</p>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- shuffle item 2 end -->
  
                <div class="col-lg-4 col-md-6 shuffle-item">
                  <div class="program-img-container">
                    <a
                      class="gallery-popup"
                      href="images/banner-1.jpg"
                      aria-label="program-img"
                    >
                      <img
                        class="img-fluid"
                        src="images/banner-1.jpg"
                        alt="program-img"
                      />
                    </a>
                    <div class="program-item-info">
                      <div class="program-item-info-content">
                        <h3 class="program-item-title">
                          <a href="kemnaker-program.html">Nama Program 3</a>
                        </h3>
                        <p class="program-cat">Sertifikasi Kemnaker RI</p>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- shuffle item 3 end -->
  
                <div class="col-lg-4 col-md-6 shuffle-item">
                  <div class="program-img-container">
                    <a
                      class="gallery-popup"
                      href="images/banner-1.jpg"
                      aria-label="program-img"
                    >
                      <img
                        class="img-fluid"
                        src="images/banner-1.jpg"
                        alt="program-img"
                      />
                    </a>
                    <div class="program-item-info">
                      <div class="program-item-info-content">
                        <h3 class="program-item-title">
                          <a href="kemnaker-program.html">Nama Program 4</a>
                        </h3>
                        <p class="program-cat">Sertifikasi Kemnaker RI</p>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- shuffle item 4 end -->
  
                <div class="col-lg-4 col-md-6 shuffle-item">
                  <div class="program-img-container">
                    <a
                      class="gallery-popup"
                      href="images/banner-1.jpg"
                      aria-label="program-img"
                    >
                      <img
                        class="img-fluid"
                        src="images/banner-1.jpg"
                        alt="program-img"
                      />
                    </a>
                    <div class="program-item-info">
                      <div class="program-item-info-content">
                        <h3 class="program-item-title">
                          <a href="kemnaker-program.html">Nama Program 5</a>
                        </h3>
                        <p class="program-cat">Sertifikasi Kemnaker RI</p>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- shuffle item 5 end -->
  
                <div class="col-lg-4 col-md-6 shuffle-item">
                  <div class="program-img-container">
                    <a
                      class="gallery-popup"
                      href="images/banner-1.jpg"
                      aria-label="program-img"
                    >
                      <img
                        class="img-fluid"
                        src="images/banner-1.jpg"
                        alt="program-img"
                      />
                    </a>
                    <div class="program-item-info">
                      <div class="program-item-info-content">
                        <h3 class="program-item-title">
                          <a href="kemnaker-program.html">Nama Program 6</a>
                        </h3>
                        <p class="program-cat">Sertifikasi Kemnaker RI</p>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- shuffle item 6 end -->
              </div>
              <!-- shuffle end -->
            </div>
          </div> --}}
          <!-- Content row end -->
        </div>
        <!--/ Container end -->
    </section>
    <!-- Course End -->
@endsection