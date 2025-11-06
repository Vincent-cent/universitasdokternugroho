@extends('Layout.mainLayout')

@section('title', 'Berita - Universitas Doktor Nugroho')

@section('content')
    <div class="container py-5">
        <h1 class="text-center text-primary mb-5">
            @auth
                Admin - Kelola Berita
            @else
                Daftar Berita
            @endauth
        </h1>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <form action="/berita" method="GET" class="d-flex gap-2" style="max-width: 500px;">
                <input type="text" name="search" class="form-control" placeholder="Cari judul berita..."
                    value="{{ request('search') }}">
                @auth
                    <input type="hidden" name="filter" value="{{ request('filter') }}">
                @endauth
                <button type="submit" class="btn btn-primary">Cari</button>
                @if (request('search'))
                    <a href="/berita{{ Auth::check() && request('filter') ? '?filter=' . request('filter') : '' }}"
                        class="btn btn-secondary">Reset</a>
                @endif
            </form>

            <a href="/berita/tambah" class="btn btn-success">+ Tambah Berita</a>
        </div>

        @auth
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
        @endauth

        @if (isset($search) && $beritas->isEmpty())
            <div class="text-center py-5">
                <h3 class="text-muted">"{{ $search }}" Tidak Ditemukan</h3>
                <p class="text-secondary mt-3">Tidak ada berita yang sesuai dengan pencarian Anda.</p>
                <a href="/berita" class="btn btn-primary mt-3">Lihat Semua Berita</a>
            </div>
        @elseif (!isset($search) && $beritas->isEmpty())
            <div class="text-center py-5">
                <h3 class="text-muted">Berita Tidak Ditemukan</h3>
                @auth
                    <p class="text-secondary">Tidak ada berita dengan filter yang dipilih.</p>
                @endauth
            </div>
        @else
            @auth
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
            @endauth

            <div class="d-flex justify-content-center mt-5">
                {{ $beritas->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
@endsection