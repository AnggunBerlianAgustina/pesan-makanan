@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
    <h1 class="text-center mb-5">Keranjang Belanja Anda</h1>

    @if($cartItems->isEmpty())
        <p class="text-center">Keranjang Anda kosong. <a href="{{ route('menu.index') }}">Tambah Menu</a>.</p>
    @else
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Menu</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                    <tr>
                        <td>{{ $item->menu->nama_menu }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>Rp{{ number_format($item->menu->harga, 0, ',', '.') }}</td>
                        <td>Rp{{ number_format($item->menu->harga * $item->quantity, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-end mt-4">
            <button class="btn btn-checkout">Checkout</button>
        </div>
    @endif
@endsection
