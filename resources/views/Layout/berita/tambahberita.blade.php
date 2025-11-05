@extends('Layout.mainLayout')
@section('title', 'Tambah Berita - Universitas Doktor Nugroho')
@section('content')
    <div class="container py-5">
        <h1 class="text-center text-primary mb-5">Tambah Berita Baru</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul Berita</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Isi Berita</label>
                <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Penulis</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ old('author') }}" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Gambar Berita</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="keterangan_gambar" class="form-label">Keterangan Gambar</label>
                <input type="text" class="form-control" id="keterangan_gambar" name="keterangan_gambar"
                    value="{{ old('keterangan_gambar') }}">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Berita</button>
            <a href="/berita" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection