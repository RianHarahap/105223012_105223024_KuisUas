<?php

namespace App\Http\Controllers;

use App\Models\Penyewa;
use Illuminate\Http\Request;

class PenyewaController extends Controller
{
    public function index()
    {
        $penyewa = Penyewa::latest()->paginate(10);
        return view('penyewa.index', compact('penyewa'));
    }

    public function create()
    {
        return view('penyewa.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|unique:penyewa|numeric',
            'no_hp' => 'required|string',
            'alamat_asal' => 'required|string',
        ]);

        Penyewa::create($validated);

        return redirect()->route('penyewa.index')->with('success', 'Penyewa baru berhasil didaftarkan!');
    }

    public function edit(Penyewa $penyewa)
    {
        return view('penyewa.edit', compact('penyewa'));
    }

    public function update(Request $request, Penyewa $penyewa)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|numeric|unique:penyewa,nik,'.$penyewa->id,
            'no_hp' => 'required|string',
            'alamat_asal' => 'required|string',
        ]);

        $penyewa->update($validated);

        return redirect()->route('penyewa.index')->with('success', 'Data penyewa diperbarui!');
    }

    public function destroy(Penyewa $penyewa)
    {
        $penyewa->delete();
        return redirect()->route('penyewa.index')->with('success', 'Data penyewa dihapus!');
    }
}