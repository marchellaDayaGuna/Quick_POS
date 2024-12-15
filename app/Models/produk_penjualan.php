<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk_penjualan extends Model
{
    /** @use HasFactory<\Database\Factories\ProdukPenjualanFactory> */
    use HasFactory;

    protected $table = 'produk_penjualans';

    protected $fillable = [
        'penjualan_id',
        'produk_id',
        'quantity',
        'sub_total',
    ];

    // Relasi ke tabel Penjualan
    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'penjualan_id');
    }

    // Relasi ke tabel Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
