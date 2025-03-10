@extends('layouts.main')
@section('container')
    <!-- Banner start -->
    <div id="banner-page" class="banner-page" 
        style="background-image: url(/img/pendaftaran-allprogram.webp)"
    >
        <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 inner">
                    <div class="page-heading">
                        <h1 class="page-title">Pelatihan dan Pembinaan</h1>
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
                    <nav>
                        <div class="nav nav-tabs nav-tabs-group text-center" id="nav-tab" role="tablist">
                            <a href="/pelatihan" class="nav-link active" type="button">Semua</a>
                            @foreach($training_categories as $category)
                            <a href="/pelatihan?kategori={{ $category->slug }}" class="nav-link active" type="button">{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </nav>
                    @if($trainings->count())
                    <div class="tab-content nav-program d-flex row" id="nav-tabContent">
                        @foreach ($trainings as $training)
                        <div class="col-sm-11 col-md-6 col-lg-4 ">
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

                    {{-- @if($trainings->count())
                        <div class="row d-flex justify-content-center align-items-center">
                            @foreach ($trainings as $post)
                            <div class="col-sm-11 col-md-6 col-lg-3 m-2">
                                
                                <div class="blog-item">
                                    <a href="/sertifikasi/{{ $post->slug }}" class="link">
                                        <div class="blog-item-inner">
                                            <div class="img-box">
                                                @if ($post->image)
                                                <img src="{{ asset('storage/' .$post->image) }}" alt="{{ $post->kategori->name }}" class="card-img-top">
                                                @else
                                                <img src="https://source.unsplash.com/500x400?{{ $post->kategori->name }}" class="card-img-top" alt="{{ $post->kategori->name }}">
                                                @endif
                                            </div>
                                            
                                        </div>
                                        <h3 class="title">{{ $post->title }}</h3>
                                        <div class="category">
                                            <a href="/sertifikasi?kategori={{ $post->kategori->slug }}" class="text-white text-decoration-none"> {{ $post->kategori->name }}</a>
                                        </div>
                                    </a>    
                                </div>
                            </div>
                            @endforeach
                        </div>                    
                    </div>
                    @else 
                    <p class="text-center fs-4">
                        Artikel Tidak Ditemukan
                    </p>
                    @endif --}}
                </div>
            </div>
            </div> 
        </div>
        <!-- Content row end -->
        </div>
    </section>
    <!-- Course End -->
@endsection
