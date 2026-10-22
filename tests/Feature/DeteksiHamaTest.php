<?php

namespace Tests\Feature;

use App\Models\DeteksiHama;
use Database\Seeders\DeteksiHamaSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeteksiHamaTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutVite();
    }

    public function test_main_pages_and_form_are_available(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Selamat Datang di AgriVision Garut')
            ->assertSee('Dashboard');

        $this->get(route('tentang'))
            ->assertOk()
            ->assertSee('EfficientNet-B0')
            ->assertSee('Tarogong Kaler');

        $this->get(route('deteksi'))
            ->assertOk()
            ->assertSee('name="confidence_score"', false)
            ->assertSee('name="_token"', false);
    }

    public function test_detection_is_validated_classified_saved_and_shown(): void
    {
        $this->post(route('hasil-deteksi'), [
            'lokasi' => 'Garut Kota',
            'nama_tanaman' => 'Padi',
            'jenis_hama' => 'Wereng Cokelat',
            'confidence_score' => 80,
            'tingkat_kerusakan' => 25.5,
        ])
            ->assertOk()
            ->assertSee('Indikasi Hama')
            ->assertSee('Lakukan pemantauan intensif')
            ->assertSee('25,5%');

        $this->assertDatabaseHas('deteksi_hama', [
            'lokasi' => 'Garut Kota',
            'confidence_score' => 80,
            'status_deteksi' => 'Indikasi Hama',
        ]);
    }

    public function test_confidence_score_boundaries_select_the_expected_status(): void
    {
        foreach ([
            [49, 'Tidak Pasti'],
            [50, 'Indikasi Hama'],
            [80, 'Indikasi Hama'],
            [81, 'Hama Terkonfirmasi'],
        ] as [$score, $status]) {
            $this->post(route('hasil-deteksi'), [
                'lokasi' => 'Samarang',
                'nama_tanaman' => 'Cabai',
                'jenis_hama' => 'Kutu Daun',
                'confidence_score' => $score,
                'tingkat_kerusakan' => 10,
            ])->assertOk()->assertSee($status);
        }

        $this->assertDatabaseCount('deteksi_hama', 4);
    }

    public function test_invalid_form_values_are_rejected(): void
    {
        $this->from(route('deteksi'))->post(route('hasil-deteksi'), [
            'lokasi' => 'Bandung',
            'nama_tanaman' => 'Padi',
            'jenis_hama' => 'Wereng Cokelat',
            'confidence_score' => 101,
            'tingkat_kerusakan' => -1,
        ])->assertSessionHasErrors(['lokasi', 'confidence_score', 'tingkat_kerusakan']);

        $this->assertDatabaseCount('deteksi_hama', 0);
    }

    public function test_history_lists_saved_records_and_recommendations(): void
    {
        DeteksiHama::create([
            'lokasi' => 'Tarogong Kaler',
            'nama_tanaman' => 'Jagung',
            'jenis_hama' => 'Ulat Grayak',
            'confidence_score' => 90,
            'tingkat_kerusakan' => 35,
            'status_deteksi' => 'Hama Terkonfirmasi',
        ]);

        $this->get(route('riwayat'))
            ->assertOk()
            ->assertSee('Tarogong Kaler')
            ->assertSee('Ulat Grayak')
            ->assertSee('Hama Terkonfirmasi')
            ->assertSee('Segera lakukan pengendalian hama');
    }

    public function test_faker_seeder_creates_at_least_fifteen_records_with_each_status(): void
    {
        $this->seed(DeteksiHamaSeeder::class);

        $this->assertDatabaseCount('deteksi_hama', 15);
        $this->assertDatabaseHas('deteksi_hama', ['status_deteksi' => 'Tidak Pasti']);
        $this->assertDatabaseHas('deteksi_hama', ['status_deteksi' => 'Indikasi Hama']);
        $this->assertDatabaseHas('deteksi_hama', ['status_deteksi' => 'Hama Terkonfirmasi']);
    }
}
