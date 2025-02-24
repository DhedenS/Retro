<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil barang yang stoknya habis (0)
        $barangHabis = Barang::where('stok', 0)->get();

        return view('dashboard', compact('barangHabis'));
    }
}
