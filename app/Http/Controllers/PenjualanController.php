<?php
namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::with('barang')->get();
        return view('penjualan.index', compact('penjualans'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('penjualan.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'harga_jual' => 'required|integer|min:1',
        ]);

        $barang = Barang::findOrFail($request->barang_id);

        if ($barang->stok < $request->jumlah) {
            return redirect()->back()->with('error', 'Stok barang tidak cukup.');
        }

        // Hitung keuntungan per barang
        $total_harga = $request->jumlah * $request->harga_jual;
        $keuntungan = ($request->harga_jual - $barang->harga) * $request->jumlah;

        Penjualan::create([
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'harga_jual' => $request->harga_jual,
            'total_harga' => $total_harga,
            'keuntungan' => $keuntungan,
        ]);

        // Kurangi stok barang
        $barang->stok -= $request->jumlah;
        $barang->save();

        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil!');
    }

    public function pendapatan()
    {
        // Hitung keuntungan berdasarkan periode
        $hariIni = Carbon::today();
        $mingguIni = Carbon::now()->startOfWeek();
        $bulanIni = Carbon::now()->startOfMonth();

        $pendapatanHarian = Penjualan::whereDate('created_at', $hariIni)->sum('keuntungan');
        $pendapatanMingguan = Penjualan::whereBetween('created_at', [$mingguIni, Carbon::now()])->sum('keuntungan');
        $pendapatanBulanan = Penjualan::whereBetween('created_at', [$bulanIni, Carbon::now()])->sum('keuntungan');

        return view('pendapatan.index', compact('pendapatanHarian', 'pendapatanMingguan', 'pendapatanBulanan'));
    }
    public function edit($id)
{
    $penjualan = Penjualan::findOrFail($id);
    $barangs = Barang::all();
    return view('penjualan.edit', compact('penjualan', 'barangs'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'barang_id' => 'required|exists:barangs,id',
        'jumlah' => 'required|integer|min:1',
        'harga_jual' => 'required|integer|min:1',
    ]);

    $penjualan = Penjualan::findOrFail($id);
    $penjualan->update([
        'barang_id' => $request->barang_id,
        'jumlah' => $request->jumlah,
        'harga_jual' => $request->harga_jual,
    ]);

    return redirect()->route('penjualan.index')->with('success', 'Data penjualan diperbarui!');
}

public function destroy($id)
{
    $penjualan = Penjualan::findOrFail($id);
    $penjualan->delete();

    return redirect()->route('penjualan.index')->with('success', 'Data penjualan dihapus!');
}

}
