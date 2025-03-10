@extends('dashboard.layouts.main')

@section('container')

    <!-- inhouse start -->
    <div class="inhouse-section section-padding px-3 py-2 bg-white rounded">
        <div class="row">
          <div class="col-12 bg-white m-auto">
            <table
              id="inhouse"
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
                @foreach($inhouse as $inhouse)
                <tr>
                  <td>{{ $inhouse->created_at }}</td>
                  <td>{{ $inhouse->name }}</td>
                  <td>{{ $inhouse->program }}</td>
                  <td>{{ $inhouse->company }}</td>
                  <td>{{ $inhouse->company_email }}</td>
                  <td>{{ $inhouse->company_phone }}</td>
                  <td>
                    @if($inhouse->progress == "Sudah")
                        <span class="badge rounded-pill bg-success">{{ $inhouse->progress }}</span></td>
                    @endif
                    @if($inhouse->progress == "Belum")
                        <span class="badge rounded-pill bg-danger">{{ $inhouse->progress }}</span></td>
                    @endif
                  </td>
                  <td class="option-item d-flex">
                    <a
                      href="/dashboard/inhouse/{{ $inhouse->slug }}"
                      class="btn btn-warning btn-sm m-auto"
                    >
                      <i class="fa-solid fa-eye me-1"></i>Lihat
                    </a>
                    <a
                      href="/dashboard/inhouse/{{ $inhouse->slug }}/edit"
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
      <!-- inhouse end -->

@endsection

@section('myjsfile')
<script>
  $(document).ready(function () {
        $("#inhouse").DataTable({
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