<nav class="main-nav" aria-label="Navigasi utama">
    <a href="{{ route('home') }}" @class(['active' => request()->routeIs('home')]) @if(request()->routeIs('home')) aria-current="page" @endif>
        <span class="nav-icon" aria-hidden="true">⌂</span> Dashboard
    </a>
    <a href="{{ route('tentang') }}" @class(['active' => request()->routeIs('tentang')]) @if(request()->routeIs('tentang')) aria-current="page" @endif>
        <span class="nav-icon" aria-hidden="true">ⓘ</span> Tentang
    </a>
    <a href="{{ route('deteksi') }}" @class(['active' => request()->routeIs('deteksi', 'hasil-deteksi')]) @if(request()->routeIs('deteksi', 'hasil-deteksi')) aria-current="page" @endif>
        <span class="nav-icon" aria-hidden="true">＋</span> Input Deteksi
    </a>
    <a href="{{ route('riwayat') }}" @class(['active' => request()->routeIs('riwayat')]) @if(request()->routeIs('riwayat')) aria-current="page" @endif>
        <span class="nav-icon" aria-hidden="true">◷</span> Riwayat Deteksi
    </a>
</nav>
