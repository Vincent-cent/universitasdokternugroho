<section class="alumni-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <div class="d-flex align-items-center justify-content-center mb-3">
                <div class="alumni-line bg-danger me-3" style="width: 300px; height: 4px;"></div>
                <h2 class="fw-bold mb-0 fs-1 text-dark">Notable Alumni</h2>
                <div class="alumni-line bg-danger ms-3" style="width: 300px; height: 4px;"></div>
            </div>
            <p class="text-muted fs-5 mb-0">Dari Tali Silaturahmi, Tumbuh Ide Inovatif, Terwujud Kemajuan Bersama.</p>
        </div>

        <div class="row g-5 justify-content-center">
            @php
                $featuredAlumni = \App\Models\Alumni::whereIn('name', ['Jefrison Laoe', 'Syukur Dhamiani', 'Hansi Muler'])
                    ->get()
                    ->sortBy(function($alumni) {
                        $order = ['Jefrison Laoe' => 1, 'Syukur Dhamiani' => 2, 'Hansi Muler' => 3];
                        return $order[$alumni->name] ?? 999;
                    });
            @endphp

            @foreach($featuredAlumni as $alumni)
            <div class="col-lg-4 col-md-6">
                <a href="/alumni/{{ $alumni->id }}" class="text-decoration-none">
                    <div class="text-center alumni-card" style="cursor: pointer; transition: transform 0.3s ease;">
                        <div class="alumni-circle-wrapper mb-4 mx-auto" style="width: 280px; height: 280px; overflow: hidden;">
                            @if (!empty($alumni->photo) && file_exists(public_path('images/alumni/' . $alumni->photo)))
                                <img src="{{ asset('images/alumni/' . $alumni->photo) }}" 
                                     class="rounded-circle shadow-lg" 
                                     alt="{{ $alumni->name }}"
                                     style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;">
                            @else
                                <img src="{{ asset('placeholder.jpg') }}" 
                                     class="rounded-circle shadow-lg" 
                                     alt="{{ $alumni->name }}"
                                     style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;">
                            @endif
                        </div>
                        <h5 class="fw-bold mb-2 text-dark">{{ $alumni->name }}</h5>
                        <p class="text-warning fw-bold mb-3">{{ $alumni->work_main }} - {{ $alumni->angkatan }}</p>
                        <p class="text-muted px-3" style="font-size: 0.95rem; line-height: 1.6;">
                            "{{ Str::limit($alumni->about, 150) }}"
                        </p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
.alumni-card:hover {
    transform: translateY(-10px);
}

.alumni-card:hover img {
    transform: scale(1.05);
}
</style>