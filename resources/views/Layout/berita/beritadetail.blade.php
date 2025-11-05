@extends('Layout.mainLayout')

@section('title', 'Detail Berita - Universitas Doktor Nugroho')

@section('content')
@if($berita)
<div class="bg-light text-dark">
    <header class="py-3 border-bottom">
        <div class="container">
            <a href="/berita" class="btn btn-outline-secondary " aria-label="Kembali">
                ← Kembali
            </a>
        </div>
    </header>

    <main>
        <article class="container py-4" aria-labelledby="judul-berita">
            <h1 id="judul-berita" class="fw-bold mb-2 text-center">{{ $berita->title }}</h1>
            <p class="text-muted mb-4">{{ $berita->author }} · {{ \Carbon\Carbon::parse($berita->published_at)->format('d M Y H:i') }}</p>

            <div class="d-flex justify-content-center mb-4">
                <div class="card" style="width: fit-content;">
                    @if(!empty($berita->image) && file_exists(public_path('images/berita/' . $berita->image)))
                        <img src="{{ asset('images/berita/' . $berita->image) }}" class="card-img-top" alt="Gambar berita"
                            style="max-height: 500px; max-width: 100%; height: auto; object-fit: contain; background-color: #f8f9fa;">
                    @else
                        <img src="{{ asset('placeholder.jpg') }}" class="card-img-top" alt="Gambar placeholder"
                            style="max-height: 500px; max-width: 100%; height: auto; object-fit: contain; background-color: #f8f9fa;">
                    @endif
                    <div class="card-footer text-muted small bg-light">{{ $berita->keterangan_gambar }}</div>
                </div>
            </div>

            <section class="mb-4">
                <p>{{ $berita->content }}</p>
            </section>
        </article>
    </main>

    <div class="border-top py-3">
        <div class="container text-end text-muted small">
            {{ $berita->author }} · {{ \Carbon\Carbon::parse($berita->published_at)->format('d M Y H:i') }}
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