@extends('layouts.app')

@section('title', 'Daftar Menu')

@section('content')
    <h1 class="text-center mb-5">Silahkan Pilih Menu</h1>
    <div class="row">
        @foreach($menus as $menu)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $menu->nama_menu }}</h5>
                        <p class="card-text">{{ $menu->keterangan }}</p>
                        <p class="card-text fw-bold">Rp{{ number_format($menu->harga, 0, ',', '.') }}</p>
                        <form action="{{ route('cart.add') }}" method="POST" class="mt-auto">
                            @csrf
                            <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                            <input type="number" name="quantity" min="1" class="form-control mb-3" placeholder="Jumlah" required>
                            <button type="submit" class="btn btn-primary w-100">Tambah ke Keranjang</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
