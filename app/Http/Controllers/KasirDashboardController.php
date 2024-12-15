<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\produk_penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KasirDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Auth::id());  
        $todayMoney = 0;
        $penjualans = Penjualan::where('user_id', Auth::id())->get();
        // Get the number of sales today by the authenticated user
        $todaySale = Penjualan::where('user_id', Auth::id())
        ->whereDate('created_at', today())
        ->count();

        $todayMoney = Penjualan::where('user_id', Auth::id())
        ->whereDate('created_at', today())
        ->sum('total_harga');

        $todayMoneyAll = Penjualan::where('user_id', Auth::id())->sum('total_harga');
        return view('kasir.index', compact('penjualans', 'todaySale', 'todayMoney', 'todayMoneyAll'));
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
