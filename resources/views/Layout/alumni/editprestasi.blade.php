@extends('Layout.mainLayout')

@section('title', 'Edit Prestasi - Universitas Doktor Nugroho')

@section('content')
    <div class="container py-5">
        <h1 class="text-center text-primary mb-5">Edit Prestasi</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('prestasi.update', $prestasi->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Judul Prestasi</label>
                        <input type="text" name="title" class="form-control"
                            value="{{ old('title', $prestasi->title) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" class="form-control" rows="5" required>{{ old('description', $prestasi->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gambar</label>
                        @if (!empty($prestasi->image) && file_exists(public_path('images/prestasi/' . $prestasi->image)))
                            <div class="mb-2">
                                <img src="{{ asset('images/prestasi/' . $prestasi->image) }}" alt="Gambar saat ini"
                                    style="max-width: 300px; height: auto;">
                                <p class="text-muted small">Gambar saat ini</p>
                            </div>
                        @endif
                        <input type="file" name="image" class="form-control" accept="image/*">
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Update Prestasi</button>
                        <a href="{{ route('prestasi.show', $prestasi->id) }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection