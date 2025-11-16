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

        @if($alumniFeatured->count() > 0)
            <div class="mb-5">
                <h3 class="text-primary mb-4">🎓 Alumni Kami</h3>
                
                <div class="position-relative" style="padding: 0 60px;">
                    <div id="alumniCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
                        <div class="carousel-inner">
                            @foreach($alumniFeatured->chunk(2) as $index => $chunk)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <div class="row">
                                        @foreach($chunk as $alumni)
                                            <div class="col-md-6 mb-3">
                                                <div class="card h-100 shadow-sm">
                                                    <div class="card-body text-center">
                                                        @if (!empty($alumni->photo) && file_exists(public_path('images/alumni/' . $alumni->photo)))
                                                            <img src="{{ asset('images/alumni/' . $alumni->photo) }}" 
                                                                alt="{{ $alumni->name }}"
                                                                class="rounded-circle mb-3" 
                                                                style="width: 120px; height: 120px; object-fit: cover;">
                                                        @else
                                                            <img src="{{ asset('placeholder.jpg') }}" 
                                                                alt="Placeholder"
                                                                class="rounded-circle mb-3" 
                                                                style="width: 120px; height: 120px; object-fit: cover;">
                                                        @endif
                                                        
                                                        <h6 class="fw-bold">{{ $alumni->name }}</h6>
                                                        <p class="text-muted small mb-1">{{ $alumni->angkatan }}</p>
                                                        <p class="text-primary small fw-bold mb-2">{{ $alumni->year_range }}</p>
                                                        <p class="small text-secondary mb-3">{{ Str::limit($alumni->work_main ?? 'Belum bekerja', 50) }}</p>
                                                        
                                                        <a href="/alumni/{{ $alumni->id }}" class="btn btn-sm btn-primary">
                                                            Lihat Detail →
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    @if($alumniFeatured->count() > 2)
                        <button class="carousel-control-prev position-absolute" type="button" 
                                data-bs-target="#alumniCarousel" data-bs-slide="prev"
                                style="left: 0; top: 50%; transform: translateY(-50%); width: 50px;">
                            <span class="bg-primary rounded-circle d-flex align-items-center justify-content-center" 
                                  style="width: 45px; height: 45px;" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                </svg>
                            </span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next position-absolute" type="button" 
                                data-bs-target="#alumniCarousel" data-bs-slide="next"
                                style="right: 0; top: 50%; transform: translateY(-50%); width: 50px;">
                            <span class="bg-primary rounded-circle d-flex align-items-center justify-content-center" 
                                  style="width: 45px; height: 45px;" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    @endif
                </div>
            </div>

            <hr class="my-5">
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <form action="/alumni" method="GET" class="d-flex gap-2" style="max-width: 500px;">
                <input type="text" name="search" class="form-control" placeholder="Cari nama atau angkatan alumni..."
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
                @if (request('search'))
                    <a href="/alumni" class="btn btn-secondary">Reset</a>
                @endif
            </form>

            @if(auth()->check() && auth()->user()->role === 'admin')
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addAlumniModal">
                    + Tambah Alumni
                </button>
            @endif
        </div>

        @if (request('search') && $alumnis->isEmpty())
            <div class="text-center py-5">
                <h3 class="text-muted">"{{ request('search') }}" Tidak Ditemukan</h3>
                <p class="text-secondary mt-3">Tidak ada alumni yang sesuai dengan pencarian Anda.</p>
                <a href="/alumni" class="btn btn-primary mt-3">Lihat Semua Alumni</a>
            </div>
        @else
            <h4 class="text-primary mb-4">Semua Alumni</h4>
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
                                
                                <a href="/alumni/{{ $alumni->id }}" class="btn btn-primary w-100">
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
        @endif
    </div>

    @if(auth()->check() && auth()->user()->role === 'admin')
        <div class="modal fade" id="addAlumniModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Alumni</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="/alumni" method="POST" enctype="multipart/form-data">
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
    @endif
@endsection