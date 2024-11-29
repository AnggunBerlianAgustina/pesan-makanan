<?php

/**
    Model untuk table pesanan 
**/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    // Tidak perlu menyertakan 'id' di sini karena otomatis diisi oleh database
    protected $fillable = [
        'nama_menu',
        'nama_pemesan',
        'keterangan',
        'status_pesanan',
    ];
}

