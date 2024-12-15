<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::all()->map(function ($produk) {
            $produk->harga_setelah_diskon = $produk->harga_produk - ($produk->harga_produk * $produk->diskon / 100);
            return $produk;
        });

        return view('admin.produk', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::get();

        return view('admin.addProduk', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga_produk' => 'required|numeric',
            'stok_barang' => 'required|string|max:255',
            'diskon' => 'required|numeric|max:255',
            'kategori_id' => 'required|string|max:255'
        ]);

        // dd($validatedData);
        try {
            Produk::create($validatedData);
            return redirect('admin/produk')->with('success', 'Data berhasil ditambahkan.');
        } catch (QueryException $e) {
            // dd($e->getMessage());
            return redirect('admin/produk')->with('error', 'Terjadi kesalahan database: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('admin/produk')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        try {
            $kategoris = Kategori::get();
            $produk = Produk::findOrFail($produk->id);
            return view('admin.editProduk', compact('produk', 'kategoris'));
        } catch (ModelNotFoundException $e) {
            return redirect('admin/produk')->with('error', 'Data produk tidak ditemukan.');
        } catch (QueryException $e) {
            return redirect('admin/produk')->with('error', 'Terjadi kesalahan database: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('admin/produk')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga_produk' => 'required|numeric',
            'stok_barang' => 'required|string|max:255',
            // 'diskon' => 'required|numeric|max:255',
            'kategori_id' => 'required|string|max:255'
        ]);
        // dd($kategori);
        try {
            $produk = Produk::findOrFail($id); // Cari data prod$produk berdasarkan ID
            $produk->update($validatedData); // Update data kategori
            return redirect('admin/produk')->with('success', 'Data berhasil diperbarui.');
        } catch (ModelNotFoundException $e) {
            return redirect('admin/produk')->with('error', 'Data produk tidak ditemukan.');
        } catch (QueryException $e) {
            return redirect('admin/produk')->with('error', 'Terjadi kesalahan database: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('admin/produk')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        try {
            // $kategori = Kategori::findOrFail($id); // Cari data kategori berdasarkan ID
            $produk->delete(); // Hapus data kategori
            return redirect('admin/produk')->with('success', 'Data berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            return redirect('admin/produk')->with('error', 'Data produk tidak ditemukan.');
        } catch (QueryException $e) {
            return redirect('admin/produk')->with('error', 'Terjadi kesalahan database: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('admin/produk')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function diskon($id, Request $request) 
    {
        // dd($produk);
        // dd($id);
        $request->validate([
            'diskon' => 'required|numeric|min:0|max:100',
        ]);
    
        $produk = Produk::findOrFail($id);
        $produk->diskon = $request->diskon;
        $produk->save();
    
        return redirect()->back()->with('success', 'Diskon berhasil diperbarui!');
        
    }
}
