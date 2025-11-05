@extends('Layout.mainLayout')

@section('title', 'Admin Berita - Universitas Doktor Nugroho')

@section('content')
    <div class="container py-5">
        <h1 class="text-center text-primary mb-5">Admin - Kelola Berita</h1>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-5">
            <form action="/admin/berita" method="GET" class="d-flex gap-2" style="max-width: 500px;">
                <input type="text" name="search" class="form-control" placeholder="Cari judul berita..."
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
                @if (request('search'))
                    <a href="/admin/berita" class="btn btn-secondary">Reset</a>
                @endif
            </form>

            <a href="/berita/tambah" class="btn btn-success">+ Tambah Berita</a>
        </div>

        @if (isset($search) && $beritas->isEmpty())
            <div class="text-center py-5">
                <h3 class="text-muted">"{{ $search }}" Tidak Ditemukan</h3>
                <p class="text-secondary mt-3">Tidak ada berita yang sesuai dengan pencarian Anda.</p>
                <a href="/admin/berita" class="btn btn-primary mt-3">Lihat Semua Berita</a>
            </div>
        @elseif (!isset($search) && $beritas->isEmpty())
            <div class="text-center py-5">
                <h3 class="text-muted">Berita Tidak Ditemukan</h3>
            </div>
        @else
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
                                            {{ $berita->show ? 'Tampil' : 'Tersembunyi' }}
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="/berita/{{ $berita->id }}" class="btn btn-sm btn-info" target="_blank">
                                            <i class="bi bi-eye"></i> Lihat
                                        </a>
                                        <a href="{{ route('berita.edit', $berita->id) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('berita.destroy', $berita->id) }}" method="POST"
                                            style="display: inline;"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $beritas->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
@endsection