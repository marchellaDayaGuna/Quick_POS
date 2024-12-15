<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todayMoney = 0;
        // $penjualans = Penjualan::where('user_id', Auth::id())->get();
        // Get the number of sales today by the authenticated user
        $todaySale = Penjualan::whereDate('created_at', today())
        ->count();

        $todayMoney = Penjualan::whereDate('created_at', today())
        ->sum('total_harga');

        $todayMoneyAll = Penjualan::sum('total_harga');
        return view('admin.index', compact('todaySale', 'todayMoney', 'todayMoneyAll'));

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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
