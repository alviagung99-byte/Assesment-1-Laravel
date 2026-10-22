@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <section class="hero">
        <div class="hero-copy">
            <span class="eyebrow"><span class="status-dot"></span> PERTANIAN LEBIH SIAP, PANEN LEBIH TERJAGA</span>
            <h1>Kenali ancaman.<br><span>Jaga setiap panen.</span></h1>
            <p class="hero-lead">Selamat Datang di AgriVision Garut — Sistem Deteksi Hama Tanaman Berbasis Computer Vision.</p>
            <p class="hero-description">Catat hasil pengamatan hama, pantau tingkat kerusakan daun, dan tentukan langkah penanganan yang lebih cepat untuk lahan pertanian di Kabupaten Garut.</p>
            <div class="hero-actions">
                <a class="button button-primary" href="{{ route('deteksi') }}">Mulai pencatatan <span aria-hidden="true">→</span></a>
                <a class="button button-quiet" href="{{ route('tentang') }}">Kenali sistem</a>
            </div>
            <div class="hero-note"><span aria-hidden="true">✳</span> Simulasi pencatatan manual · Model EfficientNet-B0</div>
        </div>
        <div class="hero-art" aria-label="Ilustrasi daun tanaman sehat">
            <div class="art-glow"></div>
            <div class="art-orbit orbit-one"></div>
            <div class="art-orbit orbit-two"></div>
            <div class="art-leaf"><span></span></div>
            <div class="art-card art-card-top"><span class="art-check">✓</span><span><strong>Analisis tanaman</strong><small>Pantau kondisi daun</small></span></div>
            <div class="art-card art-card-bottom"><span class="mini-chart"><i></i><i></i><i></i><i></i><i></i></span><span><strong>Data lebih terarah</strong><small>Garut, Jawa Barat</small></span></div>
            <span class="art-spark spark-one">✳</span><span class="art-spark spark-two">✦</span>
        </div>
    </section>

    <section class="intro-strip">
        <div class="intro-icon">⌖</div>
        <div>
            <span class="eyebrow">DIBUAT UNTUK PETANI GARUT</span>
            <h2>Informasi lapangan, tersimpan rapi.</h2>
        </div>
        <p>AgriVision membantu Kelompok Tani Makmur mendokumentasikan hasil deteksi dari satu musim ke musim berikutnya.</p>
    </section>

    <section class="feature-section">
        <div class="section-heading">
            <div><span class="eyebrow">ALUR YANG SEDERHANA</span><h2>Dari pengamatan jadi tindakan.</h2></div>
            <a class="text-link" href="{{ route('tentang') }}">Pelajari lebih lanjut <span aria-hidden="true">→</span></a>
        </div>
        <div class="feature-grid">
            <article class="feature-card">
                <span class="feature-number">01</span><div class="feature-icon icon-leaf">✳</div>
                <h3>Catat kondisi tanaman</h3><p>Masukkan lokasi, tanaman, jenis hama, dan tingkat kerusakan daun yang diamati.</p>
            </article>
            <article class="feature-card">
                <span class="feature-number">02</span><div class="feature-icon icon-scan">◎</div>
                <h3>Simulasikan deteksi</h3><p>Tambahkan confidence score hasil prediksi model klasifikasi EfficientNet-B0.</p>
            </article>
            <article class="feature-card">
                <span class="feature-number">03</span><div class="feature-icon icon-chart">↗</div>
                <h3>Tentukan tindak lanjut</h3><p>Lihat tingkat kepastian, rekomendasi, dan riwayat serangan dalam satu tempat.</p>
            </article>
        </div>
    </section>

    <section class="home-cta">
        <div><span class="eyebrow">SIAP MULAI?</span><h2>Satu catatan kecil bisa melindungi banyak tanaman.</h2></div>
        <a class="button button-light" href="{{ route('deteksi') }}">Buat catatan deteksi <span aria-hidden="true">→</span></a>
        <span class="cta-decoration" aria-hidden="true">✳</span>
    </section>
@endsection
