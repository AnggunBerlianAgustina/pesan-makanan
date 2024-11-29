<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Menu;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
{
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'Silakan login untuk menambahkan ke keranjang.');
    }

    $menu = Menu::findOrFail($request->menu_id);

    $pesanan = new Pesanan();
    $pesanan->nama_menu = $menu->nama_menu; // Mengambil nama menu dari tabel menu
    $pesanan->nama_pemesan = auth()->user()->name; // Mengambil nama pemesan dari user yang login
    $pesanan->keterangan = $request->input('keterangan', ''); // Jika ada keterangan
    $pesanan->status_pesanan = 'pending'; // Status default
    $pesanan->save();

    return redirect()->route('cart.view')->with('success', 'Menu berhasil ditambahkan ke keranjang.');
}

    public function viewCart()
    {
        $cartItems = Pesanan::where('nama_pemesan', auth()->user()->name)->get();
        return view('cart.index', compact('cartItems'));
    }
}
