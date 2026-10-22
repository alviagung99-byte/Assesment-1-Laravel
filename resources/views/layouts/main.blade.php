<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#f5f7f0">
    <title>@yield('title', 'AgriVision Garut') | AgriVision Garut</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="site-shell">
        <header class="site-header">
            <a class="brand" href="{{ route('home') }}" aria-label="AgriVision Garut, beranda">
                <span class="brand-mark" aria-hidden="true">A</span>
                <span class="brand-copy">
                    <strong>AgriVision</strong>
                    <small>Kabupaten Garut</small>
                </span>
            </a>
            @include('partials.navbar')
            <a class="header-cta" href="{{ route('deteksi') }}">
                <span aria-hidden="true">＋</span> Catat deteksi
            </a>
        </header>

        <main id="konten-utama">
            @yield('content')
        </main>

        <footer class="site-footer">
            <a class="footer-brand" href="{{ route('home') }}">AgriVision <span>Garut</span></a>
            <p>© 2026 AgriVision · Kelompok Tani Makmur Kabupaten Garut</p>
            <a href="{{ route('tentang') }}">Tentang sistem <span aria-hidden="true">↗</span></a>
        </footer>
    </div>
</body>
</html>
