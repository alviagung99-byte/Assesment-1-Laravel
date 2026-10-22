@extends('layouts.main')

@section('title', 'Riwayat Deteksi')

@section('content')
    <section class="history-heading">
        <div><span class="eyebrow">ARSIP PENGAMATAN</span><h1>Riwayat <span>deteksi hama.</span></h1><p>Semua catatan pengamatan tersimpan dan dapat ditinjau kembali.</p></div>
        <a class="button button-primary" href="{{ route('deteksi') }}">＋ Catat deteksi</a>
    </section>

    <section class="history-summary">
        <span class="summary-mark">◷</span><div><strong>{{ $deteksiHama->count() }}</strong><span>catatan tersimpan</span></div>
        <p>Data disusun dari catatan terbaru.</p>
    </section>

    <section class="history-table-card">
        @if ($deteksiHama->isEmpty())
            <div class="empty-state"><span>⌁</span><h2>Belum ada catatan deteksi</h2><p>Mulai dengan mencatat hasil pengamatan hama di lahan.</p><a class="button button-primary" href="{{ route('deteksi') }}">Buat catatan pertama</a></div>
        @else
            <div class="table-scroll">
                <table class="history-table">
                    <thead><tr><th>Waktu</th><th>Lokasi / Tanaman</th><th>Hama</th><th>Confidence</th><th>Kerusakan</th><th>Status deteksi</th></tr></thead>
                    <tbody>
                        @foreach ($deteksiHama as $deteksi)
                            <tr>
                                <td class="date-cell">{{ $deteksi->created_at->format('d M Y') }}<small>{{ $deteksi->created_at->format('H:i') }}</small></td>
                                <td><strong>{{ $deteksi->lokasi }}</strong><small>{{ $deteksi->nama_tanaman }}</small></td>
                                <td>{{ $deteksi->jenis_hama }}</td>
                                <td><strong>{{ $deteksi->confidence_score }}%</strong></td>
                                <td>{{ number_format($deteksi->tingkat_kerusakan, 1, ',', '.') }}%</td>
                                <td>
                                    @if ($deteksi->status_deteksi === 'Tidak Pasti')
                                        <span class="table-status uncertain">{{ $deteksi->status_deteksi }}</span>
                                    @elseif ($deteksi->status_deteksi === 'Indikasi Hama')
                                        <span class="table-status warning">{{ $deteksi->status_deteksi }}</span>
                                    @else
                                        <span class="table-status confirmed">{{ $deteksi->status_deteksi }}</span>
                                    @endif
                                    <small class="table-recommendation">{{ $deteksi->rekomendasi }}</small>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
@endsection
