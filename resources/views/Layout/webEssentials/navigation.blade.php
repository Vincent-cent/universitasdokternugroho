<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Universitas Doktor Nugroho</a>

    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" 
             {{ request()->is('/') ? 'aria-current=page' : '' }} 
             href="/">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('tentang') ? 'active' : '' }}" 
             {{ request()->is('tentang') ? 'aria-current=page' : '' }} 
             href="/tentang">Tentang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('program') ? 'active' : '' }}" 
             {{ request()->is('program') ? 'aria-current=page' : '' }} 
             href="/program">Program</a>
        </li>
          <li class="nav-item">
          <a class="nav-link {{ request()->is('berita*') ? 'active' : '' }}" 
             {{ request()->is('berita*') ? 'aria-current=page' : '' }} 
             href="/berita">Berita</a>
        </li>
        <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle {{ request()->is('kontak') ? 'active' : '' }}"
            href="#"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false">
            Pendaftaran
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Mahasiswa Baru</a></li>
            <li><a class="dropdown-item" href="#">Beasiswa</a></li>
            <li><hr class="dropdown-divider" /></li>
            <li><a class="dropdown-item {{ request()->is('kontak') ? 'active' : '' }}" href="/kontak">Kontak</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
