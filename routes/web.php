<?php

/**
    Routing untuk menampilkan halaman utama dari project laravel
**/
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PesananController;

Route::get('/', function () {
    return view('welcome'); 
});

#menu&cart

    Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
    Route::post('/menu/add-to-cart', [MenuController::class, 'addToCart'])->name('menu.add_to_cart');


    Route::get('/keranjang', [CartController::class, 'index'])->name('cart.index');
    Route::post('/keranjang/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/keranjang/checkout', [CartController::class, 'checkout'])->name('cart.checkout');


//pesananbuyer

    Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');

