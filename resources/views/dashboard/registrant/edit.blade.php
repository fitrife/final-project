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
                    <i class="fa-solid fa-pencil me-1"></i> Lihat registrant
                  </li>
                </ol>
              </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form
                        method="post"
                        action="/dashboard/registrant/{{ $registrant->slug }}"
                        class="mb-2"
                        enctype="multipart/form-data"
                      >
                      @method("put")
                      @csrf
                        <div class="pt-2 pb-2 mb-2 subtitle">
                          <h4 class="text-capitalize mb-2">Data Materi Training</h4>
                        </div>
                        <div class="mb-3">
                          <label for="program" class="form-label"
                            >Program registrant yang dipilih</label
                          >
                            <select readonly class="form-select" name="training_categories_id">
                                @foreach ($training as $training)
                                    <option value="{{ $training->id }}" {{ old('training_id', $registrant->training_id) == $training->id ? 'selected' : null }}>{{ $training->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-md-flex pt-2 pb-2 mb-2">
                          <div class="participants w-100 mb-2 mb-md-0">
                            <label for="participants" class="form-label"
                              >Nama Peserta Yang Didaftarkan
                              <span class="text-danger">*</span></label
                            >
                            <textarea readonly class="form-control" id="participants" type="hidden" name="participants" style="height: 150px">{{ old('participants', $registrant->participants) }}</textarea>
                            @error('participants')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                          </div>
                        </div>
                        <div class="pt-2 pb-2 mb-2 subtitle">
                          <h4 class="text-capitalize mb-2">Personal Data</h4>
                        </div>
                        <div class="d-md-flex pt-2 pb-2 mb-2">
                          <div  class="name w-100 mb-2 mb-md-0">
                            <label for="name" class="form-label"
                              >Nama <span class="text-danger">*</span></label
                            >
                            <input readonly type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required value="{{ old('name', $registrant->name) }}">
                            @error('name')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                          </div>
                          <div class="mb-3" hidden>
                            <input type="text" placeholder="Slug" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $registrant->slug) }}">
                            @error('slug')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                          </div>
                          <div  class="job w-100">
                            <label for="job" class="form-label"
                              >Jabatan <span class="text-danger">*</span></label
                            >
                            <input readonly type="text" class="form-control @error('job') is-invalid @enderror" id="job" name="job" required value="{{ old('job', $registrant->job) }}">
                            @error('job')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                          </div>
                        </div>
                        <div  class="d-md-flex pt-2 pb-2 mb-2">
                          <div class="company w-100">
                            <label for="company" class="form-label"
                              >Asal Perusahaan</label
                            >
                            <input readonly type="text" class="form-control @error('company') is-invalid @enderror" id="company" name="company" required value="{{ old('company', $registrant->company) }}">
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
                          <textarea readonly class="form-control" id="company_address" type="hidden" name="company_address" style="height: 150px">{{ old('company_address', $registrant->company_address) }}</textarea>
                            @error('company_address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="d-md-flex pt-2 pb-2 mb-2">
                          <div class="email w-100 mb-2 mb-md-0">
                            <label for="email" class="form-label">
                              Email Alternatif
                              <span class="text-danger">*</span></label
                            >
                            <input readonly type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email', $registrant->email) }}">
                            @error('email')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                          </div>
                        </div>
                        <div class="d-md-flex pt-2 pb-2 mb-2">
                          <div class="phone w-100">
                            <label for="phone" class="form-label"
                              >Nomor Handphone
                              <span class="text-danger">*</span></label
                            >
                            <input readonly type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" required value="{{ old('phone', $registrant->phone) }}">
                            @error('phone')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                          </div>
                        </div>
                        <div class="mb-2">
                            <label for="progress" class="form-label">Status Follow Up</label>
                            <select  id="progress" name="progress" class="form-control @error('progress') is-invalid @enderror" id="progress" name="progress" required  value="{{ old('progress', $registrant->progress) }}">
                                @foreach ($progress as $progress)
                                    <option value="{{ $progress }}" {{ old('progress', $registrant->progress) == $progress ? 'selected' : null }}>{{ $progress }}</option>
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
    <!-- registrant end -->

@endsection