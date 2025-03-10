@extends('layouts.main')
@section('container')
    <!-- Banner start -->
    <div
      id="banner-page"
      class="banner-page"
      style="background-image: url(img/banner-schedule.jpg)"
    >
      <div class="page-title">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 inner">
              <div class="page-heading">
                <h1 class="page-title">Jadwal Pelatihan & Pembinaan</h1>
              </div>
            </div>
            <!-- Col end -->
          </div>
          <!-- Row end -->
        </div>
        <!-- Container end -->
      </div>
      <!-- Banner text end -->
    </div>
    <!-- Banner end -->

    <!-- Schedule Start -->
    <div class="schedule section-padding">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <ul
              class="nav nav-tabs d-flex justify-content-center"
              id="scheduleTab"
              role="tablist"
            >
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link active"
                  id="kemnaker-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#kemnaker-tab-pane"
                  type="button"
                  role="tab"
                  aria-controls="kemnaker-tab-pane"
                  aria-selected="true"
                >
                  Sertifikasi Kemnaker RI
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="bnsp-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#bnsp-tab-pane"
                  type="button"
                  role="tab"
                  aria-controls="bnsp-tab-pane"
                  aria-selected="false"
                >
                  Sertifikasi BNSP
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="softskill-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#softskill-tab-pane"
                  type="button"
                  role="tab"
                  aria-controls="softskill-tab-pane"
                  aria-selected="false"
                >
                  Softskill
                </button>
              </li>
            </ul>
            <div class="tab-content" id="scheduleTabContent">
              <div
                class="tab-pane fade show active"
                id="kemnaker-tab-pane"
                role="tabpanel"
                aria-labelledby="kemnaker-tab"
                tabindex="0"
              >
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">Pelatihan</th>
                      <th scope="col">Sertifikasi</th>
                      <th scope="col">Jadwal</th>
                      <th scope="col">Metode</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($kemnaker as $kemnaker) 
                    <tr>
                        <td>
                          @if ($kemnaker->training_id == 0)
                            {{ $kemnaker->name }}
                          @else
                              {{ $kemnaker->training->name }}
                          @endif
                        </td>
                        <td>{{ $kemnaker->training_category->name }}</td>
                        <td>{{ $kemnaker->schedule }}</td>
                        <td>{{ $kemnaker->method }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div
                class="tab-pane fade"
                id="bnsp-tab-pane"
                role="tabpanel"
                aria-labelledby="bnsp-tab"
                tabindex="0"
              >
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">Pelatihan</th>
                      <th scope="col">Sertifikasi</th>
                      <th scope="col">Jadwal</th>
                      <th scope="col">Metode</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($bnsp as $bnsp) 
                    <tr>
                        <td>
                          @if ($bnsp->training_id == 0)
                            {{ $bnsp->name }}
                          @else
                              {{ $bnsp->training->name }}
                          @endif
                        </td>
                        <td>{{ $bnsp->training_category->name }}</td>
                        <td>{{ $bnsp->schedule }}</td>
                        <td>{{ $bnsp->method }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div
                class="tab-pane fade"
                id="softskill-tab-pane"
                role="tabpanel"
                aria-labelledby="softskill-tab"
                tabindex="0"
              >
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">Pelatihan</th>
                      <th scope="col">Sertifikasi</th>
                      <th scope="col">Jadwal</th>
                      <th scope="col">Metode</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($softskill as $softskill) 
                    <tr>
                        <td>
                          @if ($softskill->training_id == 0)
                            {{ $softskill->name }}
                          @else
                              {{ $softskill->training->name }}
                          @endif
                        </td>
                        <td>{{ $softskill->training_category->name }}</td>
                        <td>{{ $softskill->schedule }}</td>
                        <td>{{ $softskill->method }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Schedule End -->
@endsection