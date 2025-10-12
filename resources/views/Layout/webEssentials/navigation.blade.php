<nav class="navbar navbar-expand-lg navbar-gradient">
  <div class="container-fluid px-4">
    <!-- Logo and Brand -->
    <a class="navbar-brand d-flex align-items-center text-dark text-decoration-none" href="/">
      <img src="{{ asset('images/UDN-Logo.webp') }}" alt="UDN Logo" class="me-3" style="height: 50px; width: 50px;">
      <span class="fw-bold fs-5 lh-sm">Universitas<br>Doktor Nugroho</span>
    </a>

    <!-- Mobile Menu Toggle -->
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

    <!-- Desktop Menu -->
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
    <div class="d-flex align-items-center">
      <img src="{{ asset('images/UDN-Logo.webp') }}" alt="UDN Logo" class="me-2" style="height: 40px; width: 40px;">
      <h6 class="offcanvas-title text-dark fw-bold mb-0 lh-sm" id="mobileMenuLabel">Universitas<br>Doktor Nugroho</h6>
    </div>
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

