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
        $kontrak = KontrakSewa::where('status', 'aktif')->with('penyewa', 'kamar')->get();
        return view('pembayaran.create', compact('kontrak'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kontrak_sewa_id' => 'required|exists:kontrak_sewa,id',
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|min:2024',
            'jumlah_bayar' => 'required|numeric',
            'tanggal_bayar' => 'required|date',
            'status' => 'required|in:lunas,tertunggak',
            'keterangan' => 'nullable|string'
        ]);

        Pembayaran::create($validated);

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dicatat!');
    }
    
    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect()->route('pembayaran.index')->with('success', 'Data pembayaran dihapus!');
    }
}