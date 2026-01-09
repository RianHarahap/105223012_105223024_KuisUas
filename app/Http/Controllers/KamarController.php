<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    public function index()
    {
        $kamar = Kamar::latest()->paginate(10);
        return view('kamar.index', compact('kamar'));
    }

    public function create()
    {
        return view('kamar.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_kamar' => 'required|unique:kamar',
            'tipe' => 'required|in:standard,deluxe,vip',
            'harga' => 'required|numeric',
            'fasilitas' => 'required|string',
            'status' => 'required|in:tersedia,terisi',
        ]);

        Kamar::create($validated);

        return redirect()->route('kamar.index')->with('success', 'Data Kamar berhasil ditambahkan!');
    }

    public function edit(Kamar $kamar)
    {
        return view('kamar.edit', compact('kamar'));
    }

    public function update(Request $request, Kamar $kamar)
    {
        $validated = $request->validate([
            'nomor_kamar' => 'required|unique:kamar,nomor_kamar,'.$kamar->id,
            'tipe' => 'required|in:standard,deluxe,vip',
            'harga' => 'required|numeric',
            'fasilitas' => 'required|string',
            'status' => 'required|in:tersedia,terisi',
        ]);

        $kamar->update($validated);

        return redirect()->route('kamar.index')->with('success', 'Data Kamar berhasil diperbarui!');
    }

    public function destroy(Kamar $kamar)
    {
        $kamar->delete();
        return redirect()->route('kamar.index')->with('success', 'Data Kamar berhasil dihapus!');
    }
}