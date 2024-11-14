<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kedai Pedas - Welcome</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <style>
        .menu-item {
            opacity: 0.7;
            transition: opacity 0.3s ease-in-out;
        }
        .menu-item:hover {
            opacity: 1;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <nav class="bg-white shadow-md p-4">
        <div class="container mx-auto flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Kedai Pedas" class="h-10 mr-2">
                <span class="text-xl font-bold text-gray-800">Kedai Pedas</span>
            </div>

            <!-- Navbar Links -->
            <div>
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-800 mx-4">Login</a>
                <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-800 mx-4">Register</a>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="text-center py-16 bg-red-600 text-white">
        <h1 class="text-4xl font-bold">Selamat Datang di Kedai Pedas</h1>
        <p class="mt-4">Di setiap gigitan, ada keberanian. Berani coba?</p>
    </header>

    <!-- Bestseller Menu Section -->
    <section class="container mx-auto mt-8 px-4">
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-8">Menu Bestseller</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Menu 1 -->
            <div class="menu-item bg-white shadow-md p-6 rounded-lg text-center hover:bg-red-100">
                <img src="{{ asset('images/menu1.jpg') }}" alt="Menu 1" class="w-full h-40 object-cover rounded-lg mb-4">
                <h3 class="text-lg font-bold text-gray-800">Ayam Pedas Level 10</h3>
                <p class="text-gray-600 mt-2">Sensasi pedas yang bikin ketagihan!</p>
            </div>

            <!-- Menu 2 -->
            <div class="menu-item bg-white shadow-md p-6 rounded-lg text-center hover:bg-red-100">
                <img src="{{ asset('images/menu2.jpg') }}" alt="Menu 2" class="w-full h-40 object-cover rounded-lg mb-4">
                <h3 class="text-lg font-bold text-gray-800">Mie Goreng Spesial</h3>
                <p class="text-gray-600 mt-2">Pedas dan gurih, cocok untuk santapan malam.</p>
            </div>

            <!-- Menu 3 -->
            <div class="menu-item bg-white shadow-md p-6 rounded-lg text-center hover:bg-red-100">
                <img src="{{ asset('images/menu3.jpg') }}" alt="Menu 3" class="w-full h-40 object-cover rounded-lg mb-4">
                <h3 class="text-lg font-bold text-gray-800">Cumi Goreng Tepung</h3>
                <p class="text-gray-600 mt-2">Kelezatan cumi berpadu dengan pedasnya saus sambal.</p>
            </div>
        </div>
   
