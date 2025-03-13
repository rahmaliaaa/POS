@extends('layouts.app')

@section('title', 'Buat Transaksi')

@section('content')
    <div class="container">
        <h1>Buat Transaksi</h1>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('transactions.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="product_id" class="form-label">Pilih Produk</label>
                <select name="product_id" id="product_id" class="form-control">
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }} - Rp {{ number_format($product->price, 0, ',', '.') }} (Stok: {{ $product->stock }})</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Jumlah</label>
                <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
            </div>
            <button type="submit" class="btn btn-success">Proses Transaksi</button>
        </form>
    </div>
@endsection
