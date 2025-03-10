@extends('dashboard.layouts.main')

@section('container')

    <!-- message start -->
    <div class="message-section section-padding px-3 py-2 bg-white rounded">
        <div class="row">
        <div class="col-12 bg-white m-auto">
            <table
            id="message"
            class="table table-striped m-auto"
            width="100%"
            >
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Pesan</th>
                    <th>Status Follow Up</th>
                    <th width="15%">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message) 
                <tr>
                    <td>{{ $message->created_at }}</td>
                    <td>{{ $message->name }}</td>
                    <td>{{ $message->email }}</td>
                    <td>
                        {{ $message->excerpt }}
                    </td>
                    <td>
                        @if($message->progress == "Sudah")
                        <span class="badge rounded-pill bg-success">{{ $message->progress }}</span></td>
                        @endif
                        @if($message->progress == "Belum")
                        <span class="badge rounded-pill bg-danger">{{ $message->progress }}</span></td>
                        @endif
                    </td>
                    <td class="option-item d-flex">
                        <a
                        href="/dashboard/messages/{{ $message->slug }}"
                        class="btn btn-warning btn-sm m-auto"
                        >
                        <i class="fa-solid fa-eye me-1"></i>Lihat
                        </a>
                        <a
                        href="/dashboard/messages/{{ $message->slug }}/edit"
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
    <!-- message end -->

@endsection

@section('myjsfile')
<script>
  $(document).ready(function () {
        $("#message").DataTable({
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