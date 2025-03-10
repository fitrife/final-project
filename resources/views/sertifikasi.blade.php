@extends('layouts.main')
@section('container')
    <!-- Banner start -->
    <div id="banner-page" class="banner-page" style="background-image: url(/img/pendaftaran-allprogram.webp)">
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
                    <div class="col-12">
                        <nav>
                            <div
                            class="nav nav-tabs border-0 d-flex justify-content-center mb-4"
                            id="nav-tab"
                            >
                                <div class="input-group">
                                    <a class="nav-link active" type="button" href="/sertifikasi">Lihat Semua</a>
                                </div>
                                @foreach($training_categories as $category)
                                <div class="input-group">
                                    <a class="nav-link active" type="button" href="/sertifikasi?kategori={{ $category->slug }}">{{ $category->name }}</a>
                                </div>
                                @endforeach
                            </div>
                        </nav>
                        
                        @if($trainings->count())
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
                    @endif
                    <div class="d-flex justify-content-center">
                        {{ $trainings->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>
            </div> 
        </div>
        <!-- Content row end -->
        </div>
    </section>
    <!-- Course End -->
@endsection