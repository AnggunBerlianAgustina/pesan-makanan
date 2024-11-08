<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\pembayaran>
 */
class PembayaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_menu' => $this->faker->uuid(),
            'no_pesanan' => $this->faker->uuid(),
            'nama_pemesan' => $this->faker->firstName(),
            'jumlah_pembayaran' => $this->faker->numberBetween($min = 30000, $max = 1000000),
            'status' => $this->faker->randomElement(['lunas', 'belum lunas']),
        ];
    }
}
