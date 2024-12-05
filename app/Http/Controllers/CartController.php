<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Menu;

class CartController extends Controller
{
    // Menampilkan keranjang
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // Menghapus item dari keranjang
    public function remove(Request $request)
    {
        $request->validate(['menu_id' => 'required']);

        $cart = session()->get('cart', []);
        $menuId = $request->menu_id;

        if (isset($cart[$menuId])) {
            unset($cart[$menuId]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Item berhasil dihapus dari keranjang.');
    }

    // Checkout: Simpan pesanan ke database
    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kosong.');
        }

        foreach ($cart as $item) {
            Pesanan::create([
                'user_id' => auth()->id(),
                'menu_id' => $item['id'],
                'keterangan' => null, // Bisa diubah untuk menerima input dari buyer
                'status_pesanan' => 'pending',
            ]);
        }

        session()->forget('cart'); // Kosongkan keranjang

        return redirect()->route('menu.index')->with('success', 'Pesanan berhasil dibuat.');
    }
}
