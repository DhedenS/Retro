<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DashboardController;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
Route::post('/barang/{id}/update', [BarangController::class, 'update'])->name('barang.update');
Route::delete('/barang/{id}/delete', [BarangController::class, 'destroy'])->name('barang.destroy');

Route::resource('barang', BarangController::class)->except(['edit', 'update', 'destroy']);
Route::resource('penjualan', PenjualanController::class);

Route::get('/penjualan/{id}/edit', [PenjualanController::class, 'edit'])->name('penjualan.edit');
Route::post('/penjualan/{id}/update', [PenjualanController::class, 'update'])->name('penjualan.update');
Route::delete('/penjualan/{id}/delete', [PenjualanController::class, 'destroy'])->name('penjualan.destroy');

Route::get('/pendapatan', [PenjualanController::class, 'pendapatan'])->name('pendapatan.index');
