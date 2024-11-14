<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use FakerRestaurant\Provider\id_ID\Restaurant;

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
        $this->faker->addProvider(new Restaurant($this->faker));

        return [
            'id_pesanan' => $this->faker->unique()->bothify('ID-######'),
            'nama_menu' => $this->faker->foodName(),
            'nama_pemesan' => $this->faker->firstName() . ' ' . $this->faker->lastName(),
            'keterangan' => $this->faker->realText(50), 
            'status_pesanan' => $this->faker->randomElement(['Selesai', 'Proses', 'Baru']),
        ];
    }
}
