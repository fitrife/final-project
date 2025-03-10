@extends('layouts.main')
@section('container')

<!-- Banner start -->
<div
id="banner-page"
class="banner-page"
style="background-image: url(img/banner-artikel.webp); background-position: 75% 80%;"
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
          @if($posts->count())
          @foreach($posts as $post)
          <div class="post">
            <div class="post-image">
              <img
                loading="lazy"
                src="{{ asset($post->image) }}"
                class="img-fluid"
                alt="{{ $post->name }}"
              />
            </div>

            <div class="post-body">
              <div class="post-header">
                <div class="post-meta">
                  <span class="post-author">
                    <i class="far fa-user me-2"></i>{{ $post->author->name }}
                  </span>
                  <span class="post-category">
                    <i class="far fa-folder-open"></i><a href="/blog?kategori={{ $post->kategori->slug }}"> {{ $post->kategori->name }}</a>
                  </span>
                  <span class="post-date"
                    ><i class="far fa-calendar"></i> {{ $post->created_at->diffForHumans() }}</span
                  >
                </div>
                <h2 class="post-title">
                  <a href="/blog/{{ $post->slug }}"
                    >{{ $post->title }}</a
                  >
                </h2>
              </div>

              <div class="post-content">
                <p>
                  {!! $post->excerpt !!}
                </p>
              </div>

              <div class="post-footer">
                <a href="/blog/{{ $post->slug }}" class="btn btn-primary"
                  >Baca Selengkapnya</a
                >
              </div>
            </div>
          </div>
          @endforeach
          @else 
            <div class="text-center fs-4">
                <span>Artikel Tidak Ditemukan</span>
            </div>
          @endif
          <div class="d-flex justify-content-center">
            {{ $posts->onEachSide(1)->links() }}
          </div>
        </div>
        <!-- Content Col end -->

        <div class="col-lg-4">
          <div class="sidebar sidebar-right">
            <div class="widget search-widget">
              <form action="#">
                <div class="form-group">
                  <div class="input-group mb-3">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Cari Judul"
                      onfocus="this.placeholder = ''"
                      onblur="this.placeholder = 'Cari Artikel'"
                      name="search"
                      value="{{ request('search') }}"
                    />
                    <button class="btn btn-primary" type="submit">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
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
                        src="{{ asset($post->image) }}"
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
      </div>
    </div>
</section>
<!-- Blog End -->


@endsection
