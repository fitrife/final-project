<!-- navbar start -->
<nav class="px-3 py-2 bg-white rounded shadow">
    <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
    <h5 class="fw-bold mb-0 me-auto">{{ $title }}</h5>
    <div class="dropdown">
      <div
        class="d-flex align-items-center cursor-pointer dropdown-toggle"
        data-bs-toggle="dropdown"
        aria-expanded="false"
      >
        <span class="me-2 d-none d-sm-block">{{ auth()->user()->name }}</span>
        <img
          class="navbar-profile-image"
          src="{{ asset('img/logo.webp') }}"
          alt="user-img"
        />
      </div>
      <ul class="dropdown-menu">
        <li>
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item">
                    Keluar 
                </button>
            </form>
      </ul>
    </div>
  </nav>
  <!-- navbar end -->