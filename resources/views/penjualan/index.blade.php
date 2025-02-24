@extends('layouts.app')

@section('content')
<div class="bg-white p-4 rounded shadow-sm">
    <h2 class="fw-bold">Data Penjualan</h2>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga Jual</th>
                <th>Total Harga</th>
                <th>Keuntungan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penjualans as $key => $penjualan)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $penjualan->barang->nama_barang }}</td>
                    <td>{{ $penjualan->jumlah }}</td>
                    <td>Rp {{ number_format($penjualan->harga_jual, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($penjualan->total_harga, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($penjualan->keuntungan, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('penjualan.edit', $penjualan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('penjualan.destroy', $penjualan->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data penjualan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
