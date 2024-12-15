<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    /** @use HasFactory<\Database\Factories\PenjualanFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id',     
        'keterangan',
        'total_harga',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function produkPenjualan()
    {
        return $this->hasMany(produk_penjualan::class, 'penjualan_id');
    }

}
