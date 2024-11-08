<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_menu' => $this->faker->word(),
            'keterangan' => $this->faker->text(),
            'harga' => $this->faker->randomFloat(2, 5, 100),
        ];
    }
}