@extends('Layout.mainLayout')

@section('title', 'Berita - Universitas Doktor Nugroho')

@section('content')
    <div class="container py-5">
        <h1 class="text-center text-primary mb-5">
            @if(auth()->check() && auth()->user()->role === 'admin')
                Admin - Kelola Berita
            @else
                Daftar Berita
            @endif
        </h1>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(!auth()->check() || auth()->user()->role !== 'admin')
            @if($beritaTerkini->count() > 0)
                <div class="mb-5">
                    <h3 class="text-primary mb-4">Berita Terkini</h3>
                    
                    <div class="position-relative" style="padding: 0 60px;">
                        <div id="beritaTerkiniCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                            <div class="carousel-inner">
                                @foreach($beritaTerkini->chunk(2) as $index => $chunk)
                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                        <div class="row">
                                            @foreach($chunk as $berita)
                                                <div class="col-md-6 mb-3">
                                                    <div class="card h-100 shadow-sm">
                                                        @if (!empty($berita->image) && file_exists(public_path('images/berita/' . $berita->image)))
                                                            <img src="{{ asset('images/berita/' . $berita->image) }}" 
                                                                class="card-img-top" alt="{{ $berita->title }}"
                                                                style="height: 200px; object-fit: cover;">
                                                        @else
                                                            <img src="{{ asset('placeholder.jpg') }}" 
                                                                class="card-img-top" alt="Placeholder"
                                                                style="height: 200px; object-fit: cover;">
                                                        @endif
                                                        <div class="card-body d-flex flex-column">
                                                            <h6 class="card-title text-primary fw-bold">{{ Str::limit($berita->title, 60) }}</h6>
                                                            <p class="text-muted small mb-2">
                                                                📅 {{ \Carbon\Carbon::parse($berita->published_at)->format('d M Y') }}
                                                            </p>
                                                            <p class="card-text small flex-grow-1">
                                                                {{ Str::limit($berita->content, 100) }}
                                                            </p>
                                                            <a href="/berita/{{ $berita->id }}" class="btn btn-sm btn-primary mt-2">
                                                                Baca →
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

                        @if($beritaTerkini->count() > 2)
                            <button class="carousel-control-prev position-absolute" type="button" 
                                    data-bs-target="#beritaTerkiniCarousel" data-bs-slide="prev"
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
                                    data-bs-target="#beritaTerkiniCarousel" data-bs-slide="next"
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
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <form action="/berita" method="GET" class="d-flex gap-2" style="max-width: 500px;">
                <input type="text" name="search" class="form-control" placeholder="Cari judul berita..."
                    value="{{ request('search') }}">
                @if(auth()->check() && auth()->user()->role === 'admin')
                    <input type="hidden" name="filter" value="{{ request('filter') }}">
                @endif
                <button type="submit" class="btn btn-primary">Cari</button>
                @if (request('search'))
                    <a href="/berita{{ auth()->check() && auth()->user()->role === 'admin' && request('filter') ? '?filter=' . request('filter') : '' }}"
                        class="btn btn-secondary">Reset</a>
                @endif
            </form>

            @auth
                <a href="/berita/tambah" class="btn btn-success">+ Tambah Berita</a>
            @endauth
        </div>

        @if(auth()->check() && auth()->user()->role === 'admin')
            <div class="mb-4">
                <div class="btn-group" role="group" aria-label="Filter Status">
                    <a href="/berita?filter=semua{{ request('search') ? '&search=' . request('search') : '' }}"
                        class="btn {{ request('filter') == 'semua' || !request('filter') ? 'btn-primary' : 'btn-outline-primary' }}">
                        📋 Semua Berita
                    </a>
                    <a href="/berita?filter=tampil{{ request('search') ? '&search=' . request('search') : '' }}"
                        class="btn {{ request('filter') == 'tampil' ? 'btn-success' : 'btn-outline-success' }}">
                        ✅ Sudah Di-ACC
                    </a>
                    <a href="/berita?filter=tersembunyi{{ request('search') ? '&search=' . request('search') : '' }}"
                        class="btn {{ request('filter') == 'tersembunyi' ? 'btn-secondary' : 'btn-outline-secondary' }}">
                        ⏳ Belum Di-ACC
                    </a>
                </div>
            </div>
        @endif

        @if (isset($search) && $beritas->isEmpty())
            <div class="text-center py-5">
                <h3 class="text-muted">"{{ $search }}" Tidak Ditemukan</h3>
                <p class="text-secondary mt-3">Tidak ada berita yang sesuai dengan pencarian Anda.</p>
                <a href="/berita" class="btn btn-primary mt-3">Lihat Semua Berita</a>
            </div>
        @elseif (!isset($search) && $beritas->isEmpty())
            <div class="text-center py-5">
                <h3 class="text-muted">Berita Tidak Ditemukan</h3>
                @if(auth()->check() && auth()->user()->role === 'admin')
                    <p class="text-secondary">Tidak ada berita dengan filter yang dipilih.</p>
                @endif
            </div>
        @else
            @if(auth()->check() && auth()->user()->role === 'admin')
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>ID</th>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($beritas as $berita)
                                <tr>
                                    <td>{{ $berita->id }}</td>
                                    <td>
                                        @if (!empty($berita->image) && file_exists(public_path('images/berita/' . $berita->image)))
                                            <img src="{{ asset('images/berita/' . $berita->image) }}" alt="Gambar berita"
                                                style="width: 80px; height: 60px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('placeholder.jpg') }}" alt="Gambar placeholder"
                                                style="width: 80px; height: 60px; object-fit: cover;">
                                        @endif
                                    </td>
                                    <td>{{ Str::limit($berita->title, 50) }}</td>
                                    <td>{{ $berita->author }}</td>
                                    <td>{{ \Carbon\Carbon::parse($berita->published_at)->format('d M Y') }}</td>
                                    <td>
                                        <form action="{{ route('berita.toggle', $berita->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="btn btn-sm {{ $berita->show ? 'btn-success' : 'btn-secondary' }}">
                                                {{ $berita->show ? '✅ Tampil' : '⏳ Tersembunyi' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="/berita/{{ $berita->id }}" class="btn btn-sm btn-info"
                                                target="_blank" title="Lihat">
                                                👁️
                                            </a>
                                            <a href="{{ route('berita.edit', $berita->id) }}"
                                                class="btn btn-sm btn-warning" title="Edit">
                                                ✏️
                                            </a>
                                            <form action="{{ route('berita.destroy', $berita->id) }}" method="POST"
                                                style="display: inline;"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                    🗑️
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
            
                <h4 class="text-primary mb-4">Semua Berita</h4>
                <div class="row">
                    @foreach ($beritas as $berita)
                        <div class="col-md-4 mb-4">
                            <div class="card border-primary h-100 shadow-sm">
                                @if (!empty($berita->image) && file_exists(public_path('images/berita/' . $berita->image)))
                                    <img src="{{ asset('images/berita/' . $berita->image) }}" class="card-img-top"
                                        alt="Gambar berita" style="height: 250px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('placeholder.jpg') }}" class="card-img-top"
                                        alt="Gambar placeholder" style="height: 250px; object-fit: cover;">
                                @endif
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title text-primary">{{ Str::limit($berita->title, 60) }}</h5>
                                    <p class="text-muted small mb-2"> 📅
                                        {{ \Carbon\Carbon::parse($berita->published_at)->format('d M Y') }}</p>
                                    <p class="card-text flex-grow-1">
                                        {{ Str::limit($berita->content, 100, '...') }}
                                    </p>
                                    <p class="fw-bold text-end text-dark small mb-3">{{ $berita->author }}</p>
                                    <div class="mt-auto">
                                        <a href="/berita/{{ $berita->id }}" class="btn btn-primary w-100">Baca
                                            Selengkapnya →</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="d-flex justify-content-center mt-5">
                {{ $beritas->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
@endsection