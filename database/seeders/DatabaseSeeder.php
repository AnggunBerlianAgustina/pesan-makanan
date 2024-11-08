<?php

/**
 Seeder atau data dummy untuk database
 **/
namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        /**
            Memanggil seeder untuk table menu, pembayaran, pesanan
         **/
        $this->call(MenuSeeder::class);
        $this->call(PembayaranSeeder::class);
        $this->call(PesananSeeder::class);
    }
}
