@extends('dashboard.layouts.main')

@section('container')

    <!-- staff start -->
    <div class="staff-section section-padding px-3 py-2 bg-white rounded">
        <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-end">
            <a
                href="/dashboard/staff/create"
                type="button"
                class="btn btn-success btn-sm"
                style="margin-bottom: 20px"
            >
                <i class="fa-solid fa-plus me-1"></i> Tambah Staff
            </a>
            </div>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
        @endif
        <div class="col-12 bg-white m-auto">
            <table id="staff" class="table table-striped m-auto" width="100%">
            <thead>
                <tr>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Status</th>
                <th width="16%">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $user) 
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->status == "1")
                            <span class="badge rounded-pill bg-success">Active</span></td>
                        @endif
                        @if($user->status == "0")
                            <span class="badge rounded-pill bg-danger">Disable</span></td>
                        @endif
                    </td>
                    <td class="option-item d-flex">
                        <a
                        href="/dashboard/staff/{{ $user->id }}/edit"
                        class="btn btn-secondary btn-sm m-auto"
                        >
                        <i class="fa-solid fa-pencil me-1"></i> Edit
                        </a>
                        {{-- <a class="btn btn-danger btn-sm m-auto">
                        <i class="fa-solid fa-trash-can me-1"></i> Hapus
                        </a> --}}
                        <form action="/dashboard/staff/{{ $user->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm m-auto" onclick="return confirm('Apa kamu yakin?')"><i class="fa-solid fa-trash-can me-1"></i> Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        </div>
    </div>
    <!-- staff end -->

@endsection

@section('myjsfile')
<script>
  $(document).ready(function () {
        $("#staff").DataTable({
          language: {
            url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json",
            sEmptyTable: "Data Tidak Ditemukan",
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