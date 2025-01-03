<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;

class PesananController extends Controller
{
    public function index()
    {
        // Ambil pesanan milik user yang sedang login
        $pesanans = Pesanan::where('user_id', auth()->id())
            ->with('menu') // Include relasi ke menu
            ->orderBy('created_at', 'desc') // Urutkan dari yang terbaru
            ->get();

        return view('pesanan.index', compact('pesanans'));
    }
}
