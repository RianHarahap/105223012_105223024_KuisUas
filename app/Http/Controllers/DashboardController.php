<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\Penyewa;
use App\Models\KontrakSewa;
use App\Models\Pembayaran;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. KARTU STATISTIK UTAMA
        $totalKamar = Kamar::count();
        $totalPenyewa = Penyewa::count();
        $kontrakAktif = KontrakSewa::where('status', 'aktif')->count();
        
        // Pendapatan Bulan Ini (Hanya yang status Lunas di bulan & tahun ini)
        $totalPendapatanBulanIni = Pembayaran::where('status', 'lunas')
            ->where('bulan', date('n'))
            ->where('tahun', date('Y'))
            ->sum('jumlah_bayar');

        // 2. DATA UNTUK GRAFIK STATUS KAMAR
        $kamarTersedia = Kamar::where('status', 'tersedia')->count();
        $kamarTerisi = Kamar::where('status', 'terisi')->count();

        // 3. DATA UNTUK GRAFIK PENDAPATAN (6 Bulan Terakhir)
        $revenueLabels = [];
        $revenueData = [];
        
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $revenueLabels[] = $date->translatedFormat('F'); // Nama Bulan (Januari, dst)
            
            $revenue = Pembayaran::where('status', 'lunas')
                ->where('bulan', $date->month)
                ->where('tahun', $date->year)
                ->sum('jumlah_bayar');
                
            $revenueData[] = $revenue;
        }

        // 4. DATA TABEL (List Terbaru)
        $kontrakTerbaru = KontrakSewa::with(['penyewa', 'kamar'])
            ->latest()
            ->take(5)
            ->get();

        $pembayaranTertunggakList = Pembayaran::with(['kontrakSewa.penyewa', 'kontrakSewa.kamar'])
            ->where('status', 'tertunggak')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.index', compact(
            'totalKamar', 'totalPenyewa', 'kontrakAktif', 'totalPendapatanBulanIni',
            'kamarTersedia', 'kamarTerisi',
            'revenueLabels', 'revenueData',
            'kontrakTerbaru', 'pembayaranTertunggakList'
        ));
    }
}