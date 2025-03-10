@extends('dashboard.layouts.main')

@section('container')

    <!-- registrant start -->
    <div class="registrant-section section-padding px-3 py-2 bg-white rounded">
        <div class="row">
            <div class="col-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="/dashboard" class="text-primary"
                      ><i class="fa-solid fa-house-user"></i
                    ></a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="/dashboard/registrant" class="text-primary">
                      <i class="fa-solid fa-s"></i
                    ></a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-solid fa-eye me-1"></i> Lihat registrant
                  </li>
                </ol>
              </nav>
            </div>
        </div>
        <div class="row">
          <div class="col-lg-8 mb-5 mb-lg-0">
            <div class="registrant-data border-0 mb-0 pb-0">
              <div class="pt-2 subtitle">
                <h4 class="text-capitalize mb-2">Data Materi Training</h4>
              </div>
              <div class="mb-3">
                <label for="program" class="form-label mb-0"
                  >Topik Training Yang Dipilih</label
                >
                <p>
                  <i class="fa-solid fa-caret-right ms-2 me-2"></i>{{ $registrant->training->name }}
                </p>
              </div>
              {{-- <div class="mb-3">
                <label for="total-of-participan" class="form-label mb-0"
                  >Jumah Peserta</label
                >
                <p><i class="fa-solid fa-caret-right ms-2 me-2"></i>{{ $registrant->total_of_participant }}</p>
              </div> --}}
              {{-- <div class="mb-3">
                <label for="participants" class="form-label mb-0"
                  >Nama Peserta Yang Didaftarkan</label
                >
                {{-- <p class="ms-2">
                  <i class="fa-solid fa-caret-right me-2"></i>
                  {!! $registrant->participants !!}
                </p> 
              </div> --}}
              <div class="pt-2 subtitle">
                <h4 class="text-capitalize mb-2">Personal Data</h4>
              </div>
              <div class="mb-3">
                <label for="name" class="form-label mb-0">Nama</label>
                <p class="ms-2">
                  <i class="fa-solid fa-caret-right me-2"></i> {{ $registrant->name }}
                </p>
              </div>
              <div class="mb-3">
                <label for="job-position" class="form-label mb-0"
                  >Jabatan</label
                >
                <p class="ms-2">
                  <i class="fa-solid fa-caret-right me-2"></i> {{ $registrant->job }}
                </p>
              </div>
              <div class="mb-3">
                <label for="company" class="form-label mb-0"
                  >Asal Perusahaan</label
                >
                <p class="ms-2">
                  <i class="fa-solid fa-caret-right me-2"></i> {{ $registrant->company }}
                </p>
              </div>
              <div class="mb-3">
                <label for="company_address" class="form-label mb-0"
                  >Alamat Perusahaan</label
                >
                <p class="ms-2">
                  <i class="fa-solid fa-caret-right me-2"></i> {{ $registrant->company_address }}
                </p>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label mb-0"
                  >Email Alternatif</label
                >
                <p class="ms-2">
                  <i class="fa-solid fa-caret-right me-2"></i
                  >{{ $registrant->email }}
                </p>
              </div>
              <div class="mb-3">
                <label for="phone" class="form-label mb-0"
                  >Nomor Handphone</label
                >
                <p class="ms-2">
                  <i class="fa-solid fa-caret-right me-2"></i> {{ $registrant->phone }}
                </p>
              </div>
              <div class="mb-3">
                <label for="progress" class="form-label mb-0"
                  >Status Follow Up</label
                >
                <p class="ms-2">
                  <i class="fa-solid fa-caret-right me-2"></i>{{ $registrant->progress }}
                </p>
              </div>
              <div class="mb-3">
                <label for="staff-name" class="form-label mb-0"
                  >Nama CS</label
                >
                <p class="ms-2">
                  <i class="fa-solid fa-caret-right me-2"></i>
                  @if ($registrant->staff)
                      {{ $registrant->staff->name }}
                  @else
                      <span>Belum Ditindaklanjuti CS</span>
                  @endif
                </p>
              </div>
              <div class="mb-0">
                <a
                  href="/dashboard/registrant"
                  class="btn btn-success m-auto"
                >
                  <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                </a>
                <a
                  href="/dashboard/registrant/{{ $registrant->slug }}/edit"
                  class="btn btn-secondary m-auto"
                >
                  <i class="fa-solid fa-pencil me-1"></i> Edit
                </a>
              </div>
            </div>
          </div>
      </div>
    </div>
    <!-- registrant end -->

@endsection