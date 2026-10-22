@extends('layouts.main')

@section('title', 'Tentang Sistem')

@section('content')
    <section class="page-heading">
        <span class="eyebrow">TENTANG AGRIVISION GARUT</span>
        <h1>Teknologi untuk pertanian<br><span>yang lebih tangguh.</span></h1>
        <p>Kenali tujuan, cakupan wilayah, dan informasi yang dicatat oleh sistem deteksi hama tanaman.</p>
    </section>

    <section class="about-layout">
        <article class="about-card about-purpose">
            <span class="feature-icon icon-leaf">✳</span>
            <span class="eyebrow">TUJUAN SISTEM</span>
            <h2>Membantu petani bertindak lebih cepat dan terukur.</h2>
            <p>AgriVision Garut dirancang untuk membantu Kelompok Tani Makmur mencatat hasil identifikasi hama, memantau tingkat kerusakan daun, serta menyusun rekomendasi penanganan berdasarkan confidence score.</p>
            <p>Prototipe ini mensimulasikan hasil prediksi secara manual. Sistem tidak mengunggah foto dan belum terhubung langsung dengan model klasifikasi.</p>
        </article>
        <article class="about-card">
            <span class="eyebrow">CAKUPAN PENGAMATAN</span>
            <h2>Wilayah deteksi</h2>
            <p>Catatan pengamatan dapat dikelompokkan berdasarkan lokasi lahan di Kabupaten Garut.</p>
            <ul class="location-list">
                <li><span class="location-pin">⌖</span><span><strong>Garut Kota</strong><small>Kecamatan Garut Kota</small></span></li>
                <li><span class="location-pin">⌖</span><span><strong>Tarogong Kaler</strong><small>Kecamatan Tarogong Kaler</small></span></li>
                <li><span class="location-pin">⌖</span><span><strong>Samarang</strong><small>Kecamatan Samarang</small></span></li>
            </ul>
        </article>
    </section>

    <section class="data-section">
        <div class="section-heading"><div><span class="eyebrow">INFORMASI YANG DICATAT</span><h2>Setiap hasil punya konteks.</h2></div></div>
        <div class="data-grid">
            <article class="data-card"><span class="data-icon">⌁</span><h3>Jenis hama</h3><p>Hama yang dikenali pada tanaman, seperti Wereng Cokelat, Ulat Grayak, atau Kutu Daun.</p></article>
            <article class="data-card"><span class="data-icon">％</span><h3>Confidence score</h3><p>Nilai keyakinan prediksi model, dicatat dalam rentang 0 sampai 100 persen.</p></article>
            <article class="data-card"><span class="data-icon">◉</span><h3>Kerusakan daun</h3><p>Perkiraan tingkat kerusakan daun untuk membantu memahami kondisi tanaman.</p></article>
        </div>
    </section>

    <section class="model-banner">
        <div class="model-symbol">E<span>·</span>B0</div>
        <div><span class="eyebrow">MODEL KLASIFIKASI</span><h2>EfficientNet-B0</h2><p>Model computer vision untuk klasifikasi citra tanaman. Pada praktikum ini, hasil prediksi model disimulasikan dengan input manual.</p></div>
    </section>
@endsection
