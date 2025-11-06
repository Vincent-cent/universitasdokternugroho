@extends('Layout.mainLayout')

@section('title', 'Detail Prestasi - Universitas Doktor Nugroho')

@section('content')
    <div class="container py-5">
        <div class="card shadow">
            <div class="card-body">
                <div class="mb-4">
                    <a href="{{ route('alumni.show', $prestasi->alumni_id) }}" class="btn btn-outline-secondary">
                        ← Kembali ke Alumni
                    </a>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        @if (!empty($prestasi->image) && file_exists(public_path('images/prestasi/' . $prestasi->image)))
                            <img src="{{ asset('images/prestasi/' . $prestasi->image) }}" alt="{{ $prestasi->title }}"
                                class="img-fluid rounded mb-3">
                        @else
                            <img src="{{ asset('placeholder.jpg') }}" alt="Placeholder" class="img-fluid rounded mb-3">
                        @endif

                        <div class="card bg-light">
                            <div class="card-body">
                                <h6 class="fw-bold">Pemilik Prestasi:</h6>
                                <a href="{{ route('alumni.show', $prestasi->alumni->id) }}" class="text-decoration-none">
                                    <p class="mb-0">{{ $prestasi->alumni->name }}</p>
                                    <small class="text-muted">{{ $prestasi->alumni->angkatan }}</small>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-success me-2" style="font-size: 2rem;">🏆</span>
                            <h1 class="fw-bold mb-0">{{ $prestasi->title }}</h1>
                        </div>
                        <p class="text-muted mb-4">
                            <small>Dicapai pada: {{ $prestasi->created_at->format('d M Y') }}</small>
                        </p>

                        <div class="mb-4">
                            <p style="text-align: justify; line-height: 1.8;">{{ $prestasi->description }}</p>
                        </div>

                        @auth
                            <div class="d-flex gap-2">
                                <a href="{{ route('prestasi.edit', $prestasi->id) }}" class="btn btn-warning">
                                    ✏️ Edit Prestasi
                                </a>
                                <form action="{{ route('alumni.prestasi.delete', $prestasi->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus prestasi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">🗑️ Hapus</button>
                                </form>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection