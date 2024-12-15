<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = $request->get('filter', 'daily');
        $sales = collect();

        // Filter data berdasarkan pilihan
        if ($filter == 'daily') {
            // Ambil penjualan hari ini
            $sales = Penjualan::whereDate('created_at', today())->get();
        } elseif ($filter == 'monthly') {
            // Ambil penjualan bulan ini
            $sales = Penjualan::whereMonth('created_at', now()->month)->get();
        } elseif ($filter == 'yearly') {
            // Ambil penjualan tahun ini
            $sales = Penjualan::whereYear('created_at', now()->year)->get();
        }

        // Data untuk grafik tahunan
        $labels = collect(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
        $monthlySales = collect();

        foreach ($labels as $index => $month) {
            $monthlySales->push(
                Penjualan::whereMonth('created_at', $index + 1)  // Menyesuaikan dengan bulan (1 = Januari, 2 = Februari, ...)
                    ->whereYear('created_at', now()->year)  // Menggunakan tahun sekarang
                    ->sum('total_harga')
            );
        }

        // dd($monthlySales);

        return view('admin.laporan', compact('sales', 'labels', 'monthlySales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjualan $penjualan)
    {
        //
    }
}
