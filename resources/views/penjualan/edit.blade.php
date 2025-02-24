@extends('layouts.app')

@section('content')
<div class="bg-white p-4 rounded shadow-sm">
    <h2 class="fw-bold">Edit Penjualan</h2>
    <form action="{{ route('penjualan.update', $penjualan->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Barang</label>
            <select name="barang_id" class="form-control">
                @foreach ($barangs as $barang)
                    <option value="{{ $barang->id }}" {{ $penjualan->barang_id == $barang->id ? 'selected' : '' }}>
                        {{ $barang->nama_barang }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="{{ $penjualan->jumlah }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Harga Jual</label>
            <input type="number" name="harga_jual" class="form-control" value="{{ $penjualan->harga_jual }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
