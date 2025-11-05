@extends('Layout.mainLayout')

@section('title', 'Profile - Universitas Doktor Nugroho')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="bi bi-person-circle me-2"></i>Profile Pengguna</h4>
                </div>
                <div class="card-body p-4">
                    <!-- User Info Section -->
                    <div class="row mb-4">
                        <div class="col-md-4 text-center">
                            <div class="mb-3">
                                <i class="bi bi-person-circle text-primary" style="font-size: 5rem;"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h5 class="text-primary mb-3">Informasi Akun</h5>
                            <div class="mb-3">
                                <label class="form-label fw-bold text-muted">Nama Lengkap:</label>
                                <p class="fs-5">{{ Auth::user()->name }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold text-muted">Email:</label>
                                <p class="fs-6 text-muted">{{ Auth::user()->email }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold text-muted">Status Akun:</label>
                                <span class="badge bg-success">
                                    <i class="bi bi-check-circle me-1"></i>Aktif
                                </span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold text-muted">Bergabung Sejak:</label>
                                <p class="text-muted">{{ Auth::user()->created_at->format('d F Y') }}</p>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <!-- Action Buttons -->
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-primary mb-3">Aksi Akun</h6>
                            <div class="d-grid gap-2">
                                <a href="/dashboard" class="btn btn-outline-primary">
                                    <i class="bi bi-speedometer2 me-2"></i>Dashboard
                                </a>
                                <button class="btn btn-outline-secondary" disabled>
                                    <i class="bi bi-pencil-square me-2"></i>Edit Profile (Coming Soon)
                                </button>
                                <button class="btn btn-outline-secondary" disabled>
                                    <i class="bi bi-key me-2"></i>Ubah Password (Coming Soon)
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-danger mb-3">Logout</h6>
                            <div class="alert alert-light border">
                                <p class="small mb-2">Keluar dari akun Anda dan kembali ke halaman utama.</p>
                                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger w-100" 
                                            onclick="return confirm('Apakah Anda yakin ingin logout?')">
                                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Info Card -->
            <div class="card mt-4 shadow">
                <div class="card-body">
                    <h6 class="text-primary mb-3">
                        <i class="bi bi-info-circle me-2"></i>Informasi Sistem
                    </h6>
                    <div class="row text-center">
                        <div class="col-md-4">
                            <div class="border rounded p-3">
                                <i class="bi bi-calendar-check text-success" style="font-size: 2rem;"></i>
                                <p class="mt-2 mb-1 fw-bold">Login Terakhir</p>
                                <small class="text-muted">{{ now()->format('d/m/Y H:i') }}</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border rounded p-3">
                                <i class="bi bi-shield-check text-primary" style="font-size: 2rem;"></i>
                                <p class="mt-2 mb-1 fw-bold">Email Verified</p>
                                <small class="text-muted">{{ Auth::user()->email_verified_at ? 'Terverifikasi' : 'Belum Verified' }}</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="border rounded p-3">
                                <i class="bi bi-house text-warning" style="font-size: 2rem;"></i>
                                <p class="mt-2 mb-1 fw-bold">Universitas</p>
                                <small class="text-muted">Doktor Nugroho</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection