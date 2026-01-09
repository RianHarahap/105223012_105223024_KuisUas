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
            'tipe' => 'required',
            'harga' => 'required|numeric',
            'fasilitas' => 'required',
            'status' => 'required',
        ]);

        Kamar::create($validated);
        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil ditambahkan!');
    }

    public function edit(Kamar $kamar)
    {
        return view('kamar.edit', compact('kamar'));
    }

    public function update(Request $request, Kamar $kamar)
    {
        $validated = $request->validate([
            'nomor_kamar' => 'required|unique:kamar,nomor_kamar,'.$kamar->id,
            'tipe' => 'required',
            'harga' => 'required|numeric',
            'fasilitas' => 'required',
            'status' => 'required',
        ]);

        $kamar->update($validated);
        return redirect()->route('kamar.index')->with('success', 'Data Kamar diperbarui!');
    }

    public function destroy(Kamar $kamar)
    {
        $kamar->delete();
        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil dihapus!');
    }
}