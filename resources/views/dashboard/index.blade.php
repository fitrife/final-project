@extends('dashboard.layouts.main')

@section('container')
<!-- dashboard start -->
<div class="dashboard-section section-padding">
    <div class="row">
      <div class="col-lg-8">
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="card info-card programs-card">
              <div class="card-body">
                <h5 class="card-title">Pendaftar Kemnaker RI</h5>
                <div class="d-flex align-items-center">
                  <div
                    class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                  >
                    <i class="fa-solid fa-k"></i>
                  </div>
                  <div
                    class="ps-3 d-flex justify-content-center align-items-center"
                  >
                    <h6 class="mb-0 me-2">{{ $kemnaker }}</h6>
                    <span class="text-muted small">Pendaftar</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card info-card programs-card">
              <div class="card-body">
                <h5 class="card-title">Pendaftar BNSP</h5>
                <div class="d-flex align-items-center">
                  <div
                    class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                  >
                    <i class="fa-solid fa-b"></i>
                  </div>
                  <div
                    class="ps-3 d-flex justify-content-center align-items-center"
                  >
                    <h6 class="mb-0 me-2">{{ $bnsp }}</h6>
                    <span class="text-muted small">Pendaftar</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card info-card programs-card">
              <div class="card-body">
                <h5 class="card-title">Pendaftar Softskill</h5>
                <div class="d-flex align-items-center">
                  <div
                    class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                  >
                    <i class="fa-solid fa-s"></i>
                  </div>
                  <div
                    class="ps-3 d-flex justify-content-center align-items-center"
                  >
                    <h6 class="mb-0 me-2">{{ $softskill }}</h6>
                    <span class="text-muted small">Pendaftar</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 mt-2">
            <div class="card recent-sales overflow-auto">
              <div class="card-body">
                <h5 class="card-title">
                  Pendaftar Inhouse <span>| Terbaru</span>
                </h5>
                <table id="inhouse" class="table table-striped m-auto w-100">
                  <thead>
                    <tr>
                      <th class="text-primary">Nama Pendaftar</th>
                      
                      <th class="text-primary">Perusahaan</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($inhouse as $inhouse)
                    <tr>
                      <td>{{ $inhouse->name }}</td>
                      <td>{{ $inhouse->company }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-12 mt-2">
            <div class="card recent-sales overflow-auto">
              <div class="card-body">
                <h5 class="card-title">
                  Pendaftar Public <span>| Terbaru</span>
                </h5>
                <table id="public" class="table table-striped m-auto w-100">
                  <thead>
                    <tr>
                      <th class="text-primary">Nama Pendaftar</th>
                      
                      <th class="text-primary">Perusahaan</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($public as $public)
                    <tr>
                      <td>{{ $public->name }}</td>
                      
                      <td>{{ $public->company }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="row me-0">
          <div class="card">
            <div class="card-body pb-0">
              <h5 class="card-title">Artikel <span>| Terbaru</span></h5>
              <div class="news">
                @foreach($posts as $post)
                <div class="post-item clearfix mb-2">
                  <img src="{{ asset($post->image) }}" alt="{{ $post->name }}" />
                  <h4>
                    <a href="{{ $post->slug }}">{{ $post->title }}</a>
                  </h4>
                  <p>
                    {!! $post->excerpt !!}
                  </p>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

@section('myjsfile')
<script>
  $(document).ready(function () {
        $("#inhouse").DataTable({
          language: {
            url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json",
            sEmptyTable: "Pendaftar Tidak Ditemukan",
          },
          searching: false,
          paging: false,
          ordering: true,
          info: true,
          scrollX: true,
        });
        $("#public").DataTable({
          language: {
            url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json",
            sEmptyTable: "Pendaftar Tidak Ditemukan",
          },
          searching: false,
          paging: false,
          ordering: true,
          info: true,
          scrollX: true,
        });
  });
</script>
@endsection
