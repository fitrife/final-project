@extends('dashboard.layouts.main')

@section('container')

    <!-- softskill start -->
    <div class="softskill-section section-padding px-3 py-2 bg-white rounded">
        <div class="row">
          <div class="col-12 bg-white m-auto">
            <table
              id="softskill"
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
                @foreach($softskills as $softskill)
                <tr>
                  <td>{{ $softskill->created_at }}</td>
                  <td>{{ $softskill->name }}</td>
                  <td>{{ $softskill->ad->name }}</td>
                  <td>{{ $softskill->company }}</td>
                  <td>{{ $softskill->company_email }}</td>
                  <td>{{ $softskill->telephone }}</td>
                  <td>
                    @if($softskill->progress == "Sudah")
                        <span class="badge rounded-pill bg-success">{{ $softskill->progress }}</span></td>
                    @endif
                    @if($softskill->progress == "Belum")
                        <span class="badge rounded-pill bg-danger">{{ $softskill->progress }}</span></td>
                    @endif
                  </td>
                  <td class="option-item d-flex">
                    <a
                      href="/dashboard/adssoftskill/{{ $softskill->slugSoftskill }}"
                      class="btn btn-warning btn-sm m-auto"
                    >
                      <i class="fa-solid fa-eye me-1"></i>Lihat
                    </a>
                    <a
                      href="/dashboard/adssoftskill/{{ $softskill->slugSoftskill }}/edit"
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
        $("#softskill").DataTable({
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