<nav class="navbar navbar-expand-lg custom-navbar-gradient">
  <div class="container-fluid px-4">
    <!-- Logo -->
    <a class="navbar-brand d-flex align-items-center text-dark text-decoration-none" href="/">
      <img src="{{ asset('images/UDN-Logo.png') }}" alt="UDN Logo" class="me-3" style="height: 110px; width: 110px;">
      <span class="fw-bold fs-5 lh-sm">Universitas<br>Doktor Nugroho</span>
    </a>

    <!-- Borgir -->
    <button
      class="navbar-toggler border-0 p-0 bg-transparent shadow-none"
      type="button"
      data-bs-toggle="offcanvas"
      data-bs-target="#mobileMenu"
      aria-controls="mobileMenu"
      aria-expanded="false"
      aria-label="Toggle navigation">
      <div class="mobile-menu-icon">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link text-dark fw-medium px-3 {{ request()->is('/') ? 'active border-bottom border-dark border-2' : '' }}" 
             href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark fw-medium px-3 {{ request()->is('tentang') ? 'active border-bottom border-dark border-2' : '' }}" 
             href="/tentang">Tentang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark fw-medium px-3 {{ request()->is('program') ? 'active border-bottom border-dark border-2' : '' }}" 
             href="/program">Program</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark fw-medium px-3 {{ request()->is('berita*') ? 'active border-bottom border-dark border-2' : '' }}" 
             href="/berita">Berita</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark fw-medium px-3 {{ request()->is('login') ? 'active border-bottom border-dark border-2' : '' }}" 
             href="/login">Login</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark fw-medium px-3 {{ request()->is('kontak') ? 'active border-bottom border-dark border-2' : '' }}"
             href="#"
             role="button"
             data-bs-toggle="dropdown"
             aria-expanded="false">
            Pendaftaran
          </a>
          <ul class="dropdown-menu border-0 shadow-lg dropdown-glassmorphism">
            <li><a class="dropdown-item py-2 px-3" href="#">PMB</a></li>
            <li><a class="dropdown-item py-2 px-3" href="#">Beasiswa</a></li>
            <li><hr class="dropdown-divider" /></li>
            <li><a class="dropdown-item py-2 px-3 {{ request()->is('kontak') ? 'active' : '' }}" href="/kontak">Kontak</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Mobile Offcanvas Menu -->
<div class="offcanvas offcanvas-end mobile-menu-gradient w-60" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
  <div class="offcanvas-header border-bottom border-white border-opacity-25">

    <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body p-0">
    <ul class="list-unstyled mb-0">
      <li>
        <a href="/" class="d-block py-3 px-4 text-dark text-decoration-none border-bottom border-white border-opacity-25 {{ request()->is('/') ? 'bg-white bg-opacity-25 fw-bold' : '' }}">
          Home
        </a>
      </li>
      <li>
        <a href="/tentang" class="d-block py-3 px-4 text-dark text-decoration-none border-bottom border-white border-opacity-25 {{ request()->is('tentang') ? 'bg-white bg-opacity-25 fw-bold' : '' }}">
          Tentang
        </a>
      </li>
      <li>
        <a href="/program" class="d-block py-3 px-4 text-dark text-decoration-none border-bottom border-white border-opacity-25 {{ request()->is('program') ? 'bg-white bg-opacity-25 fw-bold' : '' }}">
          Program
        </a>
      </li>
      <li>
        <a class="d-block py-3 px-4 text-dark text-decoration-none border-bottom border-white border-opacity-25 {{ request()->is('kontak') ? 'bg-white bg-opacity-25 fw-bold' : '' }}" 
           data-bs-toggle="collapse" 
           href="#pendaftaranSubmenu" 
           role="button" 
           aria-expanded="false" 
           aria-controls="pendaftaranSubmenu">
          Pendaftaran
          <i class="bi bi-chevron-down float-end"></i>
        </a>
        <div class="collapse" id="pendaftaranSubmenu">
          <ul class="list-unstyled ps-4 mb-0 mobile-submenu-bg">
            <li><a href="#" class="d-block py-2 px-4 text-dark text-decoration-none border-bottom border-white border-opacity-10">PMB</a></li>
            <li><a href="#" class="d-block py-2 px-4 text-dark text-decoration-none border-bottom border-white border-opacity-10">Beasiswa</a></li>
            <li><a href="/kontak" class="d-block py-2 px-4 text-dark text-decoration-none {{ request()->is('kontak') ? 'fw-bold' : '' }}">Kontak</a></li>
          </ul>
        </div>
      </li>
      <li>
        <a href="/berita" class="d-block py-3 px-4 text-dark text-decoration-none {{ request()->is('berita*') ? 'bg-white bg-opacity-25 fw-bold' : '' }}">
          Berita
        </a>
      </li>
    </ul>
  </div>
</div>

