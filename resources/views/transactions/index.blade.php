@extends('layouts.app')

@section('title', 'Riwayat Transaksi')

@section('content')
    <div class="container">
        <h1>Riwayat Transaksi</h1>
        <a href="{{ route('transactions.create') }}" class="btn btn-primary">Tambah Transaksi</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->product->name }}</td>
                        <td>{{ $transaction->quantity }}</td>
                        <td>Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                        <td>{{ $transaction->created_at->format('d M Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection