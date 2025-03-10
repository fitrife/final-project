@extends('dashboard.layouts.main')

@section('container')

    <!-- registrant start -->
    <div class="registrant-section section-padding px-3 py-2 bg-white rounded">
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
                  <th>Email</th>
                  <th>No.Telp</th>
                  <th>Status Follow Up</th>
                  <th width="15%" class="h-100 overflow-hidden">Opsi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($registrants as $registrant)
                <tr>
                  <td>{{ $registrant->created_at }}</td>
                  <td>{{ $registrant->name }}</td>
                  <td>{{ $registrant->training->name }}</td>
                  <td>{{ $registrant->email }}</td>
                  <td>{{ $registrant->phone }}</td>
                  <td>
                    @if($registrant->progress == "Sudah")
                        <span class="badge rounded-pill bg-success">{{ $registrant->progress }}</span></td>
                    @endif
                    @if($registrant->progress == "Belum")
                        <span class="badge rounded-pill bg-danger">{{ $registrant->progress }}</span></td>
                    @endif
                  </td>
                  <td class="option-item d-flex">
                    <a
                      href="/dashboard/registrant/{{ $registrant->slug }}"
                      class="btn btn-warning btn-sm m-auto"
                    >
                      <i class="fa-solid fa-eye me-1"></i>Lihat
                    </a>
                    <a
                      href="/dashboard/registrant/{{ $registrant->slug }}/edit"
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