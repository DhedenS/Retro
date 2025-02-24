<!-- resources/views/components/sidebar.blade.php -->
<div class="sidebar position-fixed">
    <h4 class="text-center">Remaja Elektro</h4>
        <a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a>
        <a href="{{ route('barang.create') }}" class="text-decoration-none">Tambah Barang</a>
    
        <a href="{{ route('barang.index') }}" class="text-decoration-none">Data Barang</a>
    
        <a href="{{ route('penjualan.create') }}" class="text-decoration-none">Penjualan</a>
        <a href="{{ route('penjualan.index') }}" class="text-decoration-none">Data Penjualan</a>
        <a href="{{ route('pendapatan.index') }}" class="text-decoration-none">Data Pendapatan</a>



</div>
