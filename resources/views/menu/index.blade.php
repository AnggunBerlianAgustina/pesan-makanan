@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Menu</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @forelse($menus as $menu)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $menu->nama_menu }}</h5>
                        <p class="card-text">{{ $menu->keterangan }}</p>
                        <p class="card-text"><strong>Rp {{ number_format($menu->harga, 0, ',', '.') }}</strong></p>
                        <form action="{{ route('menu.add_to_cart') }}" method="POST">
                            @csrf
                            <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                            <button type="submit" class="btn btn-primary">Tambah ke Keranjang</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">Belum ada menu tersedia.</p>
        @endforelse
    </div>
</div>
@endsection
