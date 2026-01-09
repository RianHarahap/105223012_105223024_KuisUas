@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-8">
    {{-- Header --}}
    <div>
        <h1 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-cyan-600 bg-clip-text text-transparent">Dashboard</h1>
        <p class="text-gray-600 mt-2">Selamat datang kembali! Berikut ringkasan sistem Anda.</p>
    </div>

    {{-- Stats Cards - Colorful --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        {{-- Total Kamar --}}
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-medium mb-2">Total Kamar</p>
                    <p class="text-4xl font-bold">{{ $totalKamar ?? 0 }}</p>
                </div>
                <div class="bg-blue-400 bg-opacity-30 p-4 rounded-lg">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Total Penyewa --}}
        <div class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl shadow-lg p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-100 text-sm font-medium mb-2">Total Penyewa</p>
                    <p class="text-4xl font-bold">{{ $totalPenyewa ?? 0 }}</p>
                </div>
                <div class="bg-green-400 bg-opacity-30 p-4 rounded-lg">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Kontrak Aktif --}}
        <div class="bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl shadow-lg p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-100 text-sm font-medium mb-2">Kontrak Aktif</p>
                    <p class="text-4xl font-bold">{{ $kontrakAktif ?? 0 }}</p>
                </div>
                <div class="bg-purple-400 bg-opacity-30 p-4 rounded-lg">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 1 1 0 000-2H3a1 1 0 000 2h1a1 1 0 100 2h-1a1 1 0 000 2h1a1 1 0 100 2h-1a1 1 0 000 2h1a1 1 0 100 2H6a2 2 0 01-2-2v-4zm9-1a1 1 0 100 2H9a1 1 0 000-2h4zm0 4a1 1 0 100 2H9a1 1 0 000-2h4zm0 4a1 1 0 100 2H9a1 1 0 000-2h4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Pembayaran Bulan Ini --}}
        <div class="bg-gradient-to-br from-yellow-500 to-orange-600 rounded-xl shadow-lg p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-yellow-100 text-sm font-medium mb-2">Pendapatan</p>
                    <p class="text-2xl font-bold">Rp {{ number_format($pembayaranBulanIni ?? 0, 0, ',', '.') }}</p>
                </div>
                <div class="bg-yellow-400 bg-opacity-30 p-4 rounded-lg">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M8.16 5.314l4.897-1.596A1 1 0 0114.5 4.5h1A1.5 1.5 0 0117 6v12a1.5 1.5 0 01-1.5 1.5h-11A1.5 1.5 0 013 18V6a1.5 1.5 0 011.5-1.5h1a1 1 0 00.543-.148z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    {{-- Charts Section --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- Status Kamar Chart --}}
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="mb-6">
                <h3 class="text-xl font-bold text-gray-900">Status Kamar</h3>
                <p class="text-sm text-gray-500 mt-1">Distribusi status kamar saat ini</p>
            </div>
            <div class="relative h-64">
                <canvas id="statusKamarChart"></canvas>
            </div>
        </div>

        {{-- Tipe Kamar Chart --}}
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="mb-6">
                <h3 class="text-xl font-bold text-gray-900">Tipe Kamar</h3>
                <p class="text-sm text-gray-500 mt-1">Komposisi tipe kamar</p>
            </div>
            <div class="relative h-64">
                <canvas id="tipeKamarChart"></canvas>
            </div>
        </div>
    </div>

    {{-- Monthly Revenue Chart --}}
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="mb-6">
            <h3 class="text-xl font-bold text-gray-900">Pendapatan Bulanan</h3>
            <p class="text-sm text-gray-500 mt-1">Tren pendapatan 6 bulan terakhir</p>
        </div>
        <div class="relative h-80">
            <canvas id="revenueChart"></canvas>
        </div>
    </div>

    {{-- Quick Access Section --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Kamar Management --}}
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-xl font-bold text-gray-900">Data Kamar</h3>
                    <p class="text-sm text-gray-500 mt-1">Status distribusi kamar</p>
                </div>
                <a href="{{ route('kamar.index') ?? '#' }}" class="text-blue-600 hover:text-blue-800 font-semibold text-sm">Lihat →</a>
            </div>
            <div class="space-y-3">
                <div class="flex justify-between items-center p-3 bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg border border-green-200">
                    <span class="text-sm font-medium text-gray-700">Kamar Tersedia</span>
                    <span class="text-lg font-bold text-green-600">{{ $kamarTersedia ?? 0 }}</span>
                </div>
                <div class="flex justify-between items-center p-3 bg-gradient-to-r from-blue-50 to-cyan-50 rounded-lg border border-blue-200">
                    <span class="text-sm font-medium text-gray-700">Kamar Terisi</span>
                    <span class="text-lg font-bold text-blue-600">{{ $kamarTerisi ?? 0 }}</span>
                </div>
                <div class="flex justify-between items-center p-3 bg-gradient-to-r from-orange-50 to-yellow-50 rounded-lg border border-orange-200">
                    <span class="text-sm font-medium text-gray-700">Pemeliharaan</span>
                    <span class="text-lg font-bold text-orange-600">{{ $kamarPemeliharaan ?? 0 }}</span>
                </div>
            </div>
        </div>

        {{-- Pembayaran Status --}}
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-xl font-bold text-gray-900">Pembayaran</h3>
                    <p class="text-sm text-gray-500 mt-1">Status pembayaran penyewa</p>
                </div>
                <a href="{{ route('pembayaran.index') ?? '#' }}" class="text-blue-600 hover:text-blue-800 font-semibold text-sm">Lihat →</a>
            </div>
            <div class="space-y-3">
                <div class="flex justify-between items-center p-3 bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg border border-green-200">
                    <span class="text-sm font-medium text-gray-700">Pembayaran Lunas</span>
                    <span class="text-lg font-bold text-green-600">{{ $pembayaranLunas ?? 0 }}</span>
                </div>
                <div class="flex justify-between items-center p-3 bg-gradient-to-r from-yellow-50 to-orange-50 rounded-lg border border-yellow-200">
                    <span class="text-sm font-medium text-gray-700">Pembayaran Pending</span>
                    <span class="text-lg font-bold text-yellow-600">{{ $pembayaranPending ?? 0 }}</span>
                </div>
                <div class="flex justify-between items-center p-3 bg-gradient-to-r from-red-50 to-pink-50 rounded-lg border border-red-200">
                    <span class="text-sm font-medium text-gray-700">Pembayaran Tertunggak</span>
                    <span class="text-lg font-bold text-red-600">{{ $pembayaranTertunggak ?? 0 }}</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Recent Activity Section --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- Kontrak Terbaru --}}
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900">Kontrak Terbaru</h3>
                <a href="{{ route('kontrak-sewa.index') ?? '#' }}" class="text-blue-600 hover:text-blue-800 text-sm font-semibold">Lihat Semua →</a>
            </div>
            <div class="space-y-3">
                @forelse($kontrakTerbaru ?? [] as $kontrak)
                    <div class="p-4 bg-gradient-to-r from-blue-50 to-cyan-50 rounded-lg border border-blue-200 hover:border-blue-400 transition">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-sm font-semibold text-gray-900">{{ $kontrak->penyewa->nama ?? 'N/A' }}</p>
                                <p class="text-xs text-gray-500 mt-1">Kamar {{ $kontrak->kamar->nomor_kamar ?? 'N/A' }}</p>
                            </div>
                            <span class="text-xs px-3 py-1 bg-blue-200 text-blue-800 rounded-full font-semibold">{{ $kontrak->status ?? 'Aktif' }}</span>
                        </div>
                    </div>
                @empty
                    <p class="text-sm text-gray-500 py-4 text-center">Belum ada kontrak terbaru</p>
                @endforelse
            </div>
        </div>

        {{-- Pembayaran Tertunggak --}}
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900">Pembayaran Tertunggak</h3>
                <a href="{{ route('pembayaran.index') ?? '#' }}" class="text-blue-600 hover:text-blue-800 text-sm font-semibold">Lihat Semua →</a>
            </div>
            <div class="space-y-3">
                @forelse($pembayaranTertunggakList ?? [] as $pembayaran)
                    <div class="p-4 bg-gradient-to-r from-red-50 to-pink-50 rounded-lg border border-red-200 hover:border-red-400 transition">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-sm font-semibold text-gray-900">{{ $pembayaran->kontrakSewa->penyewa->nama ?? 'N/A' }}</p>
                                <p class="text-xs text-gray-500 mt-1">Rp {{ number_format($pembayaran->jumlah_bayar ?? 0, 0, ',', '.') }}</p>
                            </div>
                            <span class="text-xs px-3 py-1 bg-red-200 text-red-800 rounded-full font-semibold">Tertunggak</span>
                        </div>
                    </div>
                @empty
                    <p class="text-sm text-gray-500 py-4 text-center">Tidak ada pembayaran tertunggak</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

<script>
    // Status Kamar Chart
    const statusKamarCtx = document.getElementById('statusKamarChart');
    if (statusKamarCtx) {
        new Chart(statusKamarCtx, {
            type: 'doughnut',
            data: {
                labels: ['Tersedia', 'Terisi', 'Pemeliharaan'],
                datasets: [{
                    data: [{{ $kamarTersedia ?? 0 }}, {{ $kamarTerisi ?? 0 }}, {{ $kamarPemeliharaan ?? 0 }}],
                    backgroundColor: [
                        '#10b981',
                        '#3b82f6',
                        '#f59e0b'
                    ],
                    borderColor: '#fff',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: { size: 12 },
                            padding: 15,
                            usePointStyle: true
                        }
                    }
                }
            }
        });
    }

    // Tipe Kamar Chart
    const tipeKamarCtx = document.getElementById('tipeKamarChart');
    if (tipeKamarCtx) {
        new Chart(tipeKamarCtx, {
            type: 'bar',
            data: {
                labels: ['Standard', 'Deluxe', 'VIP'],
                datasets: [{
                    label: 'Jumlah Kamar',
                    data: [8, 5, 3],
                    backgroundColor: [
                        '#6366f1',
                        '#ec4899',
                        '#f59e0b'
                    ],
                    borderRadius: 8,
                    borderSkipped: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            font: { size: 12 }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 2
                        }
                    }
                }
            }
        });
    }

    // Revenue Chart
    const revenueCtx = document.getElementById('revenueChart');
    if (revenueCtx) {
        new Chart(revenueCtx, {
            type: 'line',
            data: {
                labels: ['Agustus', 'September', 'Oktober', 'November', 'Desember', 'Januari'],
                datasets: [{
                    label: 'Pendapatan (Rp)',
                    data: [4000000, 4500000, 5200000, 4800000, 5500000, 6200000],
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#3b82f6',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 7
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            font: { size: 12 }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + (value / 1000000).toFixed(1) + 'M';
                            }
                        }
                    }
                }
            }
        });
    }
</script>
