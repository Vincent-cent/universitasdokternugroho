@extends('Layout.mainLayout')

@section('title', 'Edit Berita - Universitas Doktor Nugroho')

@section('content')
    <div class="container py-5">
        <h1 class="text-center text-primary mb-5">Edit Berita</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="title" class="form-label">Judul Berita</label>
                <input type="text" class="form-control" id="title" name="title" 
                    value="{{ old('title', $berita->title) }}" required>
            </div>
            
            <div class="mb-3">
                <label for="content" class="form-label">Isi Berita</label>
                <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content', $berita->content) }}</textarea>
            </div>
            
            <div class="mb-3">
                <label for="author" class="form-label">Penulis</label>
                <input type="text" class="form-control" id="author" name="author" 
                    value="{{ old('author', $berita->author) }}" required>
            </div>
            
            <div class="mb-3">
                <label for="image" class="form-label">Gambar Berita</label>
                @if(!empty($berita->image) && file_exists(public_path('images/berita/' . $berita->image)))
                    <div class="mb-2">
                        <img src="{{ asset('images/berita/' . $berita->image) }}" alt="Gambar saat ini" 
                            style="max-width: 300px; height: auto;">
                        <p class="text-muted small">Gambar saat ini</p>
                    </div>
                @endif
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
            </div>
            
            <div class="mb-3">
                <label for="keterangan_gambar" class="form-label">Keterangan Gambar</label>
                <input type="text" class="form-control" id="keterangan_gambar" name="keterangan_gambar"
                    value="{{ old('keterangan_gambar', $berita->keterangan_gambar) }}">
            </div>
            
            <button type="submit" class="btn btn-primary">Update Berita</button>
            <a href="/admin/berita" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection