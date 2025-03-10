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
                    <th width="5%">No</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Pesan</th>
                    <th>Status Follow Up</th>
                    <th width="24%">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message) 
                <tr>
                    <td>1</td>
                    <td>{{ $message->created_at }}</td>
                    <td>{{ $message->name }}</td>
                    <td>{{ $message->email }}</td>
                    <td>
                        {{ $message->excerpt }}
                    </td>
                    <td>
                        <span class="badge rounded-pill bg-success">Sudah</span>
                    </td>
                    <td class="option-item d-flex">
                        <a
                        href="/dashboard/pesan/{{ $message->slug }}"
                        class="btn btn-warning btn-sm m-auto"
                        >
                        <i class="fa-solid fa-eye me-1"></i>Lihat
                        </a>
                        <a
                        href="/dashboard/pesan/{{ $message->slug }}/edit"
                        class="btn btn-secondary btn-sm m-auto"
                        >
                        <i class="fa-solid fa-pencil me-1"></i> Edit
                        </a>
                        <a class="btn btn-danger btn-sm m-auto">
                        <i class="fa-solid fa-trash-can me-1"></i> Hapus
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