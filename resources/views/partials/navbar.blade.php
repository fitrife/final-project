<!-- Header start -->
<header id="header" class="header">
    <div class="site-navigation">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg navbar-light p-md-3 p-2">
              <div class="logo">
                <a class="d-block" href="/">
                  <img
                    loading="lazy"
                    src="{{ asset('img/logo.png') }}"
                    alt="Pusat Pelatihan K3"
                  />
                </a>
              </div>
              <!-- logo end -->

              <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target=".navbar-collapse"
                aria-controls="navbar-collapse"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>

              <div id="navbar-collapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav ms-auto align-items-center">
                  <li class="nav-item dropdown active">
                    <a href="/" class="nav-link">Beranda </a>
                  </li>

                  <li class="nav-item dropdown">
                    <a
                      href="#"
                      class="nav-link dropdown-toggle"
                      data-bs-toggle="dropdown"
                      >Jenis Pelatihan <i class="fa fa-angle-down"></i
                    ></a>
                    <ul class="dropdown-menu" role="menu">
                      <li>
                        <a class="nav-link {{ ($active === "sertfikasi-kemnaker-ri") ? 'active' : '' }}" href="/sertifikasi-kemnaker-ri"
                          >Sertifikasi Kemnaker RI</a
                        >
                      </li>
                      <li>
                        <a class="nav-link {{ ($active === "sertfikasi-bnsp") ? 'active' : '' }}" href="/sertifikasi-bnsp">Sertifikasi BNSP</a>
                      </li>
                      <li>
                        <a class="nav-link {{ ($active === "softskill") ? 'active' : '' }}" href="/softskill">Softskill</a>
                      </li>
                    </ul>
                  </li>

                  <li class="nav-item dropdown">
                    <a href="/jadwal" class="nav-link {{ ($active === "jadwal") ? 'active' : '' }}"
                      >Jadwal Pelatihan
                    </a>
                  </li>

                  <li class="nav-item dropdown">
                    <a
                      href="#"
                      class="nav-link dropdown-toggle"
                      data-bs-toggle="dropdown"
                      >Pendaftaran <i class="fa fa-angle-down"></i
                    ></a>
                    <ul class="dropdown-menu" role="menu">
                      <li>
                        <a href="/public-training">Public Training</a>
                      </li>
                      <li>
                        <a href="/inhouse-training">Inhouse Training</a>
                      </li>
                    </ul>
                  </li>

                  <li class="nav-item dropdown">
                    <a href="/blog" class="nav-link {{ ($active === "blog") ? 'active' : '' }}">Artikel</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link {{ ($active === "kontak-kami") ? 'active' : '' }}" href="/kontak-kami">Kontak</a>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
          <!--/ Col end -->
        </div>
        <!--/ Row end -->
      </div>
      <!--/ Container end -->
    </div>
    <!--/ Navigation end -->
  </header>
  <!-- Header end -->