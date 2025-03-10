@extends('layouts.main')
@section('container')

    <!-- Banner start -->
    <div
    id="banner-page"
    class="banner-page"
    style="background-image: url(/img/banner-artikel.webp); background-position: 75% 80%;"
    >
    <div class="page-title">
        <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <div class="page-heading">
                <h1 class="page-title">Artikel</h1>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <!-- Banner end -->

    <!-- Blog Start -->
    <section id="blog" class="blog section-padding">
        <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
            <div class="post border-0 mb-0 pb-0">
                <div class="post-image">
                <img
                    loading="lazy"
                    src="{{ asset('storage/' .$post->image) }}"
                    class="img-fluid"
                    alt="post-image"
                />
                </div>

                <div class="post-body">
                <div class="post-header">
                    <div class="post-meta">
                    <span class="post-author">
                        <i class="far fa-user"></i> {{ $post->author->name }}
                    </span>
                    <span class="post-category">
                        <i class="far fa-folder-open"></i><a href="/blog?kategori={{ $post->slug }}"> {{ $post->kategori->name }}</a>
                    </span>
                    <span class="post-date"
                        ><i class="far fa-calendar"></i> {{ $post->created_at->diffForHumans() }}</span
                    >
                    </div>
                    <h2 class="post-title">{{ $post->title }}
                    </h2>
                </div>
                <!-- header end -->

                <!-- Post start -->
                <div class="post-content">
                    {!! $post->body !!}
                </div>
                </div>
                <!-- post-body end -->
            </div>
            </div>
            <!-- Post end -->

            <div class="col-lg-4">
                <div class="sidebar sidebar-right">
                  <div class="widget recent-posts">
                    <h3 class="widget-title">Artikel Terbaru</h3>
                    <ul class="list-unstyled">
                      @foreach($list_post as $post)
                      <li class="d-flex align-items-center">
                        <div class="posts-thumbnail">
                          <a href="{{ $post->slug }}"
                            ><img
                              loading="lazy"
                              alt="{{ $post->name }}"
                              src="{{ asset('storage/' .$post->image) }}"
                          /></a>
                        </div>
                        <div class="post-info">
                          <h4 class="post-title">
                            <a href="{{ $post->slug }}"
                              >{{ $post->title }}</a
                            >
                          </h4>
                        </div>
                      </li>
                      @endforeach
                    </ul>
                  </div>
                  <!-- Recent post end -->
      
                  <div class="widget">
                    <h3 class="widget-title">Kategori</h3>
                    <ul class="arrow nav nav-tabs">
                      @foreach($categories as $category)
                      <li><a href="/blog?kategori={{ $category->slug }}">{{ $category->name }}</a></li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            <!-- Sidebar Col end -->
        </div>
        <!-- Main row end -->
        </div>
    </section>
    <!-- Blog End -->


@endsection