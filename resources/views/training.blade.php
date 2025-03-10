@extends('layouts.main')
@section('container')
<!-- banner section start -->
<section class="banner-course-section d-flex align-items-center position-relative text-center">
  <div class="banner-course-bg"></div>
  <div class="container">
    <div class="row align-items-center d-flex justify-content-center">
      <div class="col-sm-9 col-md-10">
        <div class="banner-course-text">
          <h1 class="mb-3 text-capitalize">
            training Pembinaan Intan Safety
          </h1>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- banner section end -->

<!-- courses section start -->
<section class="courses-item-section section-padding class-item">
  <div class="container">
    <div class="row d-flex justify-content-center mb-3 ms-lg-4 me-lg-4">
        <div class="col-12">
            
            @if($trainings->count())
            <div class="row d-flex justify-content-center align-items-center">
              @foreach($trainings as $training)
              <div class="col-lg-4 mb-3">
                <a href="/training-pembinaan/{{ $training->slug }}">
                  <div class="card d-flex flex-column-reverse flex-md-row flex-lg-row justify-content-between">
                    <div class="card-body">{{ $training->name }}</div>
                    <div class="card-image">
                      @if ($training->thumbnail)
                      <img loading="lazy" src="{{ asset('storage/' .$training->thumbnail) }}" class="img-fluid"
                      alt="{{ $training->thumbnail }}">
                      @endif
                    </div>
                  </div>
                </a>
              </div>
              @endforeach
            </div>                    
        </div>
        @else 
        <p class="text-center fs-4">
            training Pembinaan Tidak Ditemukan
        </p>
        @endif
    </div>
  </div>
</section>
<!-- courses section end -->
@endsection
