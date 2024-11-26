<?php

use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/admin', function () {
    return view('admin.index');
});
Route::resource('/admin/kategori', KategoriController::class);
