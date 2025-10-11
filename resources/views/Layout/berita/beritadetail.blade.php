@extends('Layout.mainLayout')

@section('title', 'Detail Berita - Universitas Doktor Nugroho')

@section('content')
@if($berita)
<div class="bg-light text-dark">
    <header class="py-3 border-bottom">
        <div class="container">
            <a href="/berita" class="btn btn-outline-secondary" aria-label="Kembali">
                ← Kembali
            </a>
        </div>
    </header>

    <main>
        <article class="container py-4" aria-labelledby="judul-berita">
            <h1 id="judul-berita" class="fw-bold mb-2">{{ $berita['title'] }}</h1>
            <p class="text-muted mb-4">{{ $berita['author'] }} · {{ $berita['published_at'] }}</p>

            <div class="card mb-4">
                <img src="{{ asset('storage/' . $berita['image']) }}" class="card-img-top"
                    alt="Gambar berita placeholder">
                <div class="card-footer text-muted small">{{ $berita['keterangan_gambar'] }}</div>
            </div>

            <section class="mb-4">
                <p><strong></strong> {{ $berita['content'] }}</p>
            </section>
        </article>
    </main>

    <div class="border-top py-3">
        <div class="container text-end text-muted small">
            {{ $berita['author'] }} · {{ $berita['published_at'] }}
        </div>
    </div>

</div>
@else
<div class="container">
    <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading">Berita Tidak Ditemukan</h4>
        <p>Maaf, berita yang Anda cari tidak dapat ditemukan.</p>
        <hr>
        <p class="mb-0"><a href="/berita" class="btn btn-primary">← Kembali ke Daftar Berita</a></p>
    </div>
</div>
@endif

@endsection
