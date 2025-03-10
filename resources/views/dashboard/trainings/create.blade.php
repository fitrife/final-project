@extends('dashboard.layouts.main')

@section('container')

    <!-- Program Start -->
    <div class="program-section section-padding px-3 py-2 bg-white rounded">
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
                  <a href="/dashboard/trainings" class="text-primary">
                    <i class="fa-regular fa-file-lines"></i
                  ></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  <i class="fa-solid fa-plus me-1"></i> Tambah Program
                </li>
              </ol>
            </nav>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <form
              method="post"
              action="/dashboard/trainings"
              class="mb-5"
              enctype="multipart/form-data"
            >
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Nama Program <span class="text-danger">*</span></label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
              @error('name')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}">
                  @error('slug')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
            </div>
            <div class="mb-3">
              <label for="license" class="form-label"
                >Sertifikasi <span class="text-danger">*</span></label
              >
              <select class="form-select" name="training_categories_id">
                  @foreach ($trainingcategories as $category)
                      <option value="{{ $category->id }}" {{ old('training_categories_id') == $category->id ? 'selected' : null }}>{{ $category->name }}</option>
                  @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="thumbnail" class="form-label"
                >Thumbnail <span class="text-danger">*</span></label
              >
              <img class="thumbnail-preview img-fluid mb-3 col-sm-5">
              <input class="form-control @error('thumbnail') is-invalid @enderror" type="file" id="thumbnail" name="thumbnail" onchange="previewThumbnail()">
                  @error('thumbnail')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
            </div>
            <div class="mb-3">
              <label for="description" class="form-label"
                >Deskripsi <span class="text-danger">*</span></label
              >
              <textarea id="description" type="hidden" name="description">{{ old('description') }}</textarea>
                  @error('description')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
            </div>
            <div class="mb-3">
              <label for="theory" class="form-label"
                >Materi <span class="text-danger">*</span></label
              >
              <textarea id="theory" type="hidden" name="theory">{{ old('theory') }}</textarea>
                  @error('theory')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
            </div>
            <div class="mb-3">
              <label for="certificate" class="form-label"
                >Persyaratan Peserta
                <span class="text-danger">(Sertifikasi Kemnaker & BNSP)</span></label
              >
              <textarea id="participant_requirement" type="hidden" name="participant_requirement">{{ old('participant_requirement') }}</textarea>
                  @error('participant_requirement')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
            </div>
            <div class="mb-3">
              <label for="certificate" class="form-label"
                >Tujuan
                <span class="text-danger">(Training Softskill)</span></label
              >
              <textarea id="goal" type="hidden" name="goal">{{ old('goal') }}</textarea>
                  @error('goal')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
            </div>
            <div class="mb-3">
              <label for="method" class="form-label"
                >Metode Training <span class="text-danger">*</span></label
              >
              <textarea id="method" type="hidden" name="method">{{ old('method') }}</textarea>
                  @error('method')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
            </div>
            <div class="mb-3">
              <label for="facility" class="form-label"
                >Fasilitas <span class="text-danger">*</span></label
              >
              <textarea id="facility" type="hidden" name="facility">{{ old('facility') }}</textarea>
                  @error('facility')
                      <p class="text-danger">{{ $message }}</p>
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
    <!-- program end -->
@endsection

@section('myjsfile')
    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');
    
        name.addEventListener('change', function() {
            fetch('/dashboard/trainings/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
        
        function previewThumbnail() {
            const image = document.querySelector('#thumbnail');
            const imgPreview = document.querySelector('.thumbnail-preview');
    
            imgPreview.style.display = 'block';
    
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
    
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection