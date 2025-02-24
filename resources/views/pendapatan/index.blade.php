@extends('layouts.app')

@section('content')
<div class="bg-white p-4 rounded shadow-sm">
    <h2 class="fw-bold">Pendapatan</h2>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Pendapatan Hari Ini</h5>
                    <p class="card-text">Rp {{ number_format($pendapatanHarian, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Pendapatan Minggu Ini</h5>
                    <p class="card-text">Rp {{ number_format($pendapatanMingguan, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Pendapatan Bulan Ini</h5>
                    <p class="card-text">Rp {{ number_format($pendapatanBulanan, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
