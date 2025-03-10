@extends('layouts.main')
@section('container')
<section class="banner ads bg-light section-padding">
    <div class="container">
      <div class="row">
          <div class="col-md-6 m-auto">
            <h1 class="title">Yuk Upgrade Skill di Industri K3</h1>
            <h6 class="fw-semibold text-muted pb-3 ads-subtitle">Bersama Pusat Pelatihan K3 Training Ahli K3 Umum Sertifikasi Kemnaker RI </h6>
            <div class="btn-ads">
              <a href="#registration" class="btn btn-primary">Daftar Sekarang</a>
            </div>
          </div>
          <div class="col-md-6">
             <div class="image">
              @if ($ad->thumbnail)
              <img loading="lazy" src="{{ asset('storage/' .$ad->thumbnail) }}" class="img-fluid pt-3"
              alt="{{ $ad->thumbnail }}">
              @endif
            </div>
          </div>
      </div>
    </div>
</section>

<section class="program-desc section-padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="column-title mrt-0">
          {{ $ad->name }}
        </h2>
        <p>
          {!! $ad->description !!}
        </p>
      </div>
    </div>
  </div>
</section>

<section class="curriculum">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3 class="column-title-small">Materi Pelatihan</h3>

        <p>
          {!! $ad->theory !!}
        </p>
      </div>
      <div class="col-md-6 mt-5 mt-md-0">
        <h3 class="column-title-small">Info Lebih Lanjut</h3>

        <div
          class="accordion accordion-group accordion-classic"
          id="construction-accordion"
        >
        @if($ad->training_categories_id == '3')
        <div class="card">
            <div
                class="card-header p-0 bg-transparent"
                id="headingOne"
            >
                <h2 class="mb-0">
                <button
                    class="btn btn-block text-start collapsed w-100 rounded-0"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseOne"
                    aria-expanded="true"
                    aria-controls="collapseOne"
                >
                    Tujuan Training
                </button>
                </h2>
            </div>

            <div
                id="collapseOne"
                class="collapse show"
                aria-labelledby="headingOne"
                data-parent="#construction-accordion"
                style=""
            >
                <div class="card-body">
                {!! $ad->goal !!}
                </div>
            </div>
        </div>
        @else
        <div class="card">
            <div
                class="card-header p-0 bg-transparent"
                id="headingRequirement"
            >
                <h2 class="mb-0">
                <button
                    class="btn btn-block text-start collapsed w-100 rounded-0"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseRequirement"
                    aria-expanded="true"
                    aria-controls="collapseRequirement"
                >
                    Persyaratan Peserta
                </button>
                </h2>
            </div>

            <div
                id="collapseRequirement"
                class="collapse show"
                aria-labelledby="headingRequirement"
                data-parent="#requirementAccordion"
                style=""
            >
                <div class="card-body">
                {!! $ad->participant_requirement !!}
                </div>
            </div>
        </div>
        @endif
        <div class="card">
          <div class="card-header p-0 bg-transparent" id="headingTwo">
              <h2 class="mb-0">
              <button
                  class="btn btn-block text-start w-100 rounded-0"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseTwo"
                  aria-expanded="false"
                  aria-controls="collapseTwo"
              >
                  Metode
              </button>
              </h2>
          </div>
          <div
              id="collapseTwo"
              class="collapse"
              aria-labelledby="headingTwo"
              data-parent="#construction-accordion"
          >
              <div class="card-body">
              {!! $ad->method !!}
              </div>
          </div>
          </div>
          <div class="card">
          <div class="card-header p-0 bg-transparent" id="headingThree">
              <h2 class="mb-0">
              <button
                  class="btn btn-block text-start w-100 rounded-0 collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseThree"
                  aria-expanded="false"
                  aria-controls="collapseThree"
              >
                  Fasilitas
              </button>
              </h2>
          </div>
          <div
              id="collapseThree"
              class="collapse"
              aria-labelledby="headingThree"
              data-parent="#construction-accordion"
              style=""
          >
              <div class="card-body">
                  {!! $ad->facility !!}
              </div>
          </div>
          </div>
          <div class="card">
          <div class="card-header p-0 bg-transparent" id="headingThree">
              <h2 class="mb-0">
              <button
                  class="btn btn-block text-start w-100 rounded-0 collapsed"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseFour"
                  aria-expanded="false"
                  aria-controls="collapseFour"
              >
                  Jadwal Terdekat
              </button>
              </h2>
          </div>
          <div
              id="collapseFour"
              class="collapse"
              aria-labelledby="headingFour"
              data-parent="#construction-accordion"
              style=""
          >
              <div class="card-body">
              <table class="table">
                  <thead>
                  <tr>
                      <th scope="col">Skema</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Metode</th>
                  </tr>
                  </thead>
                  <tbody>
                  {{-- @foreach ($schedule as $schedule)
                  <tr>
                    <td>{{ $schedule->name }}</td>
                    <td>{{ $schedule->schedule }}</td>
                    <td>{{ $schedule->method }}</td>
                  </tr>
                  @endforeach --}}
                  </tbody>
              </table>
              </div>
          </div>
          </div>
        </div>
        <!--/ Accordion end -->
      </div>
    </div>
  </div>
</section>

<section class="registration section-padding">
  <div class="container">
    <div class="form-applicant">
      <div
      class="tab-pane fade active show"
      id="form"
      role="tabpanel"
      aria-labelledby="form-tab"
      >
          
          @if($ad->training_categories_id == '3')
          
          <div class="form box">
              <div class="title text-center">
                <h3 class="text-capitalize mb-2">Formulir Pendaftaran</h3>
                <p class="mb-4 text-danger">
                  *Silahkan lakukan pengisian data pada kolom formulir dibawah
                  ini dengan benar dan lengkap
                </p>
              </div>
              <div class="form-registration w-100"  id="registration">
                <form
                  method="post"
                  action="/{{ $ad->slug }}"
                  class="mb-2"
                  enctype="multipart/form-data"
                >
                @csrf
                  <div class="pt-2 pb-2 mb-2 subtitle">
                    <h4 class="text-capitalize mb-2">Data Materi Training</h4>
                  </div>
                  <div class="mb-3">
                    <label for="program" class="form-label"
                      >Program Softskill yang dipilih
                      <span class="text-danger">*</span></label
                    >
                    <select class="form-select" name="ad_id">
                      @if (old('ad_id') == $ad->id)
                          <option value="{{ $ad->id }}" selected>{{ $ad->name }}</option>
                      @else
                      <option value="{{ $ad->id }}">{{ $ad->name }}</option>
                      @endif
                  </select>
                  </div>
                  <div class="d-md-flex pt-2 pb-2 mb-2">
                    <div class="total-of-participant w-100 mb-2 mb-md-0">
                      <label for="total_of_participant" class="form-label"
                        >Jumlah Peserta
                        <span class="text-danger">*</span></label
                      >
                      <input type="text" class="form-control @error('total_of_participant') is-invalid @enderror" id="total_of_participant" name="total_of_participant" required value="{{ old('total_of_participant') }}">
                      @error('total_of_participant')
                          <div class="invalid-feedback">
                          {{ $message }}
                          </div>
                      @enderror
                    </div>
                  </div>
                  <div class="d-md-flex pt-2 pb-2 mb-2">
                    <div class="participants w-100 mb-2 mb-md-0">
                      <label for="participants" class="form-label"
                        >Nama Peserta Yang Didaftarkan
                        <span class="text-danger">*</span></label
                      >
                      <textarea class="form-control @error('participants') is-invalid @enderror" id="participants" name="participants" value="{{ old('participants') }}" style="height: 150px">@error('participants')
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
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameSoftskill" name="name" required value="{{ old('name') }}">
                      @error('name')
                          <div class="invalid-feedback">
                          {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <input type="text" placeholder="Slug" class="form-control @error('slugSoftskill') is-invalid @enderror" id="slugSoftskill" name="slugSoftskill" required value="{{ old('slugSoftskill') }}">
                          @error('slugSoftskill')
                              <div class="invalid-feedback">
                              {{ $message }}
                              </div>
                          @enderror
                    </div>
                    <div class="job-position w-100">
                      <label for="job-position" class="form-label"
                        >Jabatan <span class="text-danger">*</span></label
                      >
                      <input type="text" class="form-control @error('job_position') is-invalid @enderror" id="job_position" name="job_position" required value="{{ old('job_position') }}">
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
                      <input type="text" class="form-control @error('company') is-invalid @enderror" id="company" name="company" required value="{{ old('company') }}">
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
                    <textarea class="form-control @error('company_address') is-invalid @enderror" id="company_address" name="company_address" value="{{ old('company_address') }}" style="height: 150px">@error('company_address')
                      <div class="invalid-feedback">
                      {{ $message }}
                      </div>
                  @enderror</textarea>
                  </div>
                  <div class="d-md-flex pt-2 pb-2 mb-2">
                    <div class="company-email w-100 mb-2 mb-md-0">
                      <label for="company_email" class="form-label">
                        Email Perusahaan
                        <span class="text-danger">*</span></label
                      >
                      <input type="text" class="form-control @error('company_email') is-invalid @enderror" id="company_email" name="company_email" required value="{{ old('company_email') }}">
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
                      <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email') }}">
                      @error('email')
                          <div class="invalid-feedback">
                          {{ $message }}
                          </div>
                      @enderror
                    </div>
                  </div>
                  <div class="d-md-flex pt-2 pb-2 mb-2">
                    <div class="telephone w-100">
                      <label for="telephone" class="form-label"
                        >Nomor Telepon Kantor
                        <span class="text-danger">*</span></label
                      >
                      <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone" required value="{{ old('telephone') }}">
                      @error('telephone')
                          <div class="invalid-feedback">
                          {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="phone w-100">
                      <label for="phone" class="form-label"
                        >Nomor Handphone
                        <span class="text-danger">*</span></label
                      >
                      <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" required value="{{ old('phone') }}">
                      @error('phone')
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
          @elseif($ad->training_categories_id == '2')
          <div class="form box" id="registration">
              <div class="title text-center">
              <h3 class="text-capitalize mb-2">Formulir Pendaftaran</h3>
              <p class="mb-4 text-danger">
                  *Silahkan lakukan pengisian data pada kolom formulir dibawah
                  ini dengan benar dan lengkap
              </p>
              </div>
              <div class="form-registration w-100" id="registration">
              <form method="post" action="/{{ $ad->slug }}" class="mb-2" enctype="multipart/form-data">
                  @csrf
                  <div class="d-md-flex pt-2 pb-2 mb-2">
                      <div class="name w-100 mb-2 mb-md-0">
                          <label for="name" class="form-label"
                          >Nama Lengkap <span class="text-danger">*</span></label
                          >
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameBnsp" name="name" required value="{{ old('name') }}">
                          @error('name')
                              <div class="invalid-feedback">
                              {{ $message }}
                              </div>
                          @enderror
                      </div>
                      <div class="mb-2 w-100" >
                          <label for="slug" class="form-label"
                          >Slug<span class="text-danger">*</span></label
                          >
                          <input type="text" placeholder="Slug" class="form-control @error('slugBnsp') is-invalid @enderror" id="slugBnsp" name="slugBnsp" required value="{{ old('slugBnsp') }}">
                          @error('slugBnsp')
                              <div class="invalid-feedback">
                              {{ $message }}
                              </div>
                          @enderror
                      </div>
                      <div class="birthdate w-100">
                          <label for="birthdate" class="form-label"
                          >Tempat Tanggal Lahir
                          <span class="text-danger">*</span></label
                          >
                          <input type="text" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate" name="birthdate" required value="{{ old('birthdate') }}">
                          @error('birthdate')
                              <div class="invalid-feedback">
                              {{ $message }}
                              </div>
                          @enderror
                      </div>
                  </div>
                  <div class="d-md-flex pt-2 pb-2 mb-2">
                      <div class="email w-100 mb-2 mb-md-0">
                          <label for="email" class="form-label">
                          Alamat Email <span class="text-danger">*</span></label
                          >
                          <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email') }}">
                          @error('email')
                              <div class="invalid-feedback">
                              {{ $message }}
                              </div>
                          @enderror
                      </div>
                      <div class="phone w-100">
                          <label for="phone" class="form-label"
                          >Nomor Telepon (Whatsapp)
                          <span class="text-danger">*</span></label
                          >
                          <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" required value="{{ old('phone') }}">
                          @error('phone')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                  </div>
                  <div class="d-md-flex pt-2 pb-2 mb-2">
                      <div class="education w-100 mb-2 mb-md-0">
                          <label for="education" class="form-label">
                          Jenjang Pendidikan Terakhir
                          <span class="text-danger">*</span></label
                          >
                          <select class="form-select" name="education_id">
                              @foreach ($education as $education)
                                  @if (old('education_id') == $education->id)
                                      <option value="{{ $education->id }}" selected>{{ $education->name }}</option>
                                  @else
                                  <option value="{{ $education->id }}">{{ $education->name }}</option>
                                  @endif
                              @endforeach
                          </select>
                      </div>
                      <div class="job w-100">
                          <label for="job" class="form-label"
                          >Status Pekerjaan
                          <span class="text-danger">*</span></label
                          >
                          <input type="text" class="form-control @error('job') is-invalid @enderror" id="job" name="job" required value="{{ old('job') }}">
                          @error('job')
                              <div class="invalid-feedback">
                              {{ $message }}
                              </div>
                          @enderror
                      </div>
                      <div class="company w-100">
                          <label for="company" class="form-label"
                          >Asal Perusahaan</label
                          >
                          <input type="text" class="form-control @error('company') is-invalid @enderror" id="company" name="company" value="{{ old('company') }}" placeholder="Khusus bagi yang sedang bekerja">
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
                      <textarea class="form-control @error('company_address') is-invalid @enderror" id="company_address" name="company_address" value="{{ old('company_address') }}" placeholder="Khusus bagi yang sedang bekerja" style="height: 150px">@error('company_address')
                          <div class="invalid-feedback">
                          {{ $message }}
                          </div>
                      @enderror</textarea>
                  </div>
                  <div class="mb-2">
                      <label for="company_messenger" class="form-label"
                          >Apakah Anda termasuk utusan perusahaan ?</label
                      >
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="company_messenger" id="ya" value="Ya">
                          <label class="form-check-label" for="ya">Ya</label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="company_messenger" id="bukan" value="Bukan">
                          <label class="form-check-label" for="bukan">Bukan</label>
                      </div>
                  </div>
                  <div class="mb-2">
                      <label for="have_attended_training" class="form-label"
                          >Apakah Anda pernah mengikuti Program Pelatihan K3
                          ?</label
                      >
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="have_attended_training" id="pernah" value="Pernah">
                          <label class="form-check-label" for="pernah">Pernah</label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="have_attended_training" id="belum" value="Belum Pernah">
                          <label class="form-check-label" for="belum">Belum Pernah</label>
                      </div>
                  </div>
                  <div class="mb-3">
                      <label for="program" class="form-label"
                          >Program Pelatihan yang dipilih
                          <span class="text-danger">*</span></label
                      >
                      <select class="form-select" name="ad_id">
                          @if (old('ad_id') == $ad->id)
                              <option value="{{ $ad->id }}" selected>{{ $ad->name }}</option>
                          @else
                          <option value="{{ $ad->id }}">{{ $ad->name }}</option>
                          @endif
                      </select>
                  </div>
                  <div class="mb-3" hidden>
                      <label for="program" class="form-label"
                          >Kategori Pelatihan yang dipilih
                          <span class="text-danger">*</span></label
                      >
                      <select class="form-select" name="training_categories_id">
                          @if (old('training_categories_id') == $ad->training_categories_id)
                              <option value="{{ $ad->training_categories_id }}" selected>{{ $ad->kategori->name }}</option>
                          @else
                          <option value="{{ $ad->training_categories_id }}">{{ $ad->training_categories->name }}</option>
                          @endif
                      </select>
                  </div>
                  <div class="d-flex">
                      <button type="submit" class="btn btn-primary py-3 px-5">
                          <i class="ri-save-3-line me-1"></i>Daftar
                      </button>
                  </div>
              </form>
              </div>
          </div>
          @else
          <div class="form box">
              <div class="title text-center">
              <h3 class="text-capitalize mb-2">Formulir Pendaftaran</h3>
              <p class="mb-4 text-danger">
                  *Silahkan lakukan pengisian data pada kolom formulir dibawah
                  ini dengan benar dan lengkap
              </p>
              </div>
              <div class="form-registration w-100" id="registration">
              <form method="post" action="/{{ $ad->slug }}" class="mb-2" enctype="multipart/form-data">
                  @csrf
                  <div class="d-md-flex pt-2 pb-2 mb-2">
                      <div class="name w-100 mb-2 mb-md-0">
                          <label for="name" class="form-label"
                          >Nama Lengkap <span class="text-danger">*</span></label
                          >
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameKemnaker" name="name" required value="{{ old('name') }}">
                          @error('name')
                              <div class="invalid-feedback">
                              {{ $message }}
                              </div>
                          @enderror
                      </div>
                      <div class="mb-2 w-100">
                          <label for="slugKemnaker" class="form-label"
                          >Slug<span class="text-danger">*</span></label
                          >
                          <input type="text" placeholder="Slug" class="form-control @error('slugKemnaker') is-invalid @enderror" id="slugKemnaker" name="slugKemnaker" required value="{{ old('slugKemnaker') }}">
                          @error('slugKemnaker')
                              <div class="invalid-feedback">
                              {{ $message }}
                              </div>
                          @enderror
                      </div>
                      <div class="birthdate w-100">
                          <label for="birthdate" class="form-label"
                          >Tempat Tanggal Lahir
                          <span class="text-danger">*</span></label
                          >
                          <input type="text" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate" name="birthdate" required value="{{ old('birthdate') }}">
                          @error('birthdate')
                              <div class="invalid-feedback">
                              {{ $message }}
                              </div>
                          @enderror
                      </div>
                  </div>
                  <div class="d-md-flex pt-2 pb-2 mb-2">
                      <div class="email w-100 mb-2 mb-md-0">
                          <label for="email" class="form-label">
                          Alamat Email <span class="text-danger">*</span></label
                          >
                          <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email') }}">
                          @error('email')
                              <div class="invalid-feedback">
                              {{ $message }}
                              </div>
                          @enderror
                      </div>
                      <div class="phone w-100">
                          <label for="phone" class="form-label"
                          >Nomor Telepon (Whatsapp)
                          <span class="text-danger">*</span></label
                          >
                          <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" required value="{{ old('phone') }}">
                          @error('phone')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                  </div>
                  <div class="d-md-flex pt-2 pb-2 mb-2">
                      <div class="education w-100 mb-2 mb-md-0">
                          <label for="education" class="form-label">
                          Jenjang Pendidikan Terakhir
                          <span class="text-danger">*</span></label
                          >
                          <select class="form-select" name="education_id">
                              @foreach ($education as $education)
                                  @if (old('education_id') == $education->id)
                                      <option value="{{ $education->id }}" selected>{{ $education->name }}</option>
                                  @else
                                  <option value="{{ $education->id }}">{{ $education->name }}</option>
                                  @endif
                              @endforeach
                          </select>
                      </div>
                      <div class="job w-100">
                          <label for="job" class="form-label"
                          >Status Pekerjaan
                          <span class="text-danger">*</span></label
                          >
                          <input type="text" class="form-control @error('job') is-invalid @enderror" id="job" name="job" required value="{{ old('job') }}">
                          @error('job')
                              <div class="invalid-feedback">
                              {{ $message }}
                              </div>
                          @enderror
                      </div>
                      <div class="company w-100">
                          <label for="company" class="form-label"
                          >Asal Perusahaan</label
                          >
                          <input type="text" class="form-control @error('company') is-invalid @enderror" id="company" name="company" value="{{ old('company') }}" placeholder="Khusus bagi yang sedang bekerja">
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
                      <textarea class="form-control @error('company_address') is-invalid @enderror" id="company_address" name="company_address" value="{{ old('company_address') }}" placeholder="Khusus bagi yang sedang bekerja" style="height: 150px">@error('company_address')
                          <div class="invalid-feedback">
                          {{ $message }}
                          </div>
                      @enderror</textarea>
                  </div>
                  <div class="mb-2">
                      <label for="company_messenger" class="form-label"
                          >Apakah Anda termasuk utusan perusahaan ?</label
                      >
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="company_messenger" id="ya" value="Ya">
                          <label class="form-check-label" for="ya">Ya</label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="company_messenger" id="bukan" value="Bukan">
                          <label class="form-check-label" for="bukan">Bukan</label>
                      </div>
                  </div>
                  <div class="mb-2">
                      <label for="have_attended_training" class="form-label"
                          >Apakah Anda pernah mengikuti Program Pelatihan K3
                          ?</label
                      >
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="have_attended_training" id="pernah" value="Pernah">
                          <label class="form-check-label" for="pernah">Pernah</label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="have_attended_training" id="belum" value="Belum Pernah">
                          <label class="form-check-label" for="belum">Belum Pernah</label>
                      </div>
                  </div>
                  <div class="mb-3">
                      <label for="program" class="form-label"
                          >Program Pelatihan yang dipilih
                          <span class="text-danger">*</span></label
                      >
                      <select class="form-select" name="ad_id">
                          @if (old('ad_id') == $ad->id)
                              <option value="{{ $ad->id }}" selected>{{ $ad->name }}</option>
                          @else
                          <option value="{{ $ad->id }}">{{ $ad->name }}</option>
                          @endif
                      </select>
                  </div>
                  <div class="mb-3" hidden>
                      <label for="program" class="form-label"
                          >Kategori Pelatihan yang dipilih
                          <span class="text-danger">*</span></label
                      >
                      <select class="form-select" name="training_categories_id">
                          @if (old('training_categories_id') == $ad->training_categories_id)
                              <option value="{{ $ad->training_categories_id }}" selected>{{ $ad->training_categories->name }}</option>
                          @else
                          <option value="{{ $ad->training_categories_id }}">{{ $ad->training_categories->name }}</option>
                          @endif
                      </select>
                  </div>
                  <div class="d-flex">
                      <button type="submit" class="btn btn-primary py-3 px-5">
                          <i class="ri-save-3-line me-1"></i>Daftar
                      </button>
                  </div>
              </form>
              </div>
          </div>
          @endif
      </div>
  </div>
  </div>
</section>
<!-- Single Program End -->
@endsection

@section('myjsfile')
    @if($ad->training_categories_id == '1')
        <script>
            function slugKemnaker() {
                const name = document.querySelector('#nameKemnaker');
                const slugKemnaker = document.querySelector('#slugKemnaker');
            
                name.addEventListener('change', function() {
                    fetch('/{{ $ad->slug }}/checkKemnakerSlug?name=' + name.value)
                        .then(response => response.json())
                        .then(data => slugKemnaker.value = data.slugKemnaker)
                });
            }
            slugKemnaker();
        </script>
    @elseif($ad->training_categories_id == '2')
        <script>
            function slugBnsp() {
                const name = document.querySelector('#nameBnsp');
                const slugBnsp = document.querySelector('#slugBnsp');
            
                name.addEventListener('change', function() {
                    fetch('/{{ $ad->slug }}/checkBnspSlug?name=' + name.value)
                        .then(response => response.json())
                        .then(data => slugBnsp.value = data.slugBnsp)
                });
            }
            slugBnsp();
        </script>
    @else
        <script>
            function slugSoftskill() {
                const name = document.querySelector('#nameSoftskill');
                const slugSoftskill = document.querySelector('#slugSoftskill');
            
                name.addEventListener('change', function() {
                    fetch('/{{ $ad->slug }}/checkSoftskillSlug?name=' + name.value)
                        .then(response => response.json())
                        .then(data => slugSoftskill.value = data.slugSoftskill)
                });
            }
            slugSoftskill();
        </script>
    @endif
@endsection