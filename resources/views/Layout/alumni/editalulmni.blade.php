@extends('Layout.mainLayout')

@section('title', 'Edit Alumni - Universitas Doktor Nugroho')

@section('content')
    <div class="container py-5">
        <h1 class="text-center text-primary mb-5">Edit Alumni</h1>

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
                <form action="{{ route('alumni.update', $alumni->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $alumni->name) }}"
                                required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Angkatan</label>
                            <input type="text" name="angkatan" class="form-control"
                                value="{{ old('angkatan', $alumni->angkatan) }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tahun (contoh: 2018-2022)</label>
                            <input type="text" name="year_range" class="form-control"
                                value="{{ old('year_range', $alumni->year_range) }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Foto</label>
                            @if (!empty($alumni->photo) && file_exists(public_path('images/alumni/' . $alumni->photo)))
                                <div class="mb-2">
                                    <img src="{{ asset('images/alumni/' . $alumni->photo) }}" alt="Foto saat ini"
                                        style="max-width: 150px; height: auto;">
                                    <p class="text-muted small">Foto saat ini</p>
                                </div>
                            @endif
                            <input type="file" name="photo" class="form-control" accept="image/*">
                            <small class="text-muted">Kosongkan jika tidak ingin mengubah foto</small>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pekerjaan Utama</label>
                        <input type="text" name="work_main" class="form-control"
                            value="{{ old('work_main', $alumni->work_main) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat Pekerjaan Utama</label>
                        <textarea name="work_main_address" class="form-control" rows="2">{{ old('work_main_address', $alumni->work_main_address) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pekerjaan Sekunder</label>
                        <input type="text" name="work_secondary" class="form-control"
                            value="{{ old('work_secondary', $alumni->work_secondary) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi Pekerjaan Sekunder</label>
                        <textarea name="work_secondary_desc" class="form-control" rows="2">{{ old('work_secondary_desc', $alumni->work_secondary_desc) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">About</label>
                        <textarea name="about" class="form-control" rows="3">{{ old('about', $alumni->about) }}</textarea>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Update Alumni</button>
                        <a href="{{ route('alumni.show', $alumni->id) }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection