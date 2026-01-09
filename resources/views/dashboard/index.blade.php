@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-8 fade-in">
    
    {{-- Header --}}
    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Dashboard Overview</h1>
            <p class="text-gray-500 text-sm mt-1">Ringkasan performa bisnis kost Anda hari ini.</p>
        </div>
        <div class="bg-white px-5 py-2 rounded-full shadow-sm border border-gray-100 flex items-center gap-2">
            <span class="relative flex h-3 w-3">
              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
              <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
            </span>
            <span class="text-sm font-semibold text-gray-600">{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</span>
        </div>
    </div>

    {{-- Stats Cards (Colorful Gradients) --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        
        <div class="relative overflow-hidden rounded-2xl p-6 bg-gradient-to-br from-blue-500 to-blue-600 text-white shadow-lg shadow-blue-200 hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
            <div class="relative z-10">
                <p class="text-blue-100 text-xs font-bold uppercase tracking-wider mb-1">Total Kamar</p>
                <div class="flex items-baseline gap-2">
                    <h2 class="text-4xl font-extrabold">{{ $totalKamar ?? 0 }}</h2>
                    <span class="text-sm opacity-80">Unit</span>
                </div>
            </div>
            <div class="absolute right-0 top-0 p-4 opacity-10 transform translate-x-2 -translate-y-2">
                <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
            </div>
        </div>

        <div class="relative overflow-hidden rounded-2xl p-6 bg-gradient-to-br from-emerald-400 to-teal-500 text-white shadow-lg shadow-emerald-200 hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
            <div class="relative z-10">
                <p class="text-emerald-50 text-xs font-bold uppercase tracking-wider mb-1">Penyewa Aktif</p>
                <div class="flex items-baseline gap-2">
                    <h2 class="text-4xl font-extrabold">{{ $totalPenyewa ?? 0 }}</h2>
                    <span class="text-sm opacity-80">Orang</span>
                </div>
            </div>
            <div class="absolute right-0 top-0 p-4 opacity-10 transform translate-x-2 -translate-y-2">
                <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
            </div>
        </div>

        <div class="relative overflow-hidden rounded-2xl p-6 bg-gradient-to-br from-violet-500 to-purple-600 text-white shadow-lg shadow-violet-200 hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
            <div class="relative z-10">
                <p class="text-violet-100 text-xs font-bold uppercase tracking-wider mb-1">Kontrak Berjalan</p>
                <div class="flex items-baseline gap-2">
                    <h2 class="text-4xl font-extrabold">{{ $kontrakAktif ?? 0 }}</h2>
                    <span class="text-sm opacity-80">Aktif</span>
                </div>
            </div>
            <div class="absolute right-0 top-0 p-4 opacity-10 transform translate-x-2 -translate-y-2">
                <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 20 20"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 1 1 0 000-2H3a1 1 0 000 2h1a1 1 0 100 2h-1a1 1 0 000 2h1a1 1 0 100 2h-1a1 1 0 000 2h1a1 1 0 100 2H6a2 2 0 01-2-2v-4zm9-1a1 1 0 100 2H9a1 1 0 000-2h4zm0 4a1 1 0 100 2H9a1 1 0 000-2h4zm0 4a1 1 0 100 2H9a1 1 0 000-2h4z" clip-rule="evenodd"></path></svg>
            </div>
        </div>

        <div class="relative overflow-hidden rounded-2xl p-6 bg-gradient-to-br from-orange-400 to-pink-500 text-white shadow-lg shadow-orange-200 hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
            <div class="relative z-10">
                <p class="text-orange-50 text-xs font-bold uppercase tracking-wider mb-1">Pendapatan (Bln Ini)</p>
                <h2 class="text-2xl font-extrabold mt-1">Rp {{ number_format($totalPendapatanBulanIni ?? 0, 0, ',', '.') }}</h2>
            </div>
            <div class="absolute right-0 top-0 p-4 opacity-10 transform translate-x-2 -translate-y-2">
                <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 20 20"><path d="M8.16 5.314l4.897-1.596A1 1 0 0114.5 4.5h1A1.5 1.5 0 0117 6v12a1.5 1.5 0 01-1.5 1.5h-11A1.5 1.5 0 013 18V6a1.5 1.5 0 011.5-1.5h1a1 1 0 00.543-.148z"></path></svg>
            </div>
        </div>
    </div>

    {{-- Charts Section --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="mb-4 flex justify-between items-center">
                <h3 class="text-lg font-bold text-gray-800">Tren Pendapatan</h3>
            </div>
            <div class="relative h-72">
                <canvas id="revenueChart"></canvas>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col justify-between">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Status Hunian</h3>
            <div class="relative h-48">
                <canvas id="roomStatusChart"></canvas>
            </div>
            <div class="mt-4 space-y-2">
                <div class="flex justify-between text-sm">
                    <span class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-emerald-400"></span> Tersedia</span>
                    <span class="font-bold">{{ $kamarTersedia ?? 0 }}</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-blue-500"></span> Terisi</span>
                    <span class="font-bold">{{ $kamarTerisi ?? 0 }}</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Tables Section --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-50 flex justify-between items-center bg-gray-50/50">
                <h3 class="font-bold text-gray-800">Kontrak Terbaru</h3>
                <a href="{{ route('kontrak-sewa.index') }}" class="text-xs font-semibold text-blue-600 hover:text-blue-700">Lihat Semua →</a>
            </div>
            <div class="p-4 space-y-3">
                @forelse($kontrakTerbaru as $kontrak)
                    <div class="flex items-center justify-between p-3 rounded-xl hover:bg-gray-50 transition border border-transparent hover:border-gray-100">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold text-sm">
                                {{ substr($kontrak->penyewa->nama, 0, 1) }}
                            </div>
                            <div>
                                <p class="text-sm font-bold text-gray-800">{{ $kontrak->penyewa->nama }}</p>
                                <p class="text-xs text-gray-500">Kamar {{ $kontrak->kamar->nomor_kamar }}</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 text-xs font-medium rounded-full {{ $kontrak->status == 'aktif' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                            {{ ucfirst($kontrak->status) }}
                        </span>
                    </div>
                @empty
                    <p class="text-center text-sm text-gray-400 py-4">Belum ada data.</p>
                @endforelse
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-50 flex justify-between items-center bg-gray-50/50">
                <h3 class="font-bold text-gray-800 text-red-600">Tagihan Tertunggak</h3>
                <a href="{{ route('pembayaran.index') }}" class="text-xs font-semibold text-red-500 hover:text-red-700">Kelola →</a>
            </div>
            <div class="p-4 space-y-3">
                @forelse($pembayaranTertunggakList as $bayar)
                    <div class="flex items-center justify-between p-3 rounded-xl bg-red-50/50 border border-red-100">
                        <div>
                            <p class="text-sm font-bold text-gray-800">{{ $bayar->kontrakSewa->penyewa->nama ?? 'Unknown' }}</p>
                            <p class="text-xs text-red-500">Bulan {{ $bayar->bulan }} / {{ $bayar->tahun }}</p>
                        </div>
                        <p class="text-sm font-bold text-red-600">Rp {{ number_format($bayar->jumlah_bayar, 0, ',', '.') }}</p>
                    </div>
                @empty
                    <div class="text-center py-6">
                        <span class="text-2xl">🎉</span>
                        <p class="text-sm text-gray-500 mt-2">Tidak ada tunggakan!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<script>
    // --- Revenue Chart Config ---
    const ctxRev = document.getElementById('revenueChart').getContext('2d');
    const gradientRev = ctxRev.createLinearGradient(0, 0, 0, 400);
    gradientRev.addColorStop(0, 'rgba(99, 102, 241, 0.4)');
    gradientRev.addColorStop(1, 'rgba(99, 102, 241, 0.0)');

    new Chart(ctxRev, {
        type: 'line',
        data: {
            labels: {!! json_encode($revenueLabels) !!},
            datasets: [{
                label: 'Pendapatan',
                data: {!! json_encode($revenueData) !!},
                borderColor: '#6366f1',
                backgroundColor: gradientRev,
                borderWidth: 3,
                tension: 0.4,
                fill: true,
                pointBackgroundColor: '#fff',
                pointBorderColor: '#6366f1',
                pointBorderWidth: 2,
                pointRadius: 4,
                pointHoverRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { 
                    beginAtZero: true, 
                    grid: { borderDash: [4, 4], color: '#f3f4f6' },
                    ticks: { callback: function(value) { return 'Rp ' + (value/1000000) + 'jt'; } }
                },
                x: { grid: { display: false } }
            }
        }
    });

    // --- Room Status Chart Config ---
    const ctxRoom = document.getElementById('roomStatusChart').getContext('2d');
    new Chart(ctxRoom, {
        type: 'doughnut',
        data: {
            labels: ['Tersedia', 'Terisi'],
            datasets: [{
                data: [{{ $kamarTersedia ?? 0 }}, {{ $kamarTerisi ?? 0 }}],
                backgroundColor: ['#34d399', '#3b82f6'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: { legend: { display: false } }
        }
    });
</script>

<style>
    .fade-in { animation: fadeIn 0.6s ease-in-out; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
</style>
@endsection