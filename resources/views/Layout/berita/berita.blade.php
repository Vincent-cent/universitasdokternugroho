@extends('Layout.mainLayout')

@section('title', 'Detail Berita - Universitas Doktor Nugroho')

@section('content')
    <div class="container py-5">
        <h1 class="text-center text-primary mb-5">Daftar Berita</h1>

        <form action="/berita" method="GET" class="mb-5 d-flex gap-2" style="max-width: 500px;">
            <input type="text" name="search" class="form-control" placeholder="Cari judul berita..."
                value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Cari</button>
            @if (request('search'))
                <a href="/berita" class="btn btn-secondary">Reset</a>
            @endif
        </form>

        @if (isset($search) && $beritas->isEmpty())
            <div class="text-center py-5">
                <h3 class="text-muted">"{{ $search }}" Tidak Ditemukan</h3>
                <p class="text-secondary mt-3">Tidak ada berita yang sesuai dengan pencarian Anda.</p>
                <a href="/berita" class="btn btn-primary mt-3">Lihat Semua Berita</a>
            </div>
        @elseif(!isset($search) && $beritas->isEmpty())
            <div class="text-center py-5">
                <h3 class="text-muted">Berita Tidak Ditemukan</h3>
            </div>
        @else
            <div class="row">
                @foreach ($beritas as $index => $berita)
                    <div class="col-md-4 mb-4">
                        <div class="card border-primary h-100 shadow-sm">
                            @if (!empty($berita->image) && file_exists(public_path('storage/' . $berita->image)))
                                <img src="{{ asset('storage/' . $berita->image) }}" class="card-img-top" alt="Gambar berita"
                                    style="height: 250px; object-fit: cover;">
                            @else
                                <img src="{{ asset('placeholder.jpg') }}" class="card-img-top" alt="Gambar placeholder"
                                    style="height: 250px; object-fit: cover;">
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-primary">{{ Str::limit($berita->title, 60) }}</h5>
                                <p class="text-muted small mb-2"> 📅
                                    {{ \Carbon\Carbon::parse($berita->published_at)->format('d M Y') }}</p>
                                <p class="card-text flex-grow-1">
                                    {{ \Illuminate\Support\Str::limit($berita->content, 100, '...') }}
                                </p>
                                <p class="fw-bold text-end text-dark small mb-3">{{ $berita->author }}</p>
                                <div class="mt-auto">
                                    <a href="/berita/{{ $berita->id }}" class="btn btn-primary w-100">Baca Selengkapnya
                                        →</a>
                                </div>
                            </div>
                        </div>
                    </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-5">
        {{ $beritas->links('pagination::bootstrap-5') }}
    </div>
    @endif
    </div>
@endsection
