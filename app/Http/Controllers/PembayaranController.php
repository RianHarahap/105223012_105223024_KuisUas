<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\KontrakSewa;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::with(['kontrakSewa.penyewa', 'kontrakSewa.kamar'])->latest()->paginate(10);
        return view('pembayaran.index', compact('pembayaran'));
    }

    public function create()
    {
        // Hanya tampilkan kontrak aktif
        $kontrak = KontrakSewa::where('status', 'aktif')->with('penyewa', 'kamar')->get();
        return view('pembayaran.create', compact('kontrak'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kontrak_sewa_id' => 'required',
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer',
            'jumlah_bayar' => 'required|numeric',
            'tanggal_bayar' => 'required|date',
            'status' => 'required',
            'keterangan' => 'nullable'
        ]);

        Pembayaran::create($validated);
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran dicatat!');
    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect()->route('pembayaran.index')->with('success', 'Data pembayaran dihapus!');
    }
}