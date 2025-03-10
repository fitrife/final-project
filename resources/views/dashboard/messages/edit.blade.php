@extends('dashboard.layouts.main')

@section('container')

    <!-- Message Start -->
    <div class="message-section section-padding px-3 py-2 bg-white rounded">
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
                  <a href="/dashboard/messages" class="text-primary">
                    <i class="fa-solid fa-envelope"></i
                  ></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  <i class="fa-solid fa-pencil me-1"></i> Edit Pesan
                </li>
              </ol>
            </nav>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <form method="post" action="/dashboard/messages/{{ $message->slug }}" class="mb-5" enctype="multipart/form-data">
                @method("put")
                @csrf
                <div class="mb-3 disable">
                    <label for="name" class="form-label">Name</label>
                    <input readonly type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $message->name) }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 disable">
                    <label for="slug" class="form-label">Slug</label>
                    <input readonly type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $message->slug) }}">
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 disable">
                    <label for="email" class="form-label">Email</label>
                    <input readonly type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required autofocus value="{{ old('email', $message->email) }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 disable">
                    <label for="phone" class="form-label">No. Telepon (Whatsapp)</label>
                    <input readonly type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" required autofocus value="{{ old('phone', $message->phone) }}">
                    @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 disable">
                    <label for="message" class="form-label">Pesan</label>
                    <input readonly type="text" class="form-control @error('message') is-invalid @enderror" id="message" name="message" required autofocus value="{{ old('message', $message->message) }}">
                    @error('message')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="progress" class="form-label">Status Follow Up</label>
                    <select  id="progress" name="progress" class="form-control @error('progress') is-invalid @enderror" id="progress" name="progress" required  value="{{ old('progress', $message->progress) }}">
                        @foreach ($progress as $progress)
                            <option value="{{ $progress }}" {{ old('progress', $message->progress) == $progress ? 'selected' : null }}>{{ $progress }}</option>
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
    <!-- message end -->

@endsection
