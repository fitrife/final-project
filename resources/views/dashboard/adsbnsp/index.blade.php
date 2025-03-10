@extends('dashboard.layouts.main')

@section('container')

    <!-- bnsp start -->
    <div class="bnsp-section section-padding px-3 py-2 bg-white rounded">
        <div class="row">
          <div class="col-12 bg-white m-auto">
            <table
              id="bnsp"
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
                @foreach($bnsp as $bnsp)
                <tr>
                  <td>{{ $bnsp->created_at }}</td>
                  <td>{{ $bnsp->name }}</td>
                  <td>{{ $bnsp->ad->name }}</td>
                  <td>{{ $bnsp->email }}</td>
                  <td>{{ $bnsp->phone }}</td>
                  <td>
                    @if($bnsp->progress == "Sudah")
                        <span class="badge rounded-pill bg-success">{{ $bnsp->progress }}</span></td>
                    @endif
                    @if($bnsp->progress == "Belum")
                        <span class="badge rounded-pill bg-danger">{{ $bnsp->progress }}</span></td>
                    @endif
                  </td>
                  <td class="option-item d-flex">
                    <a
                      href="/dashboard/adsbnsp/{{ $bnsp->slugBnsp }}"
                      class="btn btn-warning btn-sm m-auto"
                    >
                      <i class="fa-solid fa-eye me-1"></i>Lihat
                    </a>
                    <a
                      href="/dashboard/adsbnsp/{{ $bnsp->slugBnsp }}/edit"
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
      <!-- bnsp end -->

@endsection

@section('myjsfile')
<script>
  $(document).ready(function () {
        $("#bnsp").DataTable({
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