<?php

namespace App\Support;

use InvalidArgumentException;

class DeteksiHamaStatus
{
    public static function fromConfidenceScore(int $score): string
    {
        return match (true) {
            $score < 50 => 'Tidak Pasti',
            $score <= 80 => 'Indikasi Hama',
            default => 'Hama Terkonfirmasi',
        };
    }

    public static function recommendationFor(string $status): string
    {
        return match ($status) {
            'Tidak Pasti' => 'Perlu verifikasi manual oleh petugas.',
            'Indikasi Hama' => 'Lakukan pemantauan intensif.',
            'Hama Terkonfirmasi' => 'Segera lakukan pengendalian hama.',
            default => throw new InvalidArgumentException("Status deteksi tidak dikenal: {$status}"),
        };
    }
}
