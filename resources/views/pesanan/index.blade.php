@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Histori Pesanan</h1>
    @if ($pesanans->isEmpty())
        <p>Anda belum memiliki histori pesanan.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Menu</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesanans as $pesanan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pesanan->menu->nama_menu }}</td>
                        <td>{{ $pesanan->keterangan ?? 'Tidak ada keterangan' }}</td>
                        <td>{{ ucfirst($pesanan->status_pesanan) }}</td>
                        <td>{{ $pesanan->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
