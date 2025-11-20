@extends('Layout.mainLayout')

@section('title', 'Kontak')

@section('content')

<div class="container py-5">

    <h2 class="fw-bold mb-5">Kontak Kami</h2>

    <div class="row g-5">

        <div class="col-lg-6">

            <div class="d-flex align-items-start mb-4">
                <i class="bi bi-geo-alt fs-3 me-3"></i>
                <div>
                    <h5 class="fw-semibold mb-1">Alamat</h5>
                    <p class="mb-0">
                        Universitas Doktor Nugroho Magetan <br>
                        Jl. Raya, Magetan, Jawa Timur, Indonesia
                    </p>
                </div>
            </div>

            <div class="d-flex align-items-center mb-4">
                <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/whatsapp.svg"
                     width="30" class="me-3">
                <div>
                    <h5 class="fw-semibold mb-1">WhatsApp</h5>
                    <p class="mb-0">0822 3494 1824</p>
                </div>
            </div>

            <div class="d-flex align-items-center mb-4">
                <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/instagram.svg"
                     width="30" class="me-3">
                <div>
                    <h5 class="fw-semibold mb-1">Instagram</h5>
                    <p class="mb-0">@universitasdokternugroho</p>
                </div>
            </div>

            <div class="d-flex align-items-center mb-4">
                <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/line.svg"
                     width="30" class="me-3">
                <div>
                    <h5 class="fw-semibold mb-1">LINE</h5>
                    <p class="mb-0">@UnivDoktorNug</p>
                </div>
            </div>

            <div class="d-flex align-items-start mb-4">
                <i class="bi bi-envelope fs-3 me-3"></i>
                <div>
                    <h5 class="fw-semibold mb-1">Improvement Box</h5>
                    <p class="mb-0">Kirim saran atau masukan ke:</p>
                    <a href="mailto:info@udn.ac.id" class="text-decoration-none fw-semibold">
                        info@udn.ac.id
                    </a>
                </div>
            </div>

        </div>

        <div class="col-lg-6">
            <div class="ratio ratio-4x3 rounded shadow-sm">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.7507539064695!2d111.44435507500313!3d-7.602080992412873!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79956d1574154d%3A0xfbc1fce5fbe9b32f!2sUniversitas%20Doktor%20Nugroho%20Magetan!5e0!3m2!1sid!2sid!4v1763617760749!5m2!1sid!2sid"
                    style="border:0;"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

    </div>
</div>

@endsection
