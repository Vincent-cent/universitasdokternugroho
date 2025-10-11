@extends('Layout.mainLayout')

@section('title', 'Kontak - Universitas Doktor Nugroho')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4">Kontak Kami</h1>
            
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Informasi Kontak</h5>
                    <p class="card-text">
                        <strong>Alamat:</strong><br>
                        Universitas Doktor Nugroho<br>
                        Jl. Pendidikan No. 123<br>
                        Jakarta, Indonesia
                    </p>
                    
                    <p class="card-text">
                        <strong>Telepon:</strong> (021) 123-4567<br>
                        <strong>Email:</strong> info@universitasdokternugroho.ac.id<br>
                        <strong>Website:</strong> www.universitasdokternugroho.ac.id
                    </p>
                    
                    <p class="card-text">
                        <strong>Jam Operasional:</strong><br>
                        Senin - Jumat: 08:00 - 17:00<br>
                        Sabtu: 08:00 - 14:00<br>
                        Minggu: Tutup
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection