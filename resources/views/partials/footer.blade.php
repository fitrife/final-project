<!-- Footer Start -->
<footer id="footer" class="footer bg-primary text-white">
    <div class="footer-top">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-4 col-md-6 footer-widget footer-about">
            <h3 class="widget-title">Tentang Kami</h3>
            <img
              loading="lazy"
              class="footer-logo mb-2"
              src="{{ asset('img/logo.png') }}"
              alt="Pusat Pelatihan K3"
            />
            <p>
              Penyedia pelatihan dan sertifikasi K3 yang berlisensi resmi dari KEMNAKER RI dan BNSP
            </p>
          </div>
          <!-- Col end -->

          <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
            <h3 class="widget-title">Jam Kerja</h3>
            <div class="working-hours">
              {{-- We work 7 days a week, every day excluding major holidays.
              Contact us if you have an emergency, with our Hotline and
              Contact form.
              <br /><br /> --}}
              Senin - Jumat: <span class="text-right">08:00 - 16:30 </span>
              <br />
              Sabtu dan Minggu: <span class="text-right">Tutup</span> <br />
            </div>
          </div>
          <!-- Col end -->

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
            <h3 class="widget-title">Pelatihan dan Pembinaan</h3>
            <ul class="list-unstyled">
              <li class="text-decoration-none">
                <a href="/sertifikasi-kemnaker-ri"
                  ><i class="fa-solid fa-caret-right me-2"></i>Sertifikasi
                  Kemnaker RI</a
                >
              </li>
              <li class="text-decoration-none">
                <a href="/sertifikasi-bnsp"
                  ><i class="fa-solid fa-caret-right me-2"></i>Sertifikasi
                  BNSP</a
                >
              </li>
              <li class="text-decoration-none">
                <a href="/softskill"
                  ><i class="fa-solid fa-caret-right me-2"></i>Softskill</a
                >
              </li>
            </ul>
          </div>
          <!-- Col end -->
        </div>
        <!-- Row end -->
      </div>
      <!-- Container end -->
    </div>
    <!-- Footer main end -->

    <div class="footer-bottom bg-dark text-white">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-12">
            <div class="copyright-info text-center">
              <span id="copyright"></span>
              <span
                >Copyright &copy;
                <script>
                  document.write(new Date().getFullYear());
                </script>
                <a
                  href="https://pusatpelatihank3.co.id"
                  class="text-decoration-none text-white"
                  >Pusat Pelatihan K3</a
                ></span
              >
            </div>
          </div>
        </div>
        <!-- Row end -->
      </div>
      <!-- Container end -->
    </div>
    <!-- Copyright end -->
  </footer>
  <!-- Footer End -->