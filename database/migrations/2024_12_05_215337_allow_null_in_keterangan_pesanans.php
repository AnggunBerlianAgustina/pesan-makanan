<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AllowNullInKeteranganPesanans extends Migration
{
    public function up()
    {
        Schema::table('pesanans', function (Blueprint $table) {
            $table->string('keterangan')->nullable()->change(); // Izinkan NULL
        });
    }

    public function down()
    {
        Schema::table('pesanans', function (Blueprint $table) {
            $table->string('keterangan')->nullable(false)->change(); // Kembalikan ke non-null
        });
    }
}
