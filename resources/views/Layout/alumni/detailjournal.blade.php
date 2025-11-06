@extends('Layout.mainLayout')

@section('title', 'Detail Journal - Universitas Doktor Nugroho')

@section('content')
    <div class="container py-5">
        <div class="card shadow">
            <div class="card-body">
                <div class="mb-4">
                    <a href="{{ route('alumni.show', $journal->alumni_id) }}" class="btn btn-outline-secondary">
                        ← Kembali ke Alumni
                    </a>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        @if (!empty($journal->image) && file_exists(public_path('images/journals/' . $journal->image)))
                            <img src="{{ asset('images/journals/' . $journal->image) }}" alt="{{ $journal->title }}"
                                class="img-fluid rounded mb-3">
                        @else
                            <img src="{{ asset('placeholder.jpg') }}" alt="Placeholder" class="img-fluid rounded mb-3">
                        @endif

                        <div class="card bg-light">
                            <div class="card-body">
                                <h6 class="fw-bold">Penulis:</h6>
                                <a href="{{ route('alumni.show', $journal->alumni->id) }}" class="text-decoration-none">
                                    <p class="mb-0">{{ $journal->alumni->name }}</p>
                                    <small class="text-muted">{{ $journal->alumni->angkatan }}</small>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <h1 class="fw-bold mb-3">{{ $journal->title }}</h1>
                        <p class="text-muted mb-4">
                            <small>Dipublikasikan: {{ $journal->created_at->format('d M Y') }}</small>
                        </p>

                        <div class="mb-4">
                            <p style="text-align: justify; line-height: 1.8;">{{ $journal->description }}</p>
                        </div>

                        @auth
                            <div class="d-flex gap-2">
                                <a href="{{ route('journal.edit', $journal->id) }}" class="btn btn-warning">
                                    ✏️ Edit Journal
                                </a>
                                <form action="{{ route('alumni.journal.delete', $journal->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus journal ini?')">
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