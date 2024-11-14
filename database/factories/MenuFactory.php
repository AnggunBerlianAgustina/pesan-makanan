<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use FakerRestaurant\Provider\id_ID\Restaurant;

class MenuFactory extends Factory
{
    public function definition(): array
    {
        $this->faker->addProvider(new Restaurant($this->faker));

        return [
            'nama_menu' => $this->faker->foodName(),
            'keterangan' => $this->faker->realText(50), 
            'harga' => $this->faker->numberBetween(5, 50) * 1000,
        ];
    }
}
