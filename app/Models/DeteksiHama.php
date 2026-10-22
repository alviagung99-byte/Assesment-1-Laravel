<?php

namespace App\Models;

use App\Support\DeteksiHamaStatus;
use Illuminate\Database\Eloquent\Model;

class DeteksiHama extends Model
{
    protected $table = 'deteksi_hama';

    protected $fillable = [
        'lokasi',
        'nama_tanaman',
        'jenis_hama',
        'confidence_score',
        'tingkat_kerusakan',
        'status_deteksi',
    ];

    protected function casts(): array
    {
        return [
            'confidence_score' => 'integer',
            'tingkat_kerusakan' => 'float',
        ];
    }

    public function getRekomendasiAttribute(): string
    {
        return DeteksiHamaStatus::recommendationFor($this->status_deteksi);
    }
}
