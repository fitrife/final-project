@extends('layouts.main')
@section('container')

  <!-- Banner start -->
  <div class="banner-carousel mb-0">
    <div
      class="banner-carousel-item"
      style="background-image: url(img/slider-universal.webp)"
    >
      <div class="slider-content">
        <div class="container h-100">
          <div class="row align-items-center h-100">
            <div class="col-md-12 text-center inner">
              <h2 class="slide-title" data-animation-in="slideInLeft">
                9 Tahun Pengalaman Sebagai Penyedia 
              </h2>
              <h3 class="slide-sub-title" data-animation-in="slideInRight">
                Pelatihan dan Sertifikasi k3
              </h3>
              <p data-animation-in="slideInLeft" data-duration-in="1.2">
                <a href="/pelatihan" class="slider btn btn-primary"
                  >Layanan Kami</a
                >
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div
      class="banner-carousel-item"
      style="background-image: url(img/slider-kemnaker.webp)"
    >
      <div class="slider-content text-right">
        <div class="container h-100">
          <div class="row align-items-center h-100">
            <div class="col-md-12 inner">
              <h2 class="slide-title" data-animation-in="slideInDown">
                Sertifikasi Kemnaker RI
              </h2>
              <h3 class="slide-sub-title" data-animation-in="fadeIn">
                Tingkatkan Kompetensi, Raih Karier Cemerlang!
              </h3>
              <p
                class="slider-description lead"
                data-animation-in="slideInRight"
              >
              Dapatkan pengakuan kompetensi secara nasional dengan sertifikasi BNSP. Pastikan Anda memiliki keunggulan kompetitif di industri!
              </p>
              <div data-animation-in="slideInLeft">
                <a
                  href="/sertifikasi-kemnaker-ri"
                  class="slider btn btn-primary"
                  aria-label="sertifikasi-kemnaker-ri"
                  >Sertifikasi KEMNAKER RI</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div
      class="banner-carousel-item"
      style="background-image: url(img/slider-bnsp.webp)"
    >
      <div class="slider-content text-right">
        <div class="container h-100">
          <div class="row align-items-center h-100">
            <div class="col-md-12 inner">
              <h2 class="slide-title" data-animation-in="slideInDown">
                Sertifikasi BNSP
              </h2>
              <h3 class="slide-sub-title" data-animation-in="fadeIn">
                Buktikan Keahlianmu dengan Sertifikasi BNSP!
              </h3>
              <p
                class="slider-description lead"
                data-animation-in="slideInRight"
              >
              Dapatkan pengakuan kompetensi secara nasional dengan sertifikasi BNSP. Pastikan Anda memiliki keunggulan kompetitif di industri!
              </p>
              <div data-animation-in="slideInLeft">
                <a
                  href="/sertifikasi-bnsp"
                  class="slider btn btn-primary"
                  aria-label="sertifikasi-bnsp"
                  >Sertifikasi BNSP</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div
      class="banner-carousel-item"
      style="background-image: url(img/slider-softskill.webp)"
    >
      <div class="slider-content text-right">
        <div class="container h-100">
          <div class="row align-items-center h-100">
            <div class="col-md-12 inner">
              <h2 class="slide-title" data-animation-in="slideInDown">
                Training Softskill
              </h2> 
              <h3 class="slide-sub-title" data-animation-in="fadeIn">
                Kuasai Softskill, Wujudkan Sukses Karier!
              </h3>
              <p
                class="slider-description lead"
                data-animation-in="slideInRight"
              >
              
              Keterampilan teknis saja tidak cukup! Tingkatkan komunikasi, kepemimpinan, dan kerja tim dengan training softskill terbaik untuk masa depan yang lebih cerah.
              </p>
              <div data-animation-in="slideInLeft">
                <a
                  href="/softskill"
                  class="slider btn btn-primary"
                  aria-label="softakill"
                  >Training Softskill</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Banner end -->

  <!-- About start -->
  <div id="about" class="about py-5 mt-5">
    <div class="container">
      <div class="row g-5">
        <div class="col-lg-6">
          <div class="row gx-3 h-100">
            <div
              class="col-6 align-self-start wow fadeInUp"
              data-wow-delay="0.1s"
              style="
                visibility: visible;
                animation-delay: 0.1s;
                animation-name: fadeInUp;
              "
            >
              <img class="img-fluid" src="{{ asset('img/about-us-1-image.webp') }}" />
            </div>
            <div
              class="col-6 align-self-end wow fadeInDown"
              data-wow-delay="0.1s"
              style="
                visibility: visible;
                animation-delay: 0.1s;
                animation-name: fadeInDown;
              "
            >
              <img class="img-fluid" src="{{ asset('img/about-us-2-image.webp') }}" />
            </div>
          </div>
        </div>
        <div
          class="col-lg-6 wow fadeIn"
          data-wow-delay="0.5s"
          style="
            visibility: visible;
            animation-delay: 0.5s;
            animation-name: fadeIn;
          "
        >
          <h2 class="section-title">About Us</h2>
          <h3 class="section-sub-title mb-3">Tentang Kami</h3>
          <p class="mb-4">
            Pusat Pelatihan K3 (PPK3) adalah penyedia pelatihan dan sertifikasi K3 yang berlisensi resmi dari Kementrian Tenaga Kerja RI (KEMNAKER RI) dan Badan Nasional Sertifikasi Profesi (BNSP). Dengan lebih dari 50 program pilihan untuk meningkatkan keahlian, karir dan pengakuan secara profesional.
          </p>
          <div class="d-flex align-items-center mb-4">
            <div class="flex-shrink-0 bg-primary p-4">
              <h1 class="display-4 fw-bold text-white">9</h1>
              <h5 class="text-white">Tahun</h5>
              <h5 class="text-white">Pengalaman</h5>
            </div>
            <div class="ms-4">
              <p>
                <i class="fa fa-check text-primary me-2"></i>Sertifikasi
                KEMNAKER RI
              </p>
              <p>
                <i class="fa fa-check text-primary me-2"></i>Sertifikasi BNSP
              </p>
              <p><i class="fa fa-check text-primary me-2"></i>Softskill</p>
            </div>
          </div>
          <div class="row pt-2">
            <div class="col-sm-6">
              <div class="d-flex align-items-center">
                <div
                  class="flex-shrink-0 btn-lg-square rounded-circle bg-primary"
                >
                  <i class="fa fa-envelope-open text-white"></i>
                </div>
                <div class="ms-3">
                  <p class="mb-0 mb-md-2">Email us</p>
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
                  <p class="mb-0 mb-md-2">Telepon</p>
                  <h5 class="mb-0">0274 xxxxxxx</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- About end -->

  <!-- Reason start -->
  <section id="why-us-area" class="why-us-area section-padding">
    <div class="container">
      <div class="row text-center">
        <div class="col-12">
          <h2 class="section-title">Why Us</h2>
          <h3 class="section-sub-title">Alasan Memilih Kami</h3>
        </div>
      </div>
      <!--/ Title row end -->

      <div class="row">
        <div class="col-lg-4 mt-lg-4">
          <div class="why-us-box d-flex">
            <div class="why-us-box-icon">
              <div class="flex-shrink-0 btn-square rounded bg-primary">
                <i class="fa-solid fa-file-circle-check text-white"></i>
              </div>
            </div>
            <div class="why-us-box-info">
              <h3 class="service-box-title">Resmi dan Kredibel</h3>
              <p>
                Pelatihan diselenggarakan dibawah pengawasan pihak KEMNAKER RI & BNSP
              </p>
            </div>
          </div>

          <div class="why-us-box d-flex">
            <div class="why-us-box-icon">
              <div class="flex-shrink-0 btn-square rounded bg-primary">
                <i class="fa-solid fa-landmark text-white"></i>
              </div>
            </div>
            <div class="why-us-box-info">
              <h3 class="service-box-title">Mitra Terpercaya 50+ Perusahaan</h3>
              <p>
                Berpengalaman dalam penyediaan pelatihan dan sertifikasi
              </p>
            </div>
          </div>
          <!-- Service 2 end -->

          <div class="why-us-box d-flex">
            <div class="why-us-box-icon">
              <div class="flex-shrink-0 btn-square rounded bg-primary">
                <i class="fa-solid fa-people-group text-white"></i>
              </div>
            </div>
            <div class="why-us-box-info">
              <h3 class="service-box-title">Telah Mencetak 1000+ Alumni
              </h3>
              <p>Berkomitmen dalam mutu pengajaran untuk menghasilkan koneksi alumni yang berkualitas</p>
            </div>
          </div>
          <!-- Service 3 end -->
        </div>
        <!-- Col end -->

        <div class="col-lg-4 text-center">
          <img
            loading="lazy"
            class="img-fluid"
            src="{{ asset('img/why-us-image.webp') }}"
            alt="service-avater-image"
          />
        </div>
        <div class="col-lg-4 mt-5 mt-lg-4 mb-4 mb-lg-0">
          <div class="why-us-box d-flex">
            <div class="why-us-box-icon">
              <div class="flex-shrink-0 btn-square rounded bg-primary">
                <i class="fa-solid fa-clock-rotate-left text-white"></i>
              </div>
            </div>
            <div class="why-us-box-info">
              <h3 class="service-box-title">Berdiri Sejak 2015
              </h3>
              <p>
                Berpengalaman dalam pengadaan pelatihan inhouse di berbagai jenis industri 
              </p>
            </div>
          </div>
          <div class="why-us-box d-flex">
            <div class="why-us-box-icon">
              <div class="flex-shrink-0 btn-square rounded bg-primary">
                <i class="fa-solid fa-handshake text-white"></i>
              </div>
            </div>
            <div class="why-us-box-info">
              <h3 class="service-box-title">Garansi Pelatihan</h3>
              <p>
                Fitur jaminan bagi peserta untuk memperoleh pelayanan dan pengalaman pelatihan yang terbaik
              </p>
            </div>
          </div>
          <div class="why-us-box d-flex">
            <div class="why-us-box-icon">
              <div class="flex-shrink-0 btn-square rounded bg-primary">
                <i class="fa-solid fa-user-tie text-white"></i>
              </div>
            </div>
            <div class="why-us-box-info">
              <h3 class="service-box-title">Instruktur Ahli dan Berlisensi</h3>
              <p>
                Dibimbing langsung oleh instruktur praktisi berpengalaman dengan pengakuan industri
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Reason end -->

  <!-- Course Start -->
  <section id="program-area" class="program-area bg-light section-padding">
    <div class="container">
      <div class="row text-center">
        <div class="col-lg-12">
          <h2 class="section-title">Program</h2>
          <h3 class="section-sub-title">Pelatihan & Pembinaan</h3>
        </div>
      </div>
      <!--/ Title row end -->

      <div class="row">
        <div class="col-12 text-center">

        <div class="row nav-wrapper">
            <div class="col-1 nav-sizer"></div>
            <ul class="nav nav-tabs nav-tabs-group text-center d-flex justify-content-center">
              <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#kemnaker">Sertifikasi Kemnaker RI</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#bnsp">Sertifikasi BNSP</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#softskill">Softskill</a>
              </li>
            </ul>
 
            <div class="tab-content">
              <div class="tab-content tab-pane container active nav-program row d-flex" id="kemnaker">
                @foreach ($kemnaker as $kemnaker)
                <div class="col-sm-11 col-md-6 col-lg-4 p-0">
                    <div class="program-img-container">
                        @if ($kemnaker->thumbnail)
                        <img src="{{ asset($kemnaker->thumbnail) }}" alt="{{ $kemnaker->kategori->name }}" class="img-fluid">
                        @else
                        <img src="https://source.unsplash.com/500x400?{{ $kemnaker->name }}" class="img-fluid" alt="{{ $kemnaker->name }}">
                        @endif
                        <div class="program-item-info">
                            <div class="program-item-info-content text-center">
                                <h3 class="program-item-title">
                                <a href="/pelatihan/{{ $kemnaker->slug }}"
                                    >{{ $kemnaker->name }}</a
                                >
                                </h3>
                                <p class="program-cat">{{ $kemnaker->kategori->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
              </div>
              <div class="tab-pane container fade tab-content nav-program row d-flex" id="bnsp">
                @foreach ($bnsp as $bnsp)
                <div class="col-sm-11 col-md-6 col-lg-4 p-0">
                    <div class="program-img-container">
                        @if ($bnsp->thumbnail)
                        <img src="{{ asset($bnsp->thumbnail) }}" alt="{{ $bnsp->kategori->name }}" class="img-fluid">
                        @else
                        <img src="https://source.unsplash.com/500x400?{{ $bnsp->name }}" class="img-fluid" alt="{{ $bnsp->name }}">
                        @endif
                        <div class="program-item-info">
                            <div class="program-item-info-content text-center">
                                <h3 class="program-item-title">
                                <a href="/pelatihan/{{ $bnsp->slug }}"
                                    >{{ $bnsp->name }}</a
                                >
                                </h3>
                                <p class="program-cat">{{ $bnsp->kategori->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
              </div>
              <div class="tab-pane container fade tab-content nav-program row d-flex" id="softskill">
                @foreach ($softskill as $softskill)
                <div class="col-sm-11 col-md-6 col-lg-4 p-0">
                    <div class="program-img-container">
                        @if ($softskill->thumbnail)
                        <img src="{{ asset($softskill->thumbnail) }}" alt="{{ $softskill->kategori->name }}" class="img-fluid">
                        @else
                        <img src="https://source.unsplash.com/500x400?{{ $softskill->name }}" class="img-fluid" alt="{{ $softskill->name }}">
                        @endif
                        <div class="program-item-info">
                            <div class="program-item-info-content text-center">
                                <h3 class="program-item-title">
                                <a href="/pelatihan/{{ $softskill->slug }}"
                                    >{{ $softskill->name }}</a
                                >
                                </h3>
                                <p class="program-cat">{{ $softskill->kategori->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
              </div>
            </div>              
            </div>
          <!-- shuffle end -->
        </div>

        <div class="col-12">
          <div class="general-btn text-center mt-5">
            <a class="btn btn-primary" href="/pelatihan"
              >Lihat Pelatihan Lainnya</a
            >
          </div>
        </div>
      </div>
      <!-- Content row end -->
    </div>
    <!--/ Container end -->
    </div>
  </section>
  <!-- Course End -->

  <!-- Schedule start -->
  <section id="schedule" class="schedule section-padding">
    <div class="container">
      <div class="row text-center">
        <div class="col-12">
          <h2 class="section-title">Schedule</h2>
          <h3 class="section-sub-title">Jadwal Pelatihan & Pembinaan</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Pelatihan</th>
                <th scope="col">Sertifikasi</th>
                <th scope="col">Jadwal</th>
                <th scope="col">Metode</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($schedules as $schedule) 
                <tr>
                  <td>
                    @if ($schedule->training_id == 0)
                      {{ $schedule->name }}
                    @else
                      {{ $schedule->training->name }}
                    @endif
                  </td>
                  <td>{{ $schedule->training_category->name }}</td>
                  <td>{{ $schedule->schedule }}</td>
                  <td>{{ $schedule->method }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="col-12">
          <div class="general-btn text-center mt-5">
            <a class="btn btn-primary" href="/jadwal"
              >Lihat Jadwal Lainnya</a
            >
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Schedule End -->

  <section class="subscribe section-padding bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="ts-newsletter row align-items-center">
            <div class="col-md-12 newsletter-introtext text-center">
              <h3 class="text-white mb-0">
                Jadilah <strong>talenta terbaik</strong> di bidangmu dan tingkatkan
                  <strong>kredibilitas karirmu</strong> dengan mengikuti pelatihan dan
                  sertifikasi di PPK3!
              </h3>
              {{-- <h3 class="section-sub-title text-primary mb-0">
                Promo terbatas
              </h3>
              <p class="text-white">
                Jadilah <strong>talenta terbaik</strong> di bidangmu dan tingkatkan
                  <strong>kredibilitas karirmu</strong> dengan mengikuti pelatihan dan
                  sertifikasi di PPK3!
              </p> --}}
            </div>

            {{-- <div class="col-md-5 text-center">
              <div class="btn btn-primary py-3 px-5 w-100">Daftar Sekarang</div>
            </div> --}}
          </div>
          <!-- Newsletter end -->
        </div>
        <!-- Col end -->
      </div>
      <!-- Content row end -->
    </div>
    <!--/ Container end -->
  </section>
  <!--/ subscribe end -->

  <!-- Testimonial Start -->
  <section class="testimonial section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h3 class="column-title">Testimoni</h3>

          <div id="testimonial-slide" class="testimonial-slide">
            <div class="item">
              <div class="quote-item">
                <span class="quote-text">
                  Kesan dan pesan selama mengikuti pelatihan
                  sangat menarik. Dari persiapannya, fasilitas yang memadai
                  dan pemateri yang sangat menarik sehingga sangat recommended
                  bagi teman-teman yang membutuhkan pelatihan terkait dengan
                  lingkungan.
                </span>

                <div class="quote-item-footer">
                  <img
                    loading="lazy"
                    class="testimonial-thumb"
                    src="{{ asset('img/testimonial/student.webp') }}"
                    alt="testimonial"
                  />
                  <div class="quote-item-info">
                    <h3 class="quote-author">Hendrik</h3>
                    <span class="quote-subtext">Alumni Pelatihan PPPLB3</span>
                  </div>
                </div>
              </div>
              <!-- Quote item end -->
            </div>
            <!--/ Item 1 end -->

            <div class="item">
              <div class="quote-item">
                <span class="quote-text">
                  Trainingnya mantap, pelatih dan materinya juga keren-keren
                  semua. Recommended banget ikut training disini.
                </span>

                <div class="quote-item-footer">
                  <img
                    loading="lazy"
                    class="testimonial-thumb"
                    src="{{ asset('img/testimonial/student.webp') }}"
                    alt="testimonial"
                  />
                  <div class="quote-item-info">
                    <h3 class="quote-author">Marwan, S.Tr.KL</h3>
                    <span class="quote-subtext">Alumni Pelatihan PPPLB3</span>
                  </div>
                </div>
              </div>
              <!-- Quote item end -->
            </div>
            <!--/ Item 2 end -->

            <div class="item">
              <div class="quote-item">
                <span class="quote-text">
                  Bagi saya mengikuti pelatihan disini merupakan
                  pengalaman bagus. Pemateri yang ramah, penyampaian materi
                  yang baik serta fasilitasnya yang sangat luar biasa.
                </span>

                <div class="quote-item-footer">
                  <img
                    loading="lazy"
                    class="testimonial-thumb"
                    src="{{ asset('img/testimonial/student.webp') }}"
                    alt="testimonial"
                  />
                  <div class="quote-item-info">
                    <h3 class="quote-author">
                      Geby., A.Md. Kes
                    </h3>
                    <span class="quote-subtext">Alumni Pelatihan POPAL</span>
                  </div>
                </div>
              </div>
              <!-- Quote item end -->
            </div>
            <!--/ Item 3 end -->
          </div>
          <!--/ Testimonial carousel end-->
        </div>
        <!-- Col end -->

        <div class="col-lg-6 mt-5 mt-lg-0">
          <h3 class="column-title">Klien Kami</h3>
          <div id="client-slide" class="client-slide">
            <div class="item all-clients">
              <div class="row">
                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/adf.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 1 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/ahm.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 2 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/anj.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 3 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/antam.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 4 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/bmj.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 5 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/bogasari.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 6 end -->
              </div>
            </div>
            <div class="item all-clients">
              <div class="row">
                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/bukit-asam.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 1 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/conch.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 2 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/dhl.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 3 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/garuda-metal-utama.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 4 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/geo-dipa-energi.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 5 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/gondola.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 6 end -->
              </div>
            </div>
            <div class="item all-clients">
              <div class="row">
                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/holcim.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 1 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/honda.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 2 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/idemitsu.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 3 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/imip.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 4 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/indo-tirta-abadi.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 5 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/indofood.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 6 end -->
              </div>
            </div>
            <div class="item all-clients">
              <div class="row">
                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/indonesia-power.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 1 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/kai.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 2 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/kino.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 3 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/kogen.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 4 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/kyb.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 5 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/ldc.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 6 end -->
              </div>
            </div>
            <div class="item all-clients">
              <div class="row">
                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/medco-energi.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 1 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/metalindo.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 2 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/michelin.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 3 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/mnk.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 4 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/moya.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 5 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/multistrada.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 6 end -->
              </div>
            </div>
            <div class="item all-clients">
              <div class="row">
                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/nbc.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 1 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/pokphand.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 2 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/ptpn.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 3 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/risvatama.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 4 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/softex.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 5 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/suzuki.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 6 end -->
              </div>
            </div>
            <div class="item all-clients">
              <div class="row">
                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/toyamilindo.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 1 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/unsoed.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 2 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/utc.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 3 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/weltes.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 4 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/wika.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 5 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/wilmar.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 6 end -->
              </div>
            </div>
            <div class="item all-clients">
              <div class="row">
                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/wings.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 1 end -->

                <div class="col-sm-4 col-6">
                  <figure class="clients-logo">
                    <img
                      loading="lazy"
                      class="img-fluid"
                      src="{{ asset('img/clients/yachiyo.webp') }}"
                      alt="clients-logo"
                    />
                  </figure>
                </div>
                <!-- Client 2 end -->
              </div>
            </div>
          </div>

          <!-- Clients row end -->
        </div>
        <!-- Col end -->
      </div>
      <!--/ Content row end -->
    </div>
    <!--/ Container end -->
  </section>
  <!-- Testimonial End -->
@endsection

@section('myjsfile')
@endsection
