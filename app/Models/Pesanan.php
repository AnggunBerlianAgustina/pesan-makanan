<?php

/**
    Model untuk table pesanan 
**/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pesanan',
        'nama_menu',
        'nama_pemesan',
        'keterangan',
        'status_pesanan',
    ];
}
