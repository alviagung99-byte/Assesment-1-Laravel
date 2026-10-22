@extends('layouts.main')

@section('title', 'Hasil Deteksi')

@section('content')
    <section class="result-heading">
        <div class="result-check" aria-hidden="true">✓</div>
        <span class="eyebrow">PENCATATAN BERHASIL</span>
        <h1>Hasil deteksi <span>tersimpan.</span></h1>
        <p>Berikut ringkasan pengamatan hama yang baru saja dicatat.</p>
    </section>

    <section class="result-card">
        <div class="result-status-row">
            <div><span class="eyebrow">HASIL PENGAMATAN</span><h2 class="status-text">Confidence score</h2></div>
            <span class="confidence-badge">{{ $deteksi->confidence_score }}<small>%</small></span>
        </div>
        <div class="confidence-track"><span style="width: {{ $deteksi->confidence_score }}%"></span></div>

        <div class="result-divider"></div>
        <h3>Detail pengamatan</h3>
        <div class="result-table-wrap">
            <table class="result-table">
                <tbody>
                    <tr><th>Lokasi lahan</th><td>{{ $deteksi->lokasi }}</td></tr>
                    <tr><th>Nama tanaman</th><td>{{ $deteksi->nama_tanaman }}</td></tr>
                    <tr><th>Jenis hama</th><td>{{ $deteksi->jenis_hama }}</td></tr>
                    <tr><th>Confidence score</th><td>{{ $deteksi->confidence_score }}%</td></tr>
                    <tr><th>Tingkat kerusakan daun</th><td>{{ number_format($deteksi->tingkat_kerusakan, 1, ',', '.') }}%</td></tr>
                    <tr><th>Status deteksi</th><td>
                        @if ($deteksi->status_deteksi === 'Tidak Pasti')
                            <span class="table-status uncertain">{{ $deteksi->status_deteksi }}</span>
                        @elseif ($deteksi->status_deteksi === 'Indikasi Hama')
                            <span class="table-status warning">{{ $deteksi->status_deteksi }}</span>
                        @else
                            <span class="table-status confirmed">{{ $deteksi->status_deteksi }}</span>
                        @endif
                    </td></tr>
                    <tr><th>Rekomendasi penanganan</th><td>{{ $deteksi->rekomendasi }}</td></tr>
                    <tr><th>Waktu pencatatan</th><td>{{ $deteksi->created_at->format('d M Y, H:i') }}</td></tr>
                </tbody>
            </table>
        </div>
        <div class="result-actions"><a class="button button-quiet" href="{{ route('riwayat') }}">Lihat riwayat</a><a class="button button-primary" href="{{ route('deteksi') }}">Catat deteksi lain <span aria-hidden="true">→</span></a></div>
    </section>
@endsection
