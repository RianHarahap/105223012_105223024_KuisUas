<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// TODO: Import model Kamar

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // TODO: Ambil semua data kamar dari database
        // TODO: Tampilkan ke view 'kamar.index'
        // BONUS: Implementasi filter berdasarkan status/tipe
        $kamar = \App\Models\Kamar::all();
        return view('kamar.index', compact('kamar'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // TODO: Tampilkan form tambah kamar di view 'kamar.create'
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // TODO: Validasi input (nomor_kamar unique, harga positif, dll)
        // TODO: Simpan data kamar baru ke database
        // TODO: Redirect ke index dengan pesan sukses
        \App\Models\Kamar::create($request->all());
        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // TODO: Ambil data kamar berdasarkan id
        // TODO: Tampilkan detail kamar di view 'kamar.show'
        $kamar = \App\Models\Kamar::findOrFail($id);
        return view('kamar.show', compact('kamar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // TODO: Ambil data kamar berdasarkan id
        // TODO: Tampilkan form edit di view 'kamar.edit'
        $kamar = \App\Models\Kamar::findOrFail($id);
        return view('kamar.edit', compact('kamar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // TODO: Validasi input
        // TODO: Update data kamar
        // TODO: Redirect ke index dengan pesan sukses
        $kamar = \App\Models\Kamar::findOrFail($id);
        $kamar->update($request->all());
        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // TODO: Hapus data kamar (cek dulu apakah sudah pernah disewa)
        // TODO: Redirect dengan pesan sukses/error
        $kamar = \App\Models\Kamar::findOrFail($id);
        // Cek apakah kamar pernah disewa
        if ($kamar->kontrakSewa()->exists()) {
            return redirect()->route('kamar.index')->with('error', 'Kamar tidak dapat dihapus karena sudah pernah disewa.');
        }
        $kamar->delete();
        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil dihapus.');    
    }
}
