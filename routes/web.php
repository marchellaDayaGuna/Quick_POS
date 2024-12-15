<?php

use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminKasirController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\AdminLaporanController;
use App\Http\Controllers\KasirDashboardController;
use App\Http\Controllers\KasirPenjualanController;
Route::get('/', function () {
    return view('home');
});
Route::get('/admin', [AdminDashboardController::class, 'index']);
Route::get('/admin/laporan', [AdminLaporanController::class, 'index'])->name('admin.laporan');
Route::resource('/admin/kategori', AdminKategoriController::class);
Route::resource('/admin/produk', AdminProductController::class);
Route::get('/admin/addProduk', [AdminProductController::class, 'create']);
Route::patch('/admin/produk/{id}/diskon', [AdminProductController::class, 'diskon']);
Route::get('/admin/kasir', [AdminKasirController::class, 'index'])->name('admin.kasir');
Route::post('/admin/kasir/store', [AdminKasirController::class, 'store'])->name('admin.kasir.store');


// Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


Route::resource('/kasir', KasirDashboardController::class);

Route::resource('/penjualan', KasirPenjualanController::class)->middleware('auth');

Route::get('/transaksi', function () {
    return view('admin.transaksi');
});
Route::get('/tes', function () {
    return view('tes');
});

