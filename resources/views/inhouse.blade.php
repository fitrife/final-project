@extends('layouts.main')
@section('container')

    <!-- Banner start -->
    <div
    id="banner-page"
    class="banner-page"
    style="background-image: url(img/pendaftaran-inhouse.webp)"
    >
        <div class="page-title">
        <div class="container">
            <div class="row">
            <div class="col-lg-12 inner">
                <div class="page-heading">
                <h1 class="page-title">Inhouse Training</h1>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <!-- Banner end -->

    <!-- Registration Start -->
    <section class="registration section-padding">
        <div class="container">
            <div class="form-applicant">
                <div
                  class="tab-pane fade active show"
                  id="form"
                  role="tabpanel"
                  aria-labelledby="form-tab"
                >
                  @if(session()->has('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ session('success') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  @endif
                  <div class="form box">
                    <div class="title text-center">
                      <h3 class="text-capitalize mb-2">Formulir Pendaftaran</h3>
                      <p class="mb-4 text-danger">
                        *Silahkan lakukan pengisian data pada kolom formulir dibawah
                        ini dengan benar dan lengkap
                      </p>
                    </div>
                    <div class="form-registration w-100">
                      <form
                        method="post"
                        action="/inhouse-training"
                        class="mb-2"
                        enctype="multipart/form-data"
                      >
                        @csrf 
                        <div class="pt-2 pb-2 mb-2 subtitle">
                          <h4 class="text-capitalize mb-2">Data Materi Training</h4>
                        </div>
                        <div class="mb-3">
                          <label for="program" class="form-label"
                            >Topik Pelatihan <span class="text-danger">*</span></label
                          >
                          <input
                            type="text"
                            class="form-control @error('program') is-invalid @enderror"
                            id="program"
                            name="program"
                            required=""
                            value="{{ old('program') }}"
                          />
                          @error('program')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                          @enderror
                        </div>
                        <div class="d-md-flex pt-2 pb-2 mb-2">
                          <div class="total_of_participants w-100 mb-2 mb-md-0">
                            <label for="total_of_participants" class="form-label"
                              >Jumlah Peserta
                              <span class="text-danger">*</span></label
                            >
                            <input
                              type="text"
                              class="form-control @error('name') is-invalid @enderror"
                              id="total_of_participants"
                              name="total_of_participants"
                              required=""
                              value="{{ old('total_of_participants') }}"
                            />
                            @error('total_of_participants')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                          </div>
                        </div>
                        <div class="d-md-flex pt-2 pb-2 mb-2">
                          <div class="name_of_participants w-100 mb-2 mb-md-0">
                            <label for="name_of_participants" class="form-label"
                              >Nama Peserta Yang Didaftarkan
                              <span class="text-danger">*</span></label
                            >
                            <textarea
                                  class="form-control"
                                  id="name_of_participants"
                                  name="name_of_participants"
                                  value=""
                                  style="height: 150px"
                              >@error('name_of_participants')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                              @enderror</textarea>
                          </div>
                        </div>
                        <div class="pt-2 pb-2 mb-2 subtitle">
                          <h4 class="text-capitalize mb-2">Personal Data</h4>
                        </div>
                        <div class="d-md-flex pt-2 pb-2 mb-2">
                          <div class="name w-100 mb-2 mb-md-0">
                            <label for="name" class="form-label"
                              >Nama <span class="text-danger">*</span></label
                            >
                            <input
                              type="text"
                              class="form-control @error('name') is-invalid @enderror"
                              id="name"
                              name="name"
                              required=""
                              value="{{ old('name') }}"
                            />
                            @error('name')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                          </div>
                          <div class="mb-3" hidden>
                            <label for="name" class="form-label"
                              >Slug <span class="text-danger">*</span></label
                            >
                            <input
                              type="text"
                              placeholder="Slug"
                              class="form-control @error('slug') is-invalid @enderror"
                              id="slug"
                              name="slug"
                              required=""
                              value="{{ old('slug') }}"
                            />
                            @error('slug')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                          </div>
                          <div class="job_position w-100">
                            <label for="job_position" class="form-label"
                              >Jabatan <span class="text-danger">*</span></label
                            >
                            <input
                              type="text"
                              class="form-control @error('job_position') is-invalid @enderror"
                              id="job_position"
                              name="job_position"
                              required=""
                              value="{{ old('job_position') }}"
                            />
                            @error('job_position')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                          </div>
                        </div>
                        <div class="d-md-flex pt-2 pb-2 mb-2">
                          <div class="company w-100">
                            <label for="company" class="form-label"
                              >Asal Perusahaan</label
                            >
                            <input
                              type="text"
                              class="form-control @error('job_position') is-invalid @enderror"
                              id="company"
                              name="company"
                              value="{{ old('company') }}"
                            />
                            @error('company')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                          </div>
                        </div>
                        <div class="mb-2">
                          <label for="company_address" class="form-label"
                            >Alamat Perusahaan</label
                          >
                          <textarea
                            class="form-control @error('company_address') is-invalid @enderror"
                            id="company_address"
                            name="company_address"
                            value="{{ old('company_address') }}"
                            style="height: 150px"
                          >@error('message')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                        @enderror</textarea>
                        </div>
                        <div class="d-md-flex pt-2 pb-2 mb-2">
                          <div class="company_mail w-100 mb-2 mb-md-0">
                            <label for="company_email" class="form-label">
                              Email Perusahaan
                              <span class="text-danger">*</span></label
                            >
                            <input
                              type="text"
                              class="form-control @error('company_email') is-invalid @enderror"
                              id="company_email"
                              name="company_email"
                              required=""
                              value="{{ old('company_email') }}"
                            />
                            @error('company_email')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                          </div>
                          <div class="email w-100 mb-2 mb-md-0">
                            <label for="email" class="form-label">
                              Email Alternatif
                              <span class="text-danger">*</span></label
                            >
                            <input
                              type="text"
                              class="form-control @error('alternative_email') is-invalid @enderror"
                              id="alternative_email"
                              name="alternative_email"
                              required=""
                              value="{{ old('alternative_email') }}"
                            />
                            @error('alternative_email')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                          </div>
                        </div>
                        <div class="d-md-flex pt-2 pb-2 mb-2">
                          <div class="company_phone w-100">
                            <label for="company_phone" class="form-label"
                              >Nomor Telepon Kantor
                              <span class="text-danger">*</span></label
                            >
                            <input
                              type="text"
                              class="form-control @error('company_phone') is-invalid @enderror"
                              id="company_phone"
                              name="company_phone"
                              required=""
                              value="{{ old('company_phone') }}"
                            />
                            @error('company_phone')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                          </div>
                          <div class="handphone w-100">
                            <label for="handphone" class="form-label"
                              >Nomor Handphone
                              <span class="text-danger">*</span></label
                            >
                            <input
                              type="text"
                              class="form-control @error('company_phone') is-invalid @enderror"
                              id="handphone"
                              name="handphone"
                              required=""
                              value="{{ old('handphone') }}"
                            />
                            @error('handphone')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                          </div>
                        </div>
                        <div class="d-flex">
                          <button type="submit" class="btn btn-primary py-3 px-5">
                            <i class="ri-save-3-line me-1"></i>Daftar
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Registration End -->

@endsection

@section('myjsfile')
    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');
    
        name.addEventListener('change', function() {
            fetch('/inhouse-training/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
  </script>
@endsection