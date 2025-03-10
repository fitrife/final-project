<!-- Sidebar Start -->
<div class="sidebar position-fixed top-0 bottom-0 bg-white border-end">
    <div class="d-flex align-items-center p-3">
      <a href="/dashboard" class="sidebar-logo {{ Request::is('dashboard*') ? 'active' : '' }}">
        <img src="{{ asset('img/logo.webp') }}" alt="Pusat Pelatihan K3" />
      </a>
      <i
        class="sidebar-toggle fa-regular fa-circle-left ms-auto fs-5 d-none d-md-block"
      ></i>
    </div>
    <ul class="sidebar-menu p-3 m-0 mb-0">
      <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Form</li>
      <li class="sidebar-menu-item {{ Request::is('dashboard/messages*') ? 'active' : '' }}">
        <a href="/dashboard/messages">
          <i class="fa-solid fa-envelope sidebar-menu-item-icon"></i>
          Pesan</a
        >
      </li>
      <!-- <li class="sidebar-menu-divider mt-3 text-uppercase">Custom</li> -->
      <li class="sidebar-menu-item  {{ Request::is('dashboard/inhouse*') ? 'active' : '' }}">
        <a href="/dashboard/inhouse">
          <i class="fa-solid fa-user-tie sidebar-menu-item-icon"></i> Inhouse
        </a>
      </li>
      <li class="sidebar-menu-item {{ Request::is('dashboard/public*') ? 'active' : '' }}">
        <a href="/dashboard/public">
          <i class="fa-solid fa-people-group sidebar-menu-item-icon"></i>
          Public
        </a>
      </li>
      <li class="sidebar-menu-item {{ Request::is('dashboard/kemnaker*') ? 'active' : '' }}">
        <a href="/dashboard/kemnaker">
          <i class="fa-solid fa-k sidebar-menu-item-icon"></i> Kemnaker
        </a>
      </li>
      <li class="sidebar-menu-item {{ Request::is('dashboard/bnsp*') ? 'active' : '' }}">
        <a href="/dashboard/bnsp">
          <i class="fa-solid fa-b sidebar-menu-item-icon"></i> BNSP
        </a>
      </li>
      <li class="sidebar-menu-item {{ Request::is('dashboard/softskill*') ? 'active' : '' }}">
        <a href="/dashboard/softskill">
          <i class="fa-solid fa-s sidebar-menu-item-icon"></i> Softskill
        </a>
      </li>
      @can('admin')
      <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Pelatihan</li>
      <li class="sidebar-menu-item {{ Request::is('dashboard/trainings*') ? 'active' : '' }}">
        <a href="/dashboard/trainings">
          <i class="fa-regular fa-file-lines sidebar-menu-item-icon"></i>
          Program
        </a>
      </li>
      <li class="sidebar-menu-item d-none">
        <a href="#">
          <i class="fa-solid fa-rupiah-sign sidebar-menu-item-icon"></i>
          Biaya
        </a>
      </li>
      <li class="sidebar-menu-item {{ Request::is('dashboard/schedules*') ? 'active' : '' }}">
        <a href="/dashboard/schedules">
          <i class="fa-solid fa-calendar-days sidebar-menu-item-icon"></i>
          Jadwal
        </a>
      </li>

      <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Blog</li>
      <li class="sidebar-menu-item {{ Request::is('dashboard/categories*') ? 'active' : '' }}">
        <a href="/dashboard/categories">
          <i class="fa-solid fa-rectangle-list sidebar-menu-item-icon"></i>
          Kategori
        </a>
      </li>
      <li class="sidebar-menu-item {{  Request::is('dashboard/posts*') ? 'active' : ''  }}">
        <a href="/dashboard/posts">
          <i class="fa-regular fa-newspaper sidebar-menu-item-icon"></i>
          Artikel
        </a>
      </li>
      @endcan

    </ul>
  </div>
  <div class="sidebar-overlay"></div>
  <!-- Sidebar End -->
