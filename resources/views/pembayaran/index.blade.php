@extends('layouts.app')
@section('title', 'Pembayaran')
@section('content')
<div class="fade-in space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Riwayat Pembayaran</h1>
            <p class="text-gray-500">Catatan pemasukan.</p>
        </div>
        <a href="{{ route('pembayaran.create') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2 rounded-full shadow-lg shadow-orange-200 transition">
            + Catat Pembayaran
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 font-semibold text-gray-600">Penyewa</th>
                    <th class="px-6 py-4 font-semibold text-gray-600">Bulan</th>
                    <th class="px-6 py-4 font-semibold text-gray-600">Jumlah</th>
                    <th class="px-6 py-4 font-semibold text-gray-600">Tanggal</th>
                    <th class="px-6 py-4 font-semibold text-gray-600">Status</th>
                    <th class="px-6 py-4 font-semibold text-gray-600 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach($pembayaran as $item)
                <tr class="hover:bg-orange-50/30 transition">
                    <td class="px-6 py-4 font-bold text-gray-800">
                        {{ $item->kontrakSewa->penyewa->nama_lengkap }}
                        <div class="text-xs text-gray-400 font-normal">Kamar {{ $item->kontrakSewa->kamar->nomor_kamar }}</div>
                    </td>
                    <td class="px-6 py-4 text-gray-600">{{ $item->bulan }} / {{ $item->tahun }}</td>
                    <td class="px-6 py-4 font-bold text-gray-800">Rp {{ number_format($item->jumlah_bayar) }}</td>
                    <td class="px-6 py-4 text-gray-500 text-sm">{{ $item->tanggal_bayar }}</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase {{ $item->status == 'lunas' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ $item->status }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <form action="{{ route('pembayaran.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus?')">
                            @csrf @method('DELETE')
                            <button class="text-red-400 hover:text-red-600 text-sm font-semibold">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-4">{{ $pembayaran->links() }}</div>
    </div>
</div>
@endsection