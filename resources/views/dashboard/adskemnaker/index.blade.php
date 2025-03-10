@extends('dashboard.layouts.main')

@section('container')

    <!-- kemnaker start -->
    <div class="kemnaker-section section-padding px-3 py-2 bg-white rounded">
        <div class="row">
          <div class="col-12 bg-white m-auto">
            <table
              id="kemnaker"
              class="table table-striped m-auto"
              width="100%"
            >
              <thead>
                <tr>
                  <th>Tanggal</th>
                  <th>Nama</th>
                  <th>Program</th>
                  <th>Email</th>
                  <th>No.Telp</th>
                  <th>Status Follow Up</th>
                  <th width="14%" class="h-100 overflow-hidden">Opsi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($kemnaker as $kemnaker)
                <tr>
                  <td>{{ $kemnaker->created_at }}</td>
                  <td>{{ $kemnaker->name }}</td>
                  <td>{{ $kemnaker->ad?->name  }}</td>
                  <td>{{ $kemnaker->email }}</td>
                  <td>{{ $kemnaker->phone }}</td>
                  <td>
                    @if($kemnaker->progress == "Sudah")
                        <span class="badge rounded-pill bg-success">{{ $kemnaker->progress }}</span></td>
                    @endif
                    @if($kemnaker->progress == "Belum")
                        <span class="badge rounded-pill bg-danger">{{ $kemnaker->progress }}</span></td>
                    @endif
                  </td>
                  <td class="option-item d-flex">
                    <a
                      href="/dashboard/adskemnaker/{{ $kemnaker->slugKemnaker }}"
                      class="btn btn-warning btn-sm m-auto"
                    >
                      <i class="fa-solid fa-eye me-1"></i>Lihat
                    </a>
                    <a
                      href="/dashboard/adskemnaker/{{ $kemnaker->slugKemnaker }}/edit"
                      class="btn btn-secondary btn-sm m-auto"
                    >
                      <i class="fa-solid fa-pencil me-1"></i> Edit
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- kemnaker end -->

@endsection

@section('myjsfile')
<script>
  $(document).ready(function () {
        $("#kemnaker").DataTable({
          language: {
            url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json",
            sEmptyTable: "Pendaftar Tidak Ditemukan",
          },
          searching: true,
          paging: true,
          ordering: false,
          info: true,
          scrollX: true,
        });
  });
</script>
@endsection