<nav class="navbar navbar-expand-lg" style="background: linear-gradient(135deg, #B8E6E1 0%, #87CEEB 50%, #5DADE2 100%); box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
  <div class="container-fluid px-4">
    <!-- Logo and Brand -->
    <a class="navbar-brand d-flex align-items-center text-dark text-decoration-none" href="/">
      <img src="{{ asset('images/UDN-Logo.webp') }}" alt="UDN Logo" style="height: 50px; width: 50px; margin-right: 12px;">
      <span class="fw-bold fs-5">Universitas<br>Doktor Nugroho</span>
    </a>

    <!-- Mobile Menu Toggle -->
    <button
      class="navbar-toggler border-0 p-0"
      type="button"
      data-bs-toggle="offcanvas"
      data-bs-target="#mobileMenu"
      aria-controls="mobileMenu"
      aria-expanded="false"
      aria-label="Toggle navigation"
      style="background: none; box-shadow: none;">
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
            <i class="bi bi-chevron-down ms-1"></i>
          </a>
          <ul class="dropdown-menu border-0 shadow-lg" style="background: rgba(255,255,255,0.95); backdrop-filter: blur(10px);">
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
<div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel" style="background: linear-gradient(135deg, #B8E6E1 0%, #87CEEB 50%, #5DADE2 100%); width: 60%;">
  <div class="offcanvas-header border-bottom border-white border-opacity-25">
    <div class="d-flex align-items-center">
      <img src="{{ asset('images/UDN-Logo.webp') }}" alt="UDN Logo" style="height: 40px; width: 40px; margin-right: 10px;">
      <h6 class="offcanvas-title text-dark fw-bold mb-0" id="mobileMenuLabel">Universitas<br>Doktor Nugroho</h6>
    </div>
    <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body p-0">
    <ul class="list-unstyled">
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
          <ul class="list-unstyled ps-4" style="background: rgba(255,255,255,0.1);">
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

<style>
/* Mobile Menu Icon */
.mobile-menu-icon {
  width: 30px;
  height: 20px;
  position: relative;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.mobile-menu-icon span {
  width: 100%;
  height: 3px;
  background-color: #333;
  border-radius: 2px;
  transition: all 0.3s ease;
}

/* Desktop hover effects */
.navbar-nav .nav-link:hover {
  color: #2c3e50 !important;
  transform: translateY(-1px);
  transition: all 0.3s ease;
}

/* Active state */
.navbar-nav .nav-link.active {
  color: #2c3e50 !important;
}

/* Dropdown styling */
.dropdown-menu .dropdown-item:hover {
  background-color: rgba(93, 173, 226, 0.1);
  color: #2c3e50;
}

/* Mobile menu animations */
.offcanvas {
  transition: transform 0.3s ease-in-out;
}

/* Responsive adjustments */
@media (max-width: 991.98px) {
  .navbar-brand span {
    font-size: 0.9rem !important;
    line-height: 1.2;
  }
  
  .navbar-brand img {
    height: 40px !important;
    width: 40px !important;
  }
}
</style>
