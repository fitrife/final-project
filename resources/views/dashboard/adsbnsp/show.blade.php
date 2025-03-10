@extends('dashboard.layouts.main')

@section('container')

    <!-- bnsp start -->
    <div class="bnsp-section section-padding px-3 py-2 bg-white rounded">
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
                <a href="/dashboard/adsbnsp" class="text-primary">
                    <i class="fa-solid fa-b"></i
                ></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                <i class="fa-solid fa-eye me-1"></i> Lihat Pendaftar
                </li>
            </ol>
            </nav>
        </div>
        </div>
        <div class="row">
        <div class="col-lg-8 mb-5 mb-lg-0">
            <div class="registrant-data border-0 mb-0 pb-0">
            <div class="mb-3">
                <label for="name" class="form-label mb-0">Nama Lengkap</label>
                <p class="ms-2">
                <i class="fa-solid fa-caret-right me-2"></i>{{ $bnsp->name }}
                </p>
            </div>
            <div class="mb-3">
                <label for="birthdate" class="form-label mb-0"
                >Tempat Tanggal Lahir</label
                >
                <p class="ms-2">
                <i class="fa-solid fa-caret-right me-2"></i>{{ $bnsp->birthdate }}
                </p>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label mb-0">Email</label>
                <p class="ms-2">
                <i class="fa-solid fa-caret-right me-2"></i
                >{{ $bnsp->email }}
                </p>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label mb-0">
                Nomor Telepon (Whatsapp)</label
                >
                <p class="ms-2">
                <i class="fa-solid fa-caret-right me-2"></i>{{  $bnsp->phone  }}
                </p>
            </div>
            <div class="mb-3">
                <label for="education" class="form-label mb-0">
                Jenjang Pendidikan Terakhir</label
                >
                <p class="ms-2">
                <i class="fa-solid fa-caret-right me-2"></i>{{  $bnsp->education->name  }}
                </p>
            </div>
            <div class="mb-3">
                <label for="job" class="form-label mb-0">
                Status Pekerjaan</label
                >
                <p class="ms-2">
                <i class="fa-solid fa-caret-right me-2"></i>{{ $bnsp->job }}
                </p>
            </div>
            <div class="mb-3">
                <label for="company" class="form-label mb-0">
                Asal Perusahaan</label
                >
                <p class="ms-2">
                <i class="fa-solid fa-caret-right me-2"></i>
                @if($bnsp->company == NULL)
                    -
                @else
                    {{ $bnsp->company }}
                @endif
                </p>
            </div>
            <div class="mb-3">
                <label for="company_address" class="form-label mb-0"
                >Alamat Perusahaan</label
                >
                <p class="ms-2">
                <i class="fa-solid fa-caret-right me-2"></i>
                @if($bnsp->company_address == NULL)
                    -
                @else
                    {!! $bnsp->company_address !!}
                @endif
                </p>
            </div>
            <div class="mb-3">
                <label for="company_messenger" class="form-label"
                >Apakah pendaftar termasuk utusan perusahaan ?</label
                >
                <p class="ms-2">
                <i class="fa-solid fa-caret-right me-2"></i>{{ $bnsp->company_messenger }}
                </p>
            </div>
            <div class="mb-3">
                <label for="have_attended_training" class="form-label"
                >Apakah pendaftar pernah mengikuti Program Pelatihan K3
                ?</label
                >
                <p class="ms-2">
                <i class="fa-solid fa-caret-right me-2"></i>{{ $bnsp->have_attended_training }}
                </p>
            </div>
            <div class="mb-3">
                <label for="program" class="form-label mb-0"
                >Program Sertifikasi BNSP yang dipilih</label
                >
                <p>
                <i class="fa-solid fa-caret-right ms-2 me-2"></i>{{ $bnsp->ad->name }}
                </p>
            </div>
            <div class="mb-3">
                <label for="progress" class="form-label mb-0"
                >Status Follow Up</label
                >
                <p class="ms-2">
                <i class="fa-solid fa-caret-right me-2"></i>{{ $bnsp->progress }}
                </p>
            </div>
            <div class="mb-3">
                <label for="staff-name" class="form-label mb-0"
                >Nama CS</label
                >
                <p class="ms-2">
                <i class="fa-solid fa-caret-right me-2"></i>
                @if($bnsp->progress == "Sudah")
                    {{ $bnsp->staff->name }}
                @else
                    Belum Ditindaklanjuti
                @endif
                </p>
            </div>
            <div class="mb-0">
                <a
                href="/dashboard/adsbnsp"
                class="btn btn-success m-auto"
                >
                    <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                </a>
                <a
                href="/dashboard/adsbnsp/{{ $bnsp->slugBnsp }}/edit"
                class="btn btn-secondary m-auto"
                >
                <i class="fa-solid fa-pencil me-1"></i> Edit
                </a>
            </div>
            </div>
        </div>
        </div>
    </div>
    <!-- bnsp end -->

@endsection