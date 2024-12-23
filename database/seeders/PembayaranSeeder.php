<?php

/**
    Membuat dummy data untuk table pembayaran
**/

namespace Database\Seeders;

use App\Models\Pembayaran;
use Illuminate\Database\Seeder;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pembayaran::factory(10)->create();
    }
}
