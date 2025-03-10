@extends('dashboard.layouts.main')

@section('container')
<!-- schedule start -->
    <div class="schedule-section section-padding px-3 py-2 bg-white rounded">
        <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-end">
            <a
                href="/dashboard/schedules/create"
                type="button"
                class="btn btn-success btn-sm"
                style="margin-bottom: 20px"
            >
                <i class="fa-solid fa-plus me-1"></i> Tambah Jadwal
            </a>
            </div>
        </div>
        <div class="col-12 bg-white m-auto">
            <table id="schedule" class="table table-striped m-auto" width="100%"
            >
            <thead>
                <tr>
                <th width="5%">No</th>
                <th>Nama Program</th>
                <th>Sertifikasi</th>
                <th>Jadwal</th>
                <th>Metode</th>
                <th width="16%">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $schedule) 
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if ($schedule->training_id == 0)
                            {{ $schedule->name }}
                        @else
                            {{ $schedule->training->name }}
                        @endif
                    </td>
                    <td>{{ $schedule->training_category->name }}</td>
                    <td>{{ $schedule->schedule }}</td>
                    <td>{{ $schedule->method }}</td>
                    <td class="option-item d-flex">
                        <a
                        href="/dashboard/schedules/{{ $schedule->id }}/edit"
                        class="btn btn-secondary btn-sm m-auto"
                        >
                        <i class="fa-solid fa-pencil me-1"></i> Edit
                        </a>
                        <a>
                            <form action="/dashboard/schedules/{{ $schedule->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger btn-sm m-auto" onclick="return confirm('Apa kamu yakin?')"><i class="fa-solid fa-trash-can me-1"></i> Hapus</button>
                            </form>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        </div>
    </div>
    <!-- schedule end -->
@endsection

@section('myjsfile')
<script>
  $(document).ready(function () {
        $("#schedule").DataTable({
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

