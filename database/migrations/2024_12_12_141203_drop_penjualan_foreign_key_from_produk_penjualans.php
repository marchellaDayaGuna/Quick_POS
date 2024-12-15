<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('produk_penjualans', function (Blueprint $table) {
            $table->dropForeign(['penjualan_id']);  // Ganti dengan nama kolom foreign key Anda jika berbeda
        });

    }
    public function down()
    {
        // Menambahkan kembali foreign key jika rollback migrasi
        Schema::table('produk_penjualans', function (Blueprint $table) {
            $table->foreign('penjualan_id')->references('id')->on('penjualans')->onDelete('cascade');
        });
    }

    
};
