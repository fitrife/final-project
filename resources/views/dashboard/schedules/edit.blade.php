@extends('dashboard.layouts.main')

@section('container')

    <!-- schedule start -->
    <div class="schedule-section section-padding px-3 py-2 bg-white rounded">
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
                <a href="/dashboard/schedules" class="text-primary">
                    <i class="fa-solid fa-calendar-days"></i
                ></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                <i class="fa-solid fa-pencil me-1"></i> Edit Jadwal
                </li>
            </ol>
            </nav>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
            <form
            method="POST"
            action="/dashboard/schedules/{{ $schedule->id }}"
            class="mb-5"
            enctype="multipart/form-data"
            >
            @method('put')
            @csrf
            <div class="d-md-flex pt-2 pb-2 mb-3">
                <div class="w-100">
                    <label for="training" class="form-label"
                    >Pilih Program Training</label
                    >
                    <select class="form-select" name="training_id">
                        @foreach ($training_id as $training)
                            @if (old('training_id', $schedule->training_id) == $training->id)
                                <option value="{{ $training->id }}" selected>{{ $training->name }}</option>
                            @else
                                <option value="{{ $training->id }}">{{ $training->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="w-100">
                    <label for="name" class="form-label">Pilih Lainnya dan Tulis Nama Program</label>
                    <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" id="name" autofocus value="{{ old('name', $schedule->name) }}">
                    
                </div>
            </div>
            <div class="mb-3">
                <label for="trainingcategories" class="form-label"
                  >Sertifikasi <span class="text-danger">*</span></label
                >
                <select class="form-select" name="training_categories_id">
                  @foreach ($training_categories_id as $category)
                      @if (old('training_categories_id', $schedule->training_categories_id) == $category->id)
                          <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                      @else
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endif
                  @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="schedule">Jadwal <span class="text-danger">*</span></label>
                <input type="schedule" name="schedule" class="form-control @error('schedule')is-invalid @enderror" id="schedule" required autofocus value="{{ old('schedule', $schedule->schedule) }}">
                @error('schedule')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="method">Metode <span class="text-danger">*</span></label>
                <input type="method" name="method" class="form-control @error('method')is-invalid @enderror" required autofocus value="{{ old('method', $schedule->method) }}">
                @error('method')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
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
    <!-- schedule end -->

@endsection