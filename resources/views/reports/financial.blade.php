@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Laporan Keuangan</h2>
    <table class="table">
        <tr>
            <th>Total Pendapatan</th>
            <td>Rp {{ number_format($totalRevenue, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Jumlah Transaksi</th>
            <td>{{ $totalTransactions }}</td>
        </tr>
    </table>
</div>
@endsection
