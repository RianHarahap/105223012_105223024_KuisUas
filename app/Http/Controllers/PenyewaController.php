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
            'nama_lengkap' => 'required',
            'nomor_ktp' => 'required|unique:penyewa|numeric',
            'nomor_telepon' => 'required',
            'alamat_asal' => 'required',
            'pekerjaan' => 'required',
        ]);

        Penyewa::create($validated);
        return redirect()->route('penyewa.index')->with('success', 'Penyewa berhasil didaftarkan!');
    }

    public function edit(Penyewa $penyewa)
    {
        return view('penyewa.edit', compact('penyewa'));
    }

    public function update(Request $request, Penyewa $penyewa)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required',
            'nomor_ktp' => 'required|numeric|unique:penyewa,nomor_ktp,'.$penyewa->id,
            'nomor_telepon' => 'required',
            'alamat_asal' => 'required',
            'pekerjaan' => 'required',
        ]);

        $penyewa->update($validated);
        return redirect()->route('penyewa.index')->with('success', 'Data Penyewa diperbarui!');
    }

    public function destroy(Penyewa $penyewa)
    {
        $penyewa->delete();
        return redirect()->route('penyewa.index')->with('success', 'Penyewa dihapus!');
    }
}