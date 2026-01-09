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
        $kamar = Kamar::where('status', 'tersedia')->get(); // Hanya kamar tersedia
        return view('kontrak-sewa.create', compact('penyewa', 'kamar'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'penyewa_id' => 'required|exists:penyewa,id',
            'kamar_id' => 'required|exists:kamar,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'harga_bulanan' => 'required|numeric',
        ]);

        // Buat Kontrak
        $kontrak = KontrakSewa::create($validated + ['status' => 'aktif']);

        // Update Status Kamar jadi 'terisi'
        $kamar = Kamar::find($request->kamar_id);
        $kamar->update(['status' => 'terisi']);

        return redirect()->route('kontrak-sewa.index')->with('success', 'Kontrak berhasil dibuat!');
    }

    public function destroy(KontrakSewa $kontrakSewa)
    {
        // Kembalikan status kamar jadi 'tersedia' saat kontrak dihapus
        $kontrakSewa->kamar->update(['status' => 'tersedia']);
        $kontrakSewa->delete();
        
        return redirect()->route('kontrak-sewa.index')->with('success', 'Kontrak dihapus & Kamar tersedia kembali!');
    }
}