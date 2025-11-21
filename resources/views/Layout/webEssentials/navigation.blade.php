<nav class="navbar navbar-expand-lg modern-navbar fixed-top">
  <div class="container-fluid">
    <!-- Logo -->
    <a class="navbar-brand-modern" href="/">
      <img src="{{ asset('images/Logo/UDN-Logo.png') }}" alt="UDN Logo" class="brand-logo">
      <span>Universitas Doktor Nugroho</span>
    </a>

    <!-- Navigation Items -->
    <div class="nav-items-container">
      <!-- Home -->
      <a href="/" class="nav-icon-item {{ request()->is('/') ? 'active' : '' }}">
        <i class="fas fa-home nav-icon"></i>
        <span class="nav-text">Beranda</span>
      </a>

      <!-- Alumni -->
      <a href="/alumni" class="nav-icon-item {{ request()->is('alumni*') ? 'active' : '' }}">
        <i class="fas fa-users nav-icon"></i>
        <span class="nav-text">Alumni</span>
      </a>

      <!-- Program -->
      <a href="/program" class="nav-icon-item {{ request()->is('program*') ? 'active' : '' }}">
        <i class="fas fa-link nav-icon"></i>
        <span class="nav-text">Program</span>
      </a>

      <!-- Berita -->
      <a href="/berita" class="nav-icon-item {{ request()->is('berita*') ? 'active' : '' }}">
        <i class="far fa-newspaper nav-icon"></i>
        <span class="nav-text">Berita</span>
      </a>

      <!-- Kontak -->
      <a href="/kontak" class="nav-icon-item {{ request()->is('kontak*') ? 'active' : '' }}">
        <i class="fas fa-envelope nav-icon"></i>
        <span class="nav-text">Kontak</span>
      </a>

      @auth
        <div class="user-profile">
          <a href="/profile" class="profile-btn">
            <i class="fas fa-user"></i>
          </a>
        </div>
      @else
        <!-- Auth Buttons (when not logged in) -->
        <div class="auth-buttons">
          <a href="/login" class="auth-btn login-btn">Login</a>
          <a href="/register" class="auth-btn signup-btn">Sign up</a>
        </div>
      @endauth
    </div>
  </div>
</nav>

<!-- Mobile Menu Toggle Button (hidden by default, shown on small screens) -->
<button class="navbar-toggler d-lg-none border-0 p-2" 
        type="button" 
        data-bs-toggle="offcanvas" 
        data-bs-target="#mobileMenu" 
        aria-controls="mobileMenu" 
        aria-expanded="false" 
        style="background: rgba(255,255,255,0.1); border-radius: 8px;">
    <span style="color: white; font-size: 18px;">
        <i class="fas fa-bars"></i>
    </span>
</button>

<!-- Mobile Menu Offcanvas -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel"
     style="background: linear-gradient(135deg, #1A2F3F 26%, #2C506E 100%); width: 280px;">
  <div class="offcanvas-header border-bottom border-white border-opacity-25">
    <h5 class="offcanvas-title text-white fw-bold" id="mobileMenuLabel">Menu</h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body p-0">
    <ul class="list-unstyled mb-0">
      <li>
        <a href="/" class="d-flex align-items-center py-3 px-4 text-white text-decoration-none border-bottom border-white border-opacity-10 {{ request()->is('/') ? 'bg-danger' : '' }}">
          <i class="fas fa-home me-3"></i>
          Beranda
        </a>
      </li>
      <li>
        <a href="/alumni" class="d-flex align-items-center py-3 px-4 text-white text-decoration-none border-bottom border-white border-opacity-10 {{ request()->is('alumni*') ? 'bg-danger' : '' }}">
          <i class="fas fa-users me-3"></i>
          Alumni
        </a>
      </li>
      <li>
        <a href="/program" class="d-flex align-items-center py-3 px-4 text-white text-decoration-none border-bottom border-white border-opacity-10 {{ request()->is('program*') ? 'bg-danger' : '' }}">
          <i class="fas fa-link me-3"></i>
          Program
        </a>
      </li>
      <li>
        <a href="/berita" class="d-flex align-items-center py-3 px-4 text-white text-decoration-none border-bottom border-white border-opacity-10 {{ request()->is('berita*') ? 'bg-danger' : '' }}">
          <i class="far fa-newspaper me-3"></i>
          Berita
        </a>
      </li>
      <li>
        <a href="/kontak" class="d-flex align-items-center py-3 px-4 text-white text-decoration-none border-bottom border-white border-opacity-10 {{ request()->is('kontak*') ? 'bg-danger' : '' }}">
          <i class="fas fa-envelope me-3"></i>
          Kontak
        </a>
      </li>
      @auth
      <li>
        <a href="/profile" class="d-flex align-items-center py-3 px-4 text-white text-decoration-none {{ request()->is('profile*') ? 'bg-danger' : '' }}">
          <i class="fas fa-user me-3"></i>
          Profile
        </a>
      </li>
      @else
      <li class="p-3 border-top border-white border-opacity-10 mt-3">
        <a href="/login" class="btn btn-outline-light w-100 mb-2">Login</a>
        <a href="/register" class="btn btn-light w-100">Sign up</a>
      </li>
      @endauth
    </ul>
  </div>
</div>

