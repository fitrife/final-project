@extends('dashboard.layouts.main')

@section('container')
<!-- program start -->
    <div class="program-section section-padding px-3 py-2 bg-white rounded">
        <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-end">
            <a
                href="/dashboard/advertisement/create"
                type="button"
                class="btn btn-success btn-sm"
                style="margin-bottom: 20px"
            >
                <i class="fa-solid fa-plus me-1"></i> Tambah Program
            </a>
            </div>
        </div>
        <div class="col-12 bg-white m-auto">
            <table
            id="iklan"
            class="table table-striped m-auto"
            width="100%"
            >
            <thead>
                <tr>
                <th width="5%">No</th>
                <th>Nama Program</th>
                <th width="25%">Thumbnail</th>
                <th width="23%">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ads as $ads) 
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $ads->name }}</td>
                    <td>
                        @if ($ads->thumbnail)
                            <img loading="lazy" src="{{ asset('storage/' .$ads->thumbnail) }}" class="img-fluid w-25"
                            alt="{{ $ads->thumbnail }}">
                        @endif
                    </td>
                    <td class="option-item d-flex">
                        <a
                        href="/dashboard/advertisement/{{ $ads->slug }}"
                        class="btn btn-warning btn-sm m-auto"
                        >
                        <i class="fa-solid fa-eye me-1"></i>Lihat
                        </a>
                        <a
                        href="/dashboard/advertisement/{{ $ads->slug }}/edit"
                        class="btn btn-secondary btn-sm m-auto"
                        >
                        <i class="fa-solid fa-pencil me-1"></i> Edit
                        </a>
                        <a>
                            <form action="/dashboard/advertisement/{{ $ads->slug }}" method="post" class="d-inline">
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
    <!-- program end -->
@endsection

@section('myjsfile')
<script>
  $(document).ready(function () {
        $("#iklan").DataTable({
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