<?php

namespace App\Http\Controllers;

use App\Models\DeteksiHama;
use App\Support\DeteksiHamaStatus;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DeteksiController extends Controller
{
    public function form(): View
    {
        return view('deteksi');
    }

    public function prosesData(Request $request): View
    {
        $data = $request->validate([
            'lokasi' => ['required', 'in:Garut Kota,Tarogong Kaler,Samarang'],
            'nama_tanaman' => ['required', 'in:Padi,Jagung,Cabai'],
            'jenis_hama' => ['required', 'in:Wereng Cokelat,Ulat Grayak,Kutu Daun'],
            'confidence_score' => ['required', 'integer', 'between:0,100'],
            'tingkat_kerusakan' => ['required', 'numeric', 'between:0,100'],
        ]);

        $data['status_deteksi'] = DeteksiHamaStatus::fromConfidenceScore(
            (int) $data['confidence_score']
        );

        $deteksi = DeteksiHama::create($data);

        return view('hasil', compact('deteksi'));
    }

    public function riwayat(): View
    {
        return view('riwayat', [
            'deteksiHama' => DeteksiHama::query()->latest()->get(),
        ]);
    }
}
