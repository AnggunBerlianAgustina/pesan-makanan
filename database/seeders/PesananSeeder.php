<?php

/**
    Membuat dummy data untuk table pesanan
**/

namespace Database\Seeders;

use App\Models\Pesanan;
use Illuminate\Database\Seeder;

class PesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pesanan::factory(10)->create();
    }
}
