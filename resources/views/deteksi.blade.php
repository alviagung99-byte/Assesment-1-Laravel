@extends('layouts.main')

@section('title', 'Input Deteksi')

@section('content')
    <section class="page-heading compact-heading">
        <span class="eyebrow">FORMULIR PENGAMATAN</span>
        <h1>Catat hasil <span>deteksi hama.</span></h1>
        <p>Masukkan hasil prediksi secara manual. Semua kolom wajib diisi untuk menyimpan catatan.</p>
    </section>

    <section class="form-layout">
        <form class="detection-form" action="{{ route('hasil-deteksi') }}" method="POST">
            @csrf
            <div class="form-section-title"><span class="form-step">01</span><div><h2>Informasi lahan</h2><p>Tentukan lokasi dan tanaman yang diamati.</p></div></div>
            <div class="form-grid">
                <div class="form-field">
                    <label for="lokasi">Lokasi lahan <span>*</span></label>
                    <select id="lokasi" name="lokasi" required>
                        <option value="">Pilih lokasi</option>
                        @foreach (['Garut Kota', 'Tarogong Kaler', 'Samarang'] as $lokasi)
                            <option value="{{ $lokasi }}" @selected(old('lokasi') === $lokasi)>{{ $lokasi }}</option>
                        @endforeach
                    </select>
                    @error('lokasi') <small class="field-error">{{ $message }}</small> @enderror
                </div>
                <div class="form-field">
                    <label for="nama_tanaman">Nama tanaman <span>*</span></label>
                    <select id="nama_tanaman" name="nama_tanaman" required>
                        <option value="">Pilih tanaman</option>
                        @foreach (['Padi', 'Jagung', 'Cabai'] as $tanaman)
                            <option value="{{ $tanaman }}" @selected(old('nama_tanaman') === $tanaman)>{{ $tanaman }}</option>
                        @endforeach
                    </select>
                    @error('nama_tanaman') <small class="field-error">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="form-divider"></div>
            <div class="form-section-title"><span class="form-step">02</span><div><h2>Hasil prediksi</h2><p>Isi hama, tingkat keyakinan, dan kondisi daun.</p></div></div>
            <div class="form-field">
                <label for="jenis_hama">Jenis hama hasil prediksi <span>*</span></label>
                <select id="jenis_hama" name="jenis_hama" required>
                    <option value="">Pilih jenis hama</option>
                    @foreach (['Wereng Cokelat', 'Ulat Grayak', 'Kutu Daun'] as $hama)
                        <option value="{{ $hama }}" @selected(old('jenis_hama') === $hama)>{{ $hama }}</option>
                    @endforeach
                </select>
                @error('jenis_hama') <small class="field-error">{{ $message }}</small> @enderror
            </div>
            <div class="form-grid">
                <div class="form-field">
                    <label for="confidence_score">Confidence score <span>*</span></label>
                    <div class="input-suffix"><input id="confidence_score" name="confidence_score" type="number" min="0" max="100" step="1" value="{{ old('confidence_score') }}" placeholder="Contoh: 85" required><span>%</span></div>
                    <small class="field-hint">Nilai prediksi model, dari 0 hingga 100.</small>
                    @error('confidence_score') <small class="field-error">{{ $message }}</small> @enderror
                </div>
                <div class="form-field">
                    <label for="tingkat_kerusakan">Tingkat kerusakan daun <span>*</span></label>
                    <div class="input-suffix"><input id="tingkat_kerusakan" name="tingkat_kerusakan" type="number" min="0" max="100" step="0.1" value="{{ old('tingkat_kerusakan') }}" placeholder="Contoh: 25.5" required><span>%</span></div>
                    <small class="field-hint">Perkiraan luas daun terdampak.</small>
                    @error('tingkat_kerusakan') <small class="field-error">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="form-note" id="confidence-guidance" aria-live="polite"><span aria-hidden="true">ⓘ</span> Status dan rekomendasi ditentukan otomatis dari confidence score.</div>
            <div class="form-actions"><a class="button button-quiet" href="{{ route('home') }}">Batal</a><button class="button button-primary" type="submit">Simpan &amp; lihat hasil <span aria-hidden="true">→</span></button></div>
        </form>

        <aside class="form-aside">
            <div class="aside-illustration"><div class="aside-leaf"></div><span class="aside-spark">✳</span></div>
            <span class="eyebrow">PANDUAN STATUS</span>
            <h2>Kenali tingkat keyakinan prediksi.</h2>
            <ul class="status-guide">
                <li><span class="status-pill uncertain">Di bawah 50%</span><span>Tidak Pasti<small>Perlu verifikasi manual</small></span></li>
                <li><span class="status-pill warning">50–80%</span><span>Indikasi Hama<small>Pantau secara intensif</small></span></li>
                <li><span class="status-pill confirmed">Di atas 80%</span><span>Hama Terkonfirmasi<small>Segera lakukan pengendalian</small></span></li>
            </ul>
            <p class="aside-footnote">Hasil merupakan simulasi praktikum, bukan diagnosis otomatis dari foto.</p>
        </aside>
    </section>
@endsection
