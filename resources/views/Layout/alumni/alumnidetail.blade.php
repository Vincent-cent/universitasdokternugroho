@extends('Layout.mainLayout')

@section('title', 'Detail Alumni - Universitas Doktor Nugroho')

@section('content')
    <div class="container py-5">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-body text-center">
                        @if (!empty($alumni->photo) && file_exists(public_path('images/alumni/' . $alumni->photo)))
                            <img src="{{ asset('images/alumni/' . $alumni->photo) }}" alt="{{ $alumni->name }}"
                                class="rounded-circle mb-3" style="width: 180px; height: 180px; object-fit: cover;">
                        @else
                            <img src="{{ asset('placeholder.jpg') }}" alt="Placeholder"
                                class="rounded-circle mb-3" style="width: 180px; height: 180px; object-fit: cover;">
                        @endif

                        <h5 class="fw-bold mb-3">Work</h5>
                        <div class="mb-3 text-start">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="mb-0">{{ $alumni->work_main ?? 'N/A' }}</h6>
                                <span class="badge bg-primary">Main</span>
                            </div>
                            <p class="mb-0 text-muted small">{{ $alumni->work_main_address ?? 'No address' }}</p>
                        </div>

                        @if ($alumni->work_secondary)
                            <div class="mb-3 text-start">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="mb-0">{{ $alumni->work_secondary }}</h6>
                                    <span class="badge bg-warning">Secondary</span>
                                </div>
                                <p class="mb-0 text-muted small">{{ $alumni->work_secondary_desc ?? 'No description' }}</p>
                            </div>
                        @endif

                        <hr>

                        <h5 class="fw-bold mb-3">About</h5>
                        <p class="text-muted">{{ $alumni->about ?? 'No description' }}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2 class="mb-2 fw-bold">{{ $alumni->name }}</h2>
                                <p class="mb-0 text-muted">{{ $alumni->angkatan }}</p>
                            </div>
                            <div class="d-flex gap-2 align-items-center">
                                <h4 class="mb-0 fw-bold text-primary me-3">{{ $alumni->year_range }}</h4>
                                @if(auth()->check() && auth()->user()->role === 'admin')
                                    <a href="{{ route('alumni.edit', $alumni->id) }}" class="btn btn-sm btn-warning">
                                        Edit Alumni
                                    </a>
                                    <form action="{{ route('alumni.destroy', $alumni->id) }}" method="POST"
                                        style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus alumni ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus Alumni</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="journal-tab" data-bs-toggle="tab" data-bs-target="#journal"
                            type="button" role="tab">
                            📰 Journal
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="prestasi-tab" data-bs-toggle="tab" data-bs-target="#prestasi"
                            type="button" role="tab">
                            🏆 Prestasi
                        </button>
                    </li>
                </ul>

                <div class="tab-content border border-top-0 p-4" id="myTabContent">
                    <div class="tab-pane fade show active" id="journal" role="tabpanel">
                        @if(auth()->check() && auth()->user()->role === 'admin')
                            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addJournalModal">
                                ➕ Add Journal
                            </button>
                        @endif

                        @forelse($alumni->journals as $journal)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a href="{{ route('journal.show', $journal->id) }}">
                                                @if (!empty($journal->image) && file_exists(public_path('images/journals/' . $journal->image)))
                                                    <img src="{{ asset('images/journals/' . $journal->image) }}"
                                                        alt="{{ $journal->title }}" class="img-fluid rounded"
                                                        style="cursor: pointer;">
                                                @else
                                                    <img src="{{ asset('placeholder.jpg') }}" alt="Placeholder"
                                                        class="img-fluid rounded" style="cursor: pointer;">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-md-7">
                                            <a href="{{ route('journal.show', $journal->id) }}" class="text-decoration-none">
                                                <h5 class="fw-bold text-primary">{{ $journal->title }}</h5>
                                            </a>
                                            <p class="text-muted mb-0">{{ Str::limit($journal->description, 100) }}</p>
                                        </div>
                                        @auth
                                            <div class="col-md-2">
                                                <a href="{{ route('journal.edit', $journal->id) }}"
                                                    class="btn btn-sm btn-warning w-100 mb-2">✏️ Edit</a>
                                                <form action="{{ route('alumni.journal.delete', $journal->id) }}"
                                                    method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger w-100">🗑️
                                                        Delete</button>
                                                </form>
                                            </div>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-info text-center">Belum ada journal</div>
                        @endforelse
                    </div>

                    <div class="tab-pane fade" id="prestasi" role="tabpanel">
                        @if(auth()->check() && auth()->user()->role === 'admin')
                            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addPrestasiModal">
                                ➕ Add Prestasi
                            </button>
                        @endif

                        @forelse($alumni->prestasis as $prestasi)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a href="{{ route('prestasi.show', $prestasi->id) }}">
                                                @if (!empty($prestasi->image) && file_exists(public_path('images/prestasi/' . $prestasi->image)))
                                                    <img src="{{ asset('images/prestasi/' . $prestasi->image) }}"
                                                        alt="{{ $prestasi->title }}" class="img-fluid rounded"
                                                        style="cursor: pointer;">
                                                @else
                                                    <img src="{{ asset('placeholder.jpg') }}" alt="Placeholder"
                                                        class="img-fluid rounded" style="cursor: pointer;">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-md-7">
                                            <a href="{{ route('prestasi.show', $prestasi->id) }}" class="text-decoration-none">
                                                <h5 class="fw-bold text-primary">{{ $prestasi->title }}</h5>
                                            </a>
                                            <p class="text-muted mb-0">{{ Str::limit($prestasi->description, 100) }}</p>
                                        </div>
                                        @auth
                                            <div class="col-md-2">
                                                <a href="{{ route('prestasi.edit', $prestasi->id) }}"
                                                    class="btn btn-sm btn-warning w-100 mb-2">✏️ Edit</a>
                                                <form action="{{ route('alumni.prestasi.delete', $prestasi->id) }}"
                                                    method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger w-100">🗑️
                                                        Delete</button>
                                                </form>
                                            </div>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-info text-center">Belum ada prestasi</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addJournalModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Journal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('alumni.journal.store', $alumni->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="description" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
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

    <div class="modal fade" id="addPrestasiModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Prestasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('alumni.prestasi.store', $alumni->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="description" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
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
@endsection