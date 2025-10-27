@extends('Layout.mainLayout')

@section('title', 'Beranda - Universitas Doktor Nugroho')

@section('content')
</div>
<section class="position-relative w-100 d-flex align-items-center justify-content-center text-white" 
         style="height: 60vh; min-height: 400px; margin-top: -3.5rem; background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('images/banner.webp') }}') center/cover no-repeat;">
    <div class="text-center px-3">
        <h1 class="display-4 fw-bold mb-3">Selamat Datang di website <span class="text-info">ALUMNI</span></h1>
        <h2 class="h3 fw-bold">Universitas Doktor Nugroho</h2>
    </div>
</section>

<div class="container mb-4 flex-grow-1">
    
    <section class="py-5">
        <div class="row align-items-center g-4">
            <div class="col-lg-4 col-md-5">
                <div class="bg-light rounded p-2 shadow-sm">
                    <img src="{{ asset('images/direktorat-alumni.jpg') }}" 
                         class="img-fluid rounded w-100" 
                         alt="Direktorat Alumni"
                         style="height: 300px; object-fit: cover;">
                </div>
            </div>
            
            <div class="col-lg-8 col-md-7">
                <div class="ps-md-4">
                    <h2 class="fw-bold mb-4 text-dark">Direktorat Alumni</h2>
                    
                    <p class="text-muted mb-4 lh-lg fs-6">
                        Perkembangan media digital yang begitu cepat menuntut kita untuk terus mendapatkan informasi secara cepat dan akurat. Demi menjawab kebutuhan tersebut, Direktorat Alumni menghadirkan website yang berfungsi sebagai media komunikasi dan informasi mengenai, pengembangan karir, hubungan alumni.
                    </p>
                    
                    <div class="bg-light p-4 rounded border-start border-primary border-4">
                        <p class="fw-bold text-dark mb-2">Sasaran Strategis:</p>
                        <p class="text-muted mb-0 lh-lg">
                            Membangun kemitraan strategis melalui Pengembangan Karir Alumni.
                        </p>
                    </div>
                    
                    <div class="mt-4">
                        <a href="/tentang" class="btn btn-primary btn-lg px-4 py-2 rounded-pill">
                            <i class="bi bi-arrow-right-circle me-2"></i>Pelajari Lebih Lanjut
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    @include('Layout.webEssentials.alumni')
@endsection