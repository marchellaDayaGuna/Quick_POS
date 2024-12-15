<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    /** @use HasFactory<\Database\Factories\ProdukFactory> */
    use HasFactory;
    protected $fillable = [
        'nama_produk',
        'harga_produk',
        'stok_barang',
        'diskon',
        'kategori_id',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
    public function produkPenjualan()
    {
        return $this->hasMany(produk_penjualan::class, 'produk_id');
    }
}
