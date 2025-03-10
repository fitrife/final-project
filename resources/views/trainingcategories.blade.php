@extends('layouts.main')
@section('container')
    <!-- Banner start -->
    <div id="banner-page" class="banner-page" 
        @if (url()->current() === 'http://pusat-pelatihan-k3.test/sertifikasi-kemnaker-ri')
        style="background-image: url(/img/pendaftaran-kemnaker.webp)"
        @elseif (url()->current() === 'http://pusat-pelatihan-k3.test/sertifikasi-bnsp') 
        style="background-image: url(/img/pendaftaran-bnsp.webp); background-position: 50% 90%;" 
        @else
        style="background-image: url(/img/pendaftaran-softskill.webp)"
        @endif
    >
        <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 inner">
                    <div class="page-heading">
                        <h1 class="page-title">{{ $title }}</h1>
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
            <div class="row nav-wrapper">
                    <div class="col-1 nav-sizer"></div>
                    @if($trainings->count())
                    <div class="tab-content nav-program d-flex row" id="nav-tabContent">
                        @foreach ($trainings as $training)
                        <div class="col-sm-11 col-md-6 col-lg-4 p-0">
                            <div class="program-img-container">
                                @if ($training->thumbnail)
                                <img src="{{ asset($training->thumbnail) }}" alt="{{ $training->kategori->name }}" class="img-fluid">
                                @else
                                <img src="https://source.unsplash.com/500x400?{{ $training->name }}" class="img-fluid" alt="{{ $training->name }}">
                                @endif
                                <div class="program-item-info">
                                    <div class="program-item-info-content text-center">
                                        <h3 class="program-item-title">
                                        <a href="/pelatihan/{{ $training->slug }}"
                                            >{{ $training->name }}</a
                                        >
                                        </h3>
                                        <p class="program-cat">{{ $training->kategori->name }}</p>
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
                </div>
            </div>
            </div> 
        </div>
        <!-- Content row end -->
        </div>
    </section>
    <!-- Course End -->
@endsection
