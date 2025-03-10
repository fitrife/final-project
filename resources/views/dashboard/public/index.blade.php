@extends('dashboard.layouts.main')

@section('container')

    <!-- public start -->
    <div class="public-section section-padding px-3 py-2 bg-white rounded">
        <div class="row">
          <div class="col-12 bg-white m-auto">
            <table
              id="public"
              class="table table-striped m-auto"
              width="100%"
            >
              <thead>
                <tr>
                  <th>Tanggal</th>
                  <th>Nama</th>
                  <th>Program</th>
                  <th>Perusahaan</th>
                  <th>Email Kantor</th>
                  <th>No.Telp Kantor</th>
                  <th>Status Follow Up</th>
                  <th width="15%" class="h-100 overflow-hidden">Opsi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($public as $public)
                <tr>
                  <td>{{ $public->created_at }}</td>
                  <td>{{ $public->name }}</td>
                  <td>{{ $public->program }}</td>
                  <td>{{ $public->company }}</td>
                  <td>{{ $public->company_email }}</td>
                  <td>{{ $public->company_phone }}</td>
                  <td>
                    @if($public->progress == "Sudah")
                        <span class="badge rounded-pill bg-success">{{ $public->progress }}</span></td>
                    @endif
                    @if($public->progress == "Belum")
                        <span class="badge rounded-pill bg-danger">{{ $public->progress }}</span></td>
                    @endif
                  </td>
                  <td class="option-item d-flex">
                    <a
                      href="/dashboard/public/{{ $public->slug }}"
                      class="btn btn-warning btn-sm m-auto"
                    >
                      <i class="fa-solid fa-eye me-1"></i>Lihat
                    </a>
                    <a
                      href="/dashboard/public/{{ $public->slug }}/edit"
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
      <!-- public end -->

@endsection

@section('myjsfile')
<script>
  $(document).ready(function () {
        $("#public").DataTable({
          language: {
            url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json",
            sEmptyTable: "Pendaftar Tidak Ditemukan",
          },
          searching: true,
          paging: true,
          ordering: true,
          info: true,
          scrollX: true,
        });
  });
</script>
@endsection