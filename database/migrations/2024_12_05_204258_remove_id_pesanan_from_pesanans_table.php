<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Schema::hasColumn('pesanans', 'id_pesanan')) { // Cek apakah kolom ada
            Schema::table('pesanans', function (Blueprint $table) {
                $table->dropColumn('id_pesanan');
            });
        }
    }

    public function down(): void
    {
        Schema::table('pesanans', function (Blueprint $table) {
            if (!Schema::hasColumn('pesanans', 'id_pesanan')) { // Cek apakah kolom belum ada
                $table->string('id_pesanan')->nullable(); // Sesuaikan tipe kolom jika ingin mengembalikannya
            }
        });
    }
};

