<?php

namespace App\Http\Controllers;

use App\Models\KontrakSewa;
use App\Models\Kamar;
use App\Models\Penyewa;
use Illuminate\Http\Request;

class KontrakSewaController extends Controller
{
    public function index()
    {
        $kontrak = KontrakSewa::with(['penyewa', 'kamar'])->latest()->paginate(10);
        return view('kontrak-sewa.index', compact('kontrak'));
    }

    public function create()
    {
        $penyewa = Penyewa::all();
        // Hanya ambil kamar yang tersedia
        $kamar = Kamar::where('status', 'tersedia')->get();
        return view('kontrak-sewa.create', compact('penyewa', 'kamar'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'penyewa_id' => 'required',
            'kamar_id' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'harga_bulanan' => 'required|numeric',
        ]);

        // 1. Buat Kontrak
        KontrakSewa::create($validated + ['status' => 'aktif']);

        // 2. Ubah Status Kamar jadi Terisi
        Kamar::where('id', $request->kamar_id)->update(['status' => 'terisi']);

        return redirect()->route('kontrak-sewa.index')->with('success', 'Kontrak berhasil dibuat!');
    }

    public function destroy(KontrakSewa $kontrakSewa)
    {
        // Kembalikan status kamar jadi tersedia
        Kamar::where('id', $kontrakSewa->kamar_id)->update(['status' => 'tersedia']);
        
        $kontrakSewa->delete();
        return redirect()->route('kontrak-sewa.index')->with('success', 'Kontrak dihapus!');
    }
}