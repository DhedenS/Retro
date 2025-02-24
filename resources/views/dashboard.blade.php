@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Dashboard</h2>

    <!-- Notifikasi Stok Habis -->
    @if ($barangHabis->count() > 0)
        <div class="alert alert-danger">
            <strong>Perhatian!</strong> Beberapa barang stoknya telah habis:
            <ul>
                @foreach ($barangHabis as $barang)
                    <li>{{ $barang->nama_barang }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Isi Dashboard lainnya -->
</div>
@endsection
