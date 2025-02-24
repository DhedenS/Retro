@extends('layouts.app')

@section('content')
<div class="bg-white p-4 rounded shadow-sm">
    <h2 class="fw-bold">Transaksi Penjualan</h2>

    <form action="{{ route('penjualan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Barang</label>
            <select name="barang_id" id="barang_id" class="form-select select2" required>
                <option value="" disabled selected>Cari Barang...</option>
                @foreach($barangs as $barang)
                    <option value="{{ $barang->id }}" data-harga="{{ $barang->harga }}">
                        {{ $barang->nama_barang }} - Stok: {{ $barang->stok }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga Jual</label>
            <input type="number" name="harga_jual" id="harga_jual" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script>
    $(document).ready(function() {
        // Aktifkan Select2 pada dropdown barang
        $('.select2').select2({
            placeholder: "Cari dan pilih barang...",
            allowClear: true
        });

        // Ketika barang dipilih, isi harga modal ke input harga jual
        $('#barang_id').on('change', function() {
            let selectedOption = $(this).find(':selected');
            let hargaModal = selectedOption.data('harga');
            $('#harga_jual').val(hargaModal); // Harga jual bisa diubah sesuai kebutuhan
        });
    });
</script>
@endsection
