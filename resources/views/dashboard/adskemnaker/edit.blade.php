@extends('dashboard.layouts.main')

@section('container')

<!-- kemnaker start -->
<div class="kemnaker-section section-padding px-3 py-2 bg-white rounded">
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
            <a href="/dashboard/kemnaker" class="text-primary">
                <i class="fa-solid fa-k"></i
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
        <div class="col-md-12">
            <div class="form-registration w-100">
              <form
                method="post"
                action="/dashboard/adskemnaker/{{ $kemnaker->slugKemnaker }}"
                class="mb-2"
                enctype="multipart/form-data"
              >
                @method("put")
                @csrf
                <div class="d-md-flex pt-2 pb-2 mb-2">
                    <div class="name w-100 mb-2 mb-md-0">
                        <label for="name" class="form-label"
                        >Nama Lengkap</label
                        >
                        <input readonly type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required value="{{ old('name', $kemnaker->name) }}">
                        @error('name')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2 w-100" hidden>
                        <label for="slug" class="form-label"
                        >Slug</label
                        >
                        <input readonly type="text" placeholder="Slug" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $kemnaker->slug) }}">
                        @error('slug')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="birthdate w-100">
                        <label for="birthdate" class="form-label"
                        >Tempat Tanggal Lahir</label
                        >
                        <input readonly type="text" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate" name="birthdate" required value="{{ old('birthdate', $kemnaker->birthdate) }}">
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
                        Alamat Email</label
                        >
                        <input readonly type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email', $kemnaker->email) }}">
                        @error('email')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="phone w-100">
                        <label for="phone" class="form-label"
                        >Nomor Telepon (Whatsapp)</label
                        >
                        <input readonly type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" required value="{{ old('phone', $kemnaker->phone) }}">
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
                        Jenjang Pendidikan Terakhir</label
                        >
                        <select disabled class="form-select" name="education_id">
                          @foreach ($education as $education)
                              <option value="{{ $education->id }}" {{ old('education_id', $kemnaker->education_id) == $education->id ? 'selected' : null }}>{{ $education->name }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="job w-100">
                        <label for="job" class="form-label"
                        >Status Pekerjaan
                        <span class="text-danger">*</span></label
                        >
                        <input type="text" class="form-control @error('job') is-invalid @enderror" id="job" name="job" required value="{{ old('job', $kemnaker->job) }}">
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
                        <input readonly type="text" class="form-control @error('company') is-invalid @enderror" id="company" name="company" value="{{ old('company', $kemnaker->company) }}" placeholder="Khusus bagi yang sedang bekerja">
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
                    <textarea class="form-control @error('company_address') is-invalid @enderror" id="company_address" name="company_address" value="{{ old('company_address', $kemnaker->company_address) }}" placeholder="Khusus bagi yang sedang bekerja" style="height: 150px">@error('company_address')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror</textarea>
                </div>
                <div class="mb-2">
                    <label for="company_messenger" class="form-label"
                        >Apakah Anda termasuk utusan perusahaan ?</label
                    >
                    <input readonly type="text" class="form-control @error('company_messenger') is-invalid @enderror" id="company_messenger" name="company_messenger" required value="{{ old('company_messenger', $kemnaker->company_messenger) }}">
                    @error('company_messenger')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="have_attended_training" class="form-label"
                        >Apakah Anda pernah mengikuti Program Pelatihan K3
                        ?</label
                    >
                    <input readonly type="text" class="form-control @error('have_attended_training') is-invalid @enderror" id="have_attended_training" name="have_attended_training" required value="{{ old('have_attended_training', $kemnaker->have_attended_training) }}">
                    @error('have_attended_training')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="program" class="form-label"
                        >Program Pelatihan yang dipilih
                        <span class="text-danger">*</span></label
                    >
                    
                    <select disabled class="form-select" name="ads_id">
                        @foreach ($ads as $ads)
                            <option value="{{ $ads->id }}" {{ old('ad_id', $kemnaker->ads_id) == $ads->id ? 'selected' : null }}>{{ $ads->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2">
                    <label for="progress" class="form-label">Status Follow Up</label>
                    <select  id="progress" name="progress" class="form-control @error('progress') is-invalid @enderror" id="progress" name="progress" required  value="{{ old('progress', $kemnaker->progress) }}">
                      @foreach ($progress as $progress)
                          @if (old('progress') == $progress)
                              <option value="{{ $progress }}" selected>{{ $progress }}</option>
                          @else
                              <option value="{{ $progress }}">{{ $progress }}</option>
                          @endif
                      @endforeach
                  </select>
                </div>
                <div class="d-flex">
                  <button type="submit" class="btn btn-success me-1">
                    <i class="fa-regular fa-floppy-disk me-1"></i>Simpan
                  </button>
                  <button type="reset" class="btn btn-danger">
                    <i class="fa-solid fa-rotate-right me-1"></i>Reset
                  </button>
                </div>
              </form>
            </div>
        </div>
      </div>
</div>
<!-- kemnaker end -->

@endsection