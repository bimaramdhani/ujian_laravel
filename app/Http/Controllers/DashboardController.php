<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Tampilkan halaman dashboard.
     */
    public function index()
    {
        $totalBarang = Barang::count();
        $totalStok = Barang::sum('jumlah_stok');
        $totalNilai = Barang::selectRaw('SUM(jumlah_stok * harga) as total')->value('total') ?? 0;
        $stokRendah = Barang::where('jumlah_stok', '<=', 5)->count();
        $totalUser = User::count();
        $barangTerbaru = Barang::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalBarang',
            'totalStok',
            'totalNilai',
            'stokRendah',
            'totalUser',
            'barangTerbaru'
        ));
    }
}
