<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Database\QueryException;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = Kategori::get();
        // dd($kategoris);
        return view('admin.kategori', compact('kategoris'));
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
    public function store(StoreKategoriRequest $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255'
        ]);
        // dd($validateData);
        try {
            Kategori::create($validateData);
            // dd($validateData);
            return redirect('admin/kategori')->with('success', 'Data berhasil ditambahkan.');
        } catch (QueryException $e) {
            return redirect('admin/kategori')->with('error', 'Terjadi kesalahan database: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('admin/kategori')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKategoriRequest $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255'
        ]);
        // dd($kategori);
        try {
            $kategori = Kategori::findOrFail($id); // Cari data kategori berdasarkan ID
            $kategori->update($validateData); // Update data kategori
            return redirect('admin/kategori')->with('success', 'Data berhasil diperbarui.');
        } catch (ModelNotFoundException $e) {
            return redirect('admin/kategori')->with('error', 'Data kategori tidak ditemukan.');
        } catch (QueryException $e) {
            return redirect('admin/kategori')->with('error', 'Terjadi kesalahan database: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('admin/kategori')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        try {
            // $kategori = Kategori::findOrFail($id); // Cari data kategori berdasarkan ID
            $kategori->delete(); // Hapus data kategori
            return redirect('admin/kategori')->with('success', 'Data berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            return redirect('admin/kategori')->with('error', 'Data kategori tidak ditemukan.');
        } catch (QueryException $e) {
            return redirect('admin/kategori')->with('error', 'Terjadi kesalahan database: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('admin/kategori')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
