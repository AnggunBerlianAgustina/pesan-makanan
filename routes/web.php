<?php

/**
    Routing untuk menampilkan halaman utama dari project laravel
**/
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome'); 
});
