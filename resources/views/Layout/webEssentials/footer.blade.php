<footer>
    <div class="py-5 text-center bg-light">
        <h2 class="fw-bold mb-4">Kerjasama</h2>
        <div class="position-relative d-flex justify-content-center">
            <div id="kerjasamaCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000" style="width: 300px;">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="d-flex justify-content-center align-items-center" style="height: 150px;">
                            <img src="{{ asset('images/kerjasama/Partner_ITICM.png') }}" class="img-fluid" alt="Partner ITICM" style="max-height: 120px; max-width: 250px; object-fit: contain;">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-flex justify-content-center align-items-center" style="height: 150px;">
                            <img src="{{ asset('images/kerjasama/Partner_MR.webp') }}" class="img-fluid" alt="Partner MR" style="max-height: 120px; max-width: 250px; object-fit: contain;">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-flex justify-content-center align-items-center" style="height: 150px;">
                            <img src="{{ asset('images/kerjasama/Partner_UNPAM.webp') }}" class="img-fluid" alt="Partner UNPAM" style="max-height: 120px; max-width: 250px; object-fit: contain;">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-flex justify-content-center align-items-center" style="height: 150px;">
                            <img src="{{ asset('images/kerjasama/Partner_UNY.webp') }}" class="img-fluid" alt="Partner UNY" style="max-height: 120px; max-width: 250px; object-fit: contain;">
                        </div>
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#kerjasamaCarousel" data-bs-slide="prev" style="width: 50px; left: -60px;">
                    <span class="carousel-control-prev-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#kerjasamaCarousel" data-bs-slide="next" style="width: 50px; right: -60px;">
                    <span class="carousel-control-next-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

    <div class="text-white position-relative" style="background: rgba(23, 123, 159, 0.8) url('{{ asset('images/footer-bg.webp') }}') center/cover no-repeat; background-blend-mode: multiply;">
        <!-- Logo -->
        <div class="position-absolute" style="top: -60px; left: 50px; z-index: 10;">
            <div class="bg-white rounded-circle p-3" style="width: 120px; height: 120px; display: flex; align-items: center; justify-content: center;">
                <img src="{{ asset('images/UDN-Logo.png') }}" alt="Universitas Dokter Nugroho" class="img-fluid" style="max-height: 160px; max-width: 160px;">
            </div>
        </div>

        <div class="container py-5">
            <div class="row gy-4 align-items-center">
                <div class="col-md-8 offset-md-2 text-center text-md-start">
                    <h2 class="fw-bold mb-3" style="margin-left: 120px;">Contact us</h2>
                    <div style="margin-left: 120px;">
                        <p class="mb-1"><i class="bi bi-telephone-fill me-2"></i>08212143122</p>
                        <p class="mb-1"><i class="bi bi-envelope-fill me-2"></i>info@universitasdn.ac.id</p>
                        <p class="mb-1"><i class="bi bi-geo-alt-fill me-2"></i>Jl. Sendang Kamal, No. 50 Kelurahan Kraton, Kecamatan Maospati, Kabupaten Magetan 08.00-16.00</p>
                    </div>
                </div>

                <div class="col-md-4 text-center text-md-end">
                    <div class="d-flex justify-content-center justify-content-md-end gap-3 mb-3">
                        <a href="#" class="text-white fs-4"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white fs-4"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-white fs-4"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <p class="small mb-0">Copyright © 2025 Universitas Doktor Nugroho Magetan All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
