<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Detail Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light text-dark">
    <header class="py-3 border-bottom">
        <div class="container">
            <a href="/berita" class="btn btn-outline-secondary" aria-label="Kembali">
                ← Kembali
            </a>
        </div>
    </header>

    <main>
        <article class="container py-4" aria-labelledby="judul-berita">
            <h1 id="judul-berita" class="fw-bold mb-2">{{ $berita['title'] }}</h1>
            <p class="text-muted mb-4">{{ $berita['author'] }} · {{ $berita['published_at'] }}</p>

            <div class="card mb-4">
                <img src="{{ asset('storage/' . $berita['image']) }}" class="card-img-top"
                    alt="Gambar berita placeholder">
                <div class="card-footer text-muted small">{{ $berita['keterangan_gambar'] }}</div>
            </div>

            <section class="mb-4">
                <p><strong></strong> {{ $berita['content'] }}</p>
            </section>
        </article>
    </main>

    <footer class="border-top py-3">
        <div class="container text-end text-muted small">
            {{ $berita['author'] }} · {{ $berita['published_at'] }}
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
