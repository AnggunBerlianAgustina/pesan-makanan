<?php

/**
    Routing untuk menampilkan halaman utama dari project laravel
**/
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('welcome'); 
});

#menu&cart
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
