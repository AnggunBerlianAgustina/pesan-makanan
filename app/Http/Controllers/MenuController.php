<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // Menampilkan daftar menu
    public function index()
    {
        $menus = Menu::all(); // Ambil semua menu dari database
        return view('menu.index', compact('menus'));
    }

    // Menambahkan item ke keranjang
    public function addToCart(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
        ]);

        // Simpan ke session (contoh penyimpanan sementara)
        $cart = session()->get('cart', []);
        $menuId = $request->menu_id;

        if (isset($cart[$menuId])) {
            $cart[$menuId]['quantity'] += 1;
        } else {
            $menu = Menu::findOrFail($menuId);
            $cart[$menuId] = [
                'id' => $menu->id,
                'nama_menu' => $menu->nama_menu,
                'harga' => $menu->harga,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan ke keranjang!');
    }
}
