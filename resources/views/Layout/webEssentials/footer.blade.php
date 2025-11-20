<footer class="position-relative" style="margin-top: 100px;">
    <div class="text-white" style="background: rgba(23, 123, 159, 0.8) url('{{ asset('images/footer-bg.webp') }}') center/cover no-repeat; background-blend-mode: multiply;">
        <div class="container py-5">
            <div class="row gy-4">
                <div class="col-md-4">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-white rounded-circle p-2 me-3" style="width: 90px; height: 90px; display: flex; align-items: center; justify-content: center;">
                            <img src="{{ asset('images/UDN-Logo.png') }}" alt="Universitas Doktor Nugroho" class="img-fluid" style="max-height: 75px; max-width: 75px;">
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0" style="font-size: 1.1rem; line-height: 1.3; text-shadow: 0 2px 4px rgba(0,0,0,0.3);">Universitas Doktor<br>Nugroho</h6>
                        </div>
                    </div>

                    <p class="mb-4" style="font-size: 0.95rem; line-height: 1.6;">
                        Memberdayakan generasi muda dengan pendidikan berkualitas untuk meningkatkan masa depan dan kontribusi kepada masyarakat.
                    </p>
                    
                    <div class="d-flex gap-3 mb-3">
                        <a href="https://facebook.com/universitasdn" target="_blank" class="text-white fs-4"><i class="bi bi-facebook"></i></a>
                        <a href="https://instagram.com/universitasdn" target="_blank" class="text-white fs-4"><i class="bi bi-instagram"></i></a>
                        <a href="https://youtube.com/@universitasdn" target="_blank" class="text-white fs-4"><i class="bi bi-youtube"></i></a>
                    </div>

                    <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" 
                            class="btn btn-outline-light btn-sm px-4 py-2" 
                            style="border-radius: 5px; font-size: 0.85rem;">
                        <i class="bi bi-chevron-double-up me-2"></i>BACK TO TOP
                    </button>
                </div>

                <div class="col-md-4">
                    <h5 class="fw-bold mb-3">Site Map</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="/" class="text-white text-decoration-none" style="font-size: 0.9rem;">Home</a></li>
                        <li class="mb-2"><a href="/alumni" class="text-white text-decoration-none" style="font-size: 0.9rem;">Alumni</a></li>
                        <li class="mb-2"><a href="/program" class="text-white text-decoration-none" style="font-size: 0.9rem;">Program</a></li>
                        <li class="mb-2"><a href="/berita" class="text-white text-decoration-none" style="font-size: 0.9rem;">Berita</a></li>
                        <li class="mb-2"><a href="/kontak" class="text-white text-decoration-none" style="font-size: 0.9rem;">Kontak</a></li>
                        @auth
                        <li class="mb-2"><a href="/profile" class="text-white text-decoration-none" style="font-size: 0.9rem;">Profile</a></li>
                        @else
                        <li class="mb-2"><a href="/login" class="text-white text-decoration-none" style="font-size: 0.9rem;">Login</a></li>
                        @endauth
                    </ul>
                </div>

                <div class="col-md-4">
                    <h5 class="fw-bold mb-3">Contact Us</h5>
                    <div style="font-size: 0.9rem; line-height: 1.8;">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-telephone-fill fs-5 me-3"></i>
                            <a href="tel:08212143122" class="text-white text-decoration-none">08212143122</a>
                        </div>
                        
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-envelope-fill fs-5 me-3"></i>
                            <a href="mailto:info@universitasdn.ac.id" class="text-white text-decoration-none">info@universitasdn.ac.id</a>
                        </div>
                        
                        <div class="d-flex align-items-start">
                            <i class="bi bi-geo-alt-fill fs-5 me-3" style="margin-top: 2px;"></i>
                            <div>
                                Jl. Sendang Kamal, No. 50<br>
                                Kelurahan Kraton, Kec. Maospati<br>
                                Kabupaten Magetan<br>
                                Jam Operasional: 08.00-16.00
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center py-3" style="background-color: rgba(23, 123, 159, 1);">
        <p class="text-white small mb-0">
            Copyright © 2025 Universitas Doktor Nugroho Magetan. All Rights Reserved.
        </p>
    </div>
</footer>