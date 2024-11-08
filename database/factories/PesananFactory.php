<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\pesanan>
 */
class PesananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_menu' => $this->faker->uuid(),
            'nama_pemesan' => $this->faker->firstName(),
            'keterangan' => $this->faker->text(),
            'status_pesanan' => $this->faker->randomElement(['selesai', 'baru disiapkan', 'pesanan masuk']),
        ];
    }
}
