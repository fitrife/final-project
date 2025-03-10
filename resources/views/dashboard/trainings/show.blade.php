@extends('dashboard.layouts.main')

@section('container')

<!-- Program Start -->
<div class="program-section section-padding px-3 py-2 bg-white rounded">
    <div class="row">
      <div class="col-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/dashboard" class="text-primary"
                ><i class="fa-solid fa-house-user"></i
              ></a>
            </li>
            <li class="breadcrumb-item">
              <a href="/dashboard/trainings" class="text-primary">
                <i class="fa-regular fa-file-lines"></i
              ></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              <i class="fa-solid fa-eye me-1"></i> Lihat Program
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="row">
      <section class="program-desc section-padding">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h2 class="column-title mrt-0">
                {{ $training->name }}
              </h2>
              <p>
                {!! $training->description !!}
              </p>
            </div>
            <div class="col-md-6">
                @if ($training->thumbnail)
                    <img loading="lazy" src="{{ asset($training->thumbnail) }}" class="img-fluid"
                    alt="{{ $training->thumbnail }}">
                @endif
            </div>
          </div>
        </div>
      </section>

      <section class="curriculum">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h3 class="column-title-small">Materi Pelatihan</h3>
              {!! $training->theory !!}
            </div>

            <div class="col-md-6 mt-5 mt-md-0">
              <h3 class="column-title-small">Info Lebih Lanjut</h3>

              <div
                class="accordion accordion-group accordion-classic"
                id="requirementAccordion"
              >
                
                @if($training->training_categories_id == '3')
                <div class="card">
                  <div
                    class="card-header p-0 bg-transparent"
                    id="headingOne"
                  >
                    <h2 class="mb-0">
                      <button
                        class="btn btn-block text-start collapsed w-100 rounded-0"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseOne"
                        aria-expanded="true"
                        aria-controls="collapseOne"
                      >
                        Tujuan Training
                      </button>
                    </h2>
                  </div>

                  <div
                    id="collapseOne"
                    class="collapse show"
                    aria-labelledby="headingOne"
                    data-parent="#construction-accordion"
                    style=""
                  >
                    <div class="card-body">
                      {!! $training->goal !!}
                    </div>
                  </div>
                </div>
                @else
                <div class="card">
                  <div
                    class="card-header p-0 bg-transparent"
                    id="headingRequirement"
                  >
                    <h2 class="mb-0">
                      <button
                        class="btn btn-block text-start collapsed w-100 rounded-0"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseRequirement"
                        aria-expanded="true"
                        aria-controls="collapseRequirement"
                      >
                        Persyaratan Peserta
                      </button>
                    </h2>
                  </div>

                  <div
                    id="collapseRequirement"
                    class="collapse show"
                    aria-labelledby="headingRequirement"
                    data-parent="#requirementAccordion"
                    style=""
                  >
                    <div class="card-body">
                      {!! $training->participant_requirement !!}
                    </div>
                  </div>
                </div>
                @endif
                <div class="card">
                  <div
                    class="card-header p-0 bg-transparent"
                    id="headingTwo"
                  >
                    <h2 class="mb-0">
                      <button
                        class="btn btn-block text-start w-100 rounded-0"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo"
                        aria-expanded="false"
                        aria-controls="collapseTwo"
                      >
                        Metode
                      </button>
                    </h2>
                  </div>
                  <div
                    id="collapseTwo"
                    class="collapse"
                    aria-labelledby="headingTwo"
                    data-parent="#construction-accordion"
                  >
                    <div class="card-body">
                      {!! $training->method !!}
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div
                    class="card-header p-0 bg-transparent"
                    id="headingThree"
                  >
                    <h2 class="mb-0">
                      <button
                        class="btn btn-block text-start w-100 rounded-0 collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseThree"
                        aria-expanded="false"
                        aria-controls="collapseThree"
                      >
                        Fasilitas
                      </button>
                    </h2>
                  </div>
                  <div
                    id="collapseThree"
                    class="collapse"
                    aria-labelledby="headingThree"
                    data-parent="#construction-accordion"
                    style=""
                  >
                    <div class="card-body">
                      {!! $training->facility !!}
                    </div>
                  </div>
                </div>
              </div>
              <!--/ Accordion end -->
            </div>
          </div>
        </div>
      </section>
    </div>
</div>
<!-- program end -->

@endsection
