<?php

namespace Tests\Feature;

use App\Models\Kendaraan;
use GrahamCampbell\ResultType\Success;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KendaraanTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function testGetKendaraan()
    {
        $kendaraan = Kendaraan::factory()->create();
        $response = $this->get('/kendaraan');

        $response->assertStatus(200)
            ->assertJson([
                'status' => 'success',
                'data' => [
                    'tahun' => $kendaraan->tahun_keluaran,
                    'warna' => $kendaraan->warna,
                    'harga' => $kendaraan->harga
                ]
            ]);
    }
}
