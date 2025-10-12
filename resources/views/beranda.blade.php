@extends('Layout.mainLayout')

@section('title', 'Beranda - Universitas Doktor Nugroho')

@section('content')
    <div class="hero-section text-center py-5">
        <h1 class="display-4 fw-bold text-dark mb-3">Selamat Datang di Universitas Dokter Nugroho</h1>
        <p class="lead text-muted">Ini adalah halaman beranda universitas kami.</p>
    </div>
    
    @include('Layout.webEssentials.alumni')
@endsection