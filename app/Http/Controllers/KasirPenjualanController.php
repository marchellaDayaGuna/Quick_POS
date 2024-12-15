<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\produk_penjualan;
use Illuminate\Support\Facades\Storage;

class KasirPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd("Tes");
        // Ambil semua produk untuk ditampilkan pada form
        $produks = Produk::all()->map(function ($produk) {
            $produk->harga_setelah_diskon = $produk->harga_produk - ($produk->harga_produk * $produk->diskon / 100);
            return $produk;
        });
        return view('kasir.penjualan', compact('produks'));
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
        // dd($request);
        try {
            // Validasi request
            $request->validate([
                'produk_id' => 'required',
                'quantity' => 'required',
            ]);

            // Mengambil produk_id dan quantity dari request
            $produkIds = json_decode($request->produk_id);
            $quantities = json_decode($request->quantity);

            // Simpan penjualan
            $penjualan = Penjualan::create([
                'user_id' => $request->user_id,
                    'keterangan' => 'Penjualan oleh kasir',
                    'total_harga' => 0, // Akan di-update setelah subtotal dihitung
                ]);

                $totalHarga = 0;

                // Simpan detail produk yang dijual
                foreach ($produkIds as $index => $produkId) {
                    // Cek apakah produk ada
                    $produk = Produk::find($produkId);
                    if (!$produk) {
                        throw new \Exception("Produk dengan ID $produkId tidak ditemukan.");
                    }

                    $produk->harga_setelah_diskon = $produk->harga_produk - ($produk->harga_produk * $produk->diskon / 100);
                

                    $quantity = $quantities[$index];
                    $subTotal = $produk->harga_setelah_diskon * $quantity;

                    // Simpan detail produk penjualan
                    produk_penjualan::create([
                        'penjualan_id' => $penjualan->id,
                        'produk_id' => $produkId,
                        'quantity' => $quantity,
                        'sub_total' => $subTotal,
                    ]);

                    $totalHarga += $subTotal;
                }
                // Update total harga penjualan
                $penjualan->update(['total_harga' => $totalHarga]);
                // dd($penjualan->produk_penjualan);
                // Buat PDF struk
                // Buat PDF
                $pdf = Pdf::loadView('kasir.struk', compact('penjualan'));

                // Simpan file sementara ke storage
                $pdfPath = 'public/struks/struk-' . $penjualan->id . '.pdf';
                Storage::put($pdfPath, $pdf->output());
                $pdfUrl = Storage::url($pdfPath);
                // dd($pdfUrl);
                // Simpan URL di session
                session()->flash('pdf_url', Storage::url($pdfPath));

                return redirect('/penjualan')->with([
                    'success' => 'Penjualan berhasil disimpan!',
                    'pdf_url' => $pdfUrl,
                ]);

            } catch (\Exception $e) {
                // Tangani error dan kirimkan pesan error ke user
                return redirect('/penjualan')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
            }
        }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
