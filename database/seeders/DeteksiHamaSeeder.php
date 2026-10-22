<?php

namespace Database\Seeders;

use App\Models\DeteksiHama;
use App\Support\DeteksiHamaStatus;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;

class DeteksiHamaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = FakerFactory::create('id_ID');
        $rentangConfidence = [
            [30, 49],
            [50, 80],
            [81, 99],
        ];

        foreach (range(1, 15) as $index) {
            [$minimum, $maksimum] = $rentangConfidence[($index - 1) % count($rentangConfidence)];
            $confidence = $faker->numberBetween($minimum, $maksimum);

            DeteksiHama::create([
                'lokasi' => $faker->randomElement(['Garut Kota', 'Tarogong Kaler', 'Samarang']),
                'nama_tanaman' => $faker->randomElement(['Padi', 'Jagung', 'Cabai']),
                'jenis_hama' => $faker->randomElement(['Wereng Cokelat', 'Ulat Grayak', 'Kutu Daun']),
                'confidence_score' => $confidence,
                'tingkat_kerusakan' => $faker->randomFloat(1, 0, 80),
                'status_deteksi' => DeteksiHamaStatus::fromConfidenceScore($confidence),
            ]);
        }
    }
}
