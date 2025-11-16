@extends('Layout.mainLayout')

@section('title', 'Alumni - Universitas Doktor Nugroho')

@section('content')
    <div class="container py-5">
        <h1 class="text-center text-primary mb-5">Daftar Alumni</h1>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(auth()->check() && auth()->user()->role === 'admin')
            <div class="mb-4">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addAlumniModal">
                    + Tambah Alumni
                </button>
            </div>
        @endif

        <div class="row">
            @forelse($alumnis as $alumni)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-center">
                            @if (!empty($alumni->photo) && file_exists(public_path('images/alumni/' . $alumni->photo)))
                                <img src="{{ asset('images/alumni/' . $alumni->photo) }}" alt="{{ $alumni->name }}"
                                    class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                            @else
                                <img src="{{ asset('placeholder.jpg') }}" alt="Placeholder"
                                    class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                            @endif
                            
                            <h5 class="fw-bold">{{ $alumni->name }}</h5>
                            <p class="text-muted mb-2">{{ $alumni->angkatan }}</p>
                            <p class="text-primary fw-bold">{{ $alumni->year_range }}</p>
                            
                            <a href="{{ route('alumni.show', $alumni->id) }}" class="btn btn-primary w-100">
                                Lihat Detail →
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center">Belum ada data alumni</div>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $alumnis->links('pagination::bootstrap-5') }}
        </div>
    </div>

    @auth
        <div class="modal fade" id="addAlumniModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Alumni</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="{{ route('alumni.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Angkatan</label>
                                <input type="text" name="angkatan" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tahun (contoh: 2018-2022)</label>
                                <input type="text" name="year_range" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Foto</label>
                                <input type="file" name="photo" class="form-control" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pekerjaan Utama</label>
                                <input type="text" name="work_main" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat Pekerjaan Utama</label>
                                <textarea name="work_main_address" class="form-control" rows="2"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pekerjaan Sekunder</label>
                                <input type="text" name="work_secondary" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deskripsi Pekerjaan Sekunder</label>
                                <textarea name="work_secondary_desc" class="form-control" rows="2"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">About</label>
                                <textarea name="about" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endauth
@endsection