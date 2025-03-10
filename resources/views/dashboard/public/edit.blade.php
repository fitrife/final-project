@extends('dashboard.layouts.main')

@section('container')

    <!-- Public Start -->
    <div class="public-section section-padding px-3 py-2 bg-white rounded">
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
                  <a href="/dashboard/public" class="text-primary">
                    <i class="fa-solid fa-people-group"></i
                  ></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  <i class="fa-solid fa-pencil me-1"></i> Edit Pendaftar Public Training
                </li>
              </ol>
            </nav>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <form method="post" action="/dashboard/public/{{ $public->slug }}" class="mb-5" enctype="multipart/form-data">
                @method("put")
                @csrf
                <div class="pt-2 pb-2 mb-2 subtitle">
                    <h4 class="text-capitalize mb-2">Data Materi Training</h4>
                  </div>
                  <div class="mb-3">
                    <label for="program" class="form-label"
                      >Topik Pelatihan</label
                    >
                    <input readonly
                      type="text"
                      class="form-control @error('program') is-invalid @enderror"
                      id="program"
                      name="program"
                      required=""
                      value="{{ old('program', $public->program) }}"
                    />
                    @error('program')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>
                  <div class="d-md-flex pt-2 pb-2 mb-2 disable">
                    <div class="total_of_participants w-100 mb-2 mb-md-0">
                      <label for="total_of_participants" class="form-label"
                        >Jumlah Peserta</label
                      >
                      <input readonly
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        id="total_of_participants"
                        name="total_of_participants"
                        required=""
                        value="{{ old('total_of_participants', $public->total_of_participants) }}"
                      />
                      @error('total_of_participants')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="d-md-flex pt-2 pb-2 mb-2 disable">
                    <div class="name_of_participants w-100 mb-2 mb-md-0">
                      <label for="name_of_participants" class="form-label"
                        >Nama Peserta Yang Didaftarkan</label
                      >
                      <textarea readonly class="form-control" id="name_of_participants" type="hidden" name="name_of_participants" style="height: 150px">{{ old('name_of_participants', $public->name_of_participants) }}</textarea>
                      @error('name_of_participants')
                          <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                  <div class="pt-2 pb-2 mb-2 subtitle">
                    <h4 class="text-capitalize mb-2">Personal Data</h4>
                  </div>
                  <div class="d-md-flex pt-2 pb-2 mb-2">
                    <div class="name w-100 mb-2 mb-md-0">
                      <label for="name" class="form-label"
                        >Nama</label
                      >
                      <input readonly
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        id="name"
                        name="name"
                        required=""
                        value="{{ old('name', $public->name) }}"
                      />
                      @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="mb-3" hidden>
                      <label for="name" class="form-label"
                        >Slug</label
                      >
                      <input readonly
                        type="text"
                        placeholder="Slug"
                        class="form-control @error('slug') is-invalid @enderror"
                        id="slug"
                        name="slug"
                        required=""
                        value="{{ old('slug', $public->slug) }}"
                      />
                      @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="job_position w-100">
                      <label for="job_position" class="form-label"
                        >Jabatan</label
                      >
                      <input readonly
                        type="text"
                        class="form-control @error('job_position') is-invalid @enderror"
                        id="job_position"
                        name="job_position"
                        required=""
                        value="{{ old('job_position', $public->job_position) }}"
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
                      <input readonly
                        type="text"
                        class="form-control @error('job_position') is-invalid @enderror"
                        id="company"
                        name="company"
                        value="{{ old('company', $public->company) }}"
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
                    <textarea readonly class="form-control" id="company_address" type="hidden" name="company_address" style="height: 150px">{{ old('company_address', $public->company_address) }}</textarea>
                      @error('company_address')
                          <p class="text-danger">{{ $message }}</p>
                      @enderror
                  </div>
                  <div class="d-md-flex pt-2 pb-2 mb-2">
                    <div class="company_mail w-100 mb-2 mb-md-0">
                      <label for="company_email" class="form-label">
                        Email Perusahaan</label
                      >
                      <input readonly
                        type="text"
                        class="form-control @error('company_email') is-invalid @enderror"
                        id="company_email"
                        name="company_email"
                        required=""
                        value="{{ old('company_email', $public->company_email) }}"
                      />
                      @error('company_email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="email w-100 mb-2 mb-md-0">
                      <label for="email" class="form-label">
                        Email Alternatif</label
                      >
                      <input readonly
                        type="text"
                        class="form-control @error('alternative_email') is-invalid @enderror"
                        id="alternative_email"
                        name="alternative_email"
                        required=""
                        value="{{ old('alternative_email', $public->alternative_email) }}"
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
                        >Nomor Telepon Kantor</label
                      >
                      <input readonly
                        type="text"
                        class="form-control @error('company_phone') is-invalid @enderror"
                        id="company_phone"
                        name="company_phone"
                        required=""
                        value="{{ old('company_phone', $public->company_phone) }}"
                      />
                      @error('company_phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="handphone w-100">
                      <label for="handphone" class="form-label"
                        >Nomor Handphone</label
                      >
                      <input readonly
                        type="text"
                        class="form-control @error('handphone') is-invalid @enderror"
                        id="handphone"
                        name="handphone"
                        required=""
                        value="{{ old('handphone', $public->handphone) }}"
                      />
                      @error('handphone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="mb-2">
                    <label for="progress" class="form-label">Status Follow Up</label>
                    <select  id="progress" name="progress" class="form-control @error('progress') is-invalid @enderror" id="progress" name="progress" required  value="{{ old('progress', $public->progress) }}">
                        @foreach ($progress as $progress)
                            <option value="{{ $progress }}" {{ old('progress', $public->progress) == $progress ? 'selected' : null }}>{{ $progress }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex">
                <button type="submit" class="btn btn-success btn-form me-1">
                    <i class="ri-save-3-line me-1"></i>Simpan
                </button>
                <button type="reset" class="btn btn-danger btn-form">
                    <i class="ri-restart-line me-1"></i>Reset
                </button>
                </div>
            </form>
          </div>
        </div>
    </div>
    <!-- Public end -->

@endsection
