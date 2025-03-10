@extends('dashboard.layouts.main')

@section('container')

    <!-- article start -->
    <div class="article-section section-padding px-3 py-2 bg-white rounded">
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
                <a href="/dashboard/posts" class="text-primary">
                    <i class="fa-regular fa-newspaper"></i
                ></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                <i class="fa-solid fa-edit me-1"></i> Edit Artikel
                </li>
            </ol>
            </nav>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
            <form
            method="post"
            action="/dashboard/posts/{{ $post->slug }}"
            class="mb-5"
            enctype="multipart/form-data"
            >
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $post->title) }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $post->slug) }}">
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                 @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label"
                >Kategori <span class="text-danger">*</span></label
                >
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : null }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="thumbnail" class="form-label"
                >Thumbnail <span class="text-danger">*</span></label
                >
                <input type="hidden" name="oldImage" value="{{ $post->image }}">
                @if ($post->image)
                    <img src="{{ asset('storage/' .$post->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
            <div class="mb-3">
                <label for="body" class="form-label"
                >Body <span class="text-danger">*</span></label
                >
                <textarea id="body" type="hidden" name="body">{{ old('body', $post->body) }}</textarea>
                @error('body')
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
    <!-- article end -->

@endsection

@section('myjsfile')
<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })

    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
{{-- <script>
    class MyUploadAdapter {
        constructor( loader ) {
            // The file loader instance to use during the upload.
            this.loader = loader;
        }

        // Starts the upload process.
        upload() {
            return this.loader.file
                .then( file => new Promise( ( resolve, reject ) => {
                    this._initRequest();
                    this._initListeners( resolve, reject, file );
                    this._sendRequest( file );
                } ) );
        }

        // Aborts the upload process.
        abort() {
            if ( this.xhr ) {
                this.xhr.abort();
            }
        }

        // Initializes the XMLHttpRequest object using the URL passed to the constructor.
        _initRequest() {
            const xhr = this.xhr = new XMLHttpRequest();

            // Note that your request may look different. It is up to you and your editor
            // integration to choose the right communication channel. This example uses
            // a POST request with JSON as a data structure but your configuration
            // could be different.
            xhr.open( 'POST', '{{ route('ckeditor.upload') }}', true );
            xhr.setRequestHeader('x-csrf-token', '{{ csrf_token() }}');
            xhr.responseType = 'json';
        }

        // Initializes XMLHttpRequest listeners.
        _initListeners( resolve, reject, file ) {
            const xhr = this.xhr;
            const loader = this.loader;
            const genericErrorText = `Couldn't upload file: ${ file.name }.`;

            xhr.addEventListener( 'error', () => reject( genericErrorText ) );
            xhr.addEventListener( 'abort', () => reject() );
            xhr.addEventListener( 'load', () => {
                const response = xhr.response;

                // This example assumes the XHR server's "response" object will come with
                // an "error" which has its own "message" that can be passed to reject()
                // in the upload promise.
                //
                // Your integration may handle upload errors in a different way so make sure
                // it is done properly. The reject() function must be called when the upload fails.
                if ( !response || response.error ) {
                    return reject( response && response.error ? response.error.message : genericErrorText );
                }

                // If the upload is successful, resolve the upload promise with an object containing
                // at least the "default" URL, pointing to the image on the server.
                // This URL will be used to display the image in the content. Learn more in the
                // UploadAdapter#upload documentation.
                resolve( {
                    default: response.url
                } );
            } );

            // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
            // properties which are used e.g. to display the upload progress bar in the editor
            // user interface.
            if ( xhr.upload ) {
                xhr.upload.addEventListener( 'progress', evt => {
                    if ( evt.lengthComputable ) {
                        loader.uploadTotal = evt.total;
                        loader.uploaded = evt.loaded;
                    }
                } );
            }
        }

        // Prepares the data and sends the request.
        _sendRequest( file ) {
            // Prepare the form data.
            const data = new FormData();

            data.append( 'upload', file );

            // Important note: This is the right place to implement security mechanisms
            // like authentication and CSRF protection. For instance, you can use
            // XMLHttpRequest.setRequestHeader() to set the request headers containing
            // the CSRF token generated earlier by your application.

            // Send the request.
            this.xhr.send( data );
        }
    }

    function uploadPlugin( editor ) {
        editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
            // Configure the URL to the upload script in your back-end here!
            return new MyUploadAdapter( loader );
        };
    }

    ClassicEditor
        .create( document.querySelector( '#bodyEdit' ), {
            extraPlugins: [ uploadPlugin ],

            // More configuration options.
            // ...
        } )
        .catch( error => {
            console.log( error );
        } );
</script> --}}
<@endsection