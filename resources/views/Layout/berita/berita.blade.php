@extends('Layout.mainLayout')

@section('title', 'Detail Berita - Universitas Doktor Nugroho')

@section('content')
    <div class="container py-5">
        <h1 class="text-center text-primary mb-5">Daftar Berita</h1>

        <div class="row">
            @foreach ($beritas as $index => $berita)
                <div class="col-md-6 mb-4">
                    <div class="card border-primary h-100">
                        @if (!empty($berita->image) && file_exists(public_path('storage/' . $berita->image)))
                            <img src="{{ asset('storage/' . $berita->image) }}" class="card-img-top" alt="Gambar berita">
                        @else
                            <img src="{{ asset('placeholder.jpg') }}" class="card-img-top" alt="Gambar placeholder">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-primary">{{ $berita->title }}</h5>
                            <p class="text-muted"> 📅
                                {{ \Carbon\Carbon::parse($berita->published_at)->format('d M Y H:i') }}</p>
                            <p class="card-text">
                                {{ \Illuminate\Support\Str::limit($berita->content, 120, '...') }}
                            </p>
                            <p class="fw-bold text-end text-dark">{{ $berita->author }}</p>
                            <div class="mt-auto">
                                <a href="/berita/{{ $berita->id }}" class="btn btn-primary w-100">Baca Selengkapnya →</a>
                            </div>
                        </div>
                    </div>
                </div>

                @if (($index + 1) % 2 == 0)
        </div>
        <div class="row">
            @endif
            @endforeach
        </div>
    </div>
@endsection