<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Kendaraan;

class KendaraanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Kendaraan::class;

    public function definition()
    {
        return [
            'tahun_keluaran' => $this->faker->numberBetween(1990, 2023),
            'warna' => $this->faker->safeColorName(),
            'harga' => $this->faker->numberBetween(10000000, 500000000),
            'type' => $this->faker->randomElement(['motor', 'mobil']),
            'mesin' => $this->faker->randomElement(['100cc', '150cc', '200cc', '300cc']),
            'tipe_suspensi' => $this->faker->randomElement(['inverted', 'conventional']),
            'tipe_transmisi' => $this->faker->randomElement(['manual', 'automatic']),
            'kapasitas_penumpang' => $this->faker->numberBetween(2, 10)
        ];
    }

    public function motor()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'motor',
                'mesin' => $this->faker->randomElement(['100cc', '150cc', '200cc', '300cc']),
                'tipe_suspensi' => $this->faker->randomElement(['inverted', 'conventional']),
                'tipe_transmisi' => $this->faker->randomElement(['manual', 'otomatis']),
                'kapasitas_penumpang' => null
            ];
        });
    }

    public function mobil()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'mobil',
                'mesin' => $this->faker->randomElement(['1000cc', '1300cc', '1500cc', '2000cc']),
                'tipe_suspensi' => null,
                'tipe_transmisi' => $this->faker->randomElement(['manual', 'otomatis']),
                'kapasitas_penumpang' => $this->faker->numberBetween(2, 10)
            ];
        });
    }
}
