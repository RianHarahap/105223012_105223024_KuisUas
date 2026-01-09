@extends('layouts.app')
@section('title', 'Kontrak Sewa')
@section('content')
<div class="fade-in space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Kontrak Sewa</h1>
            <p class="text-gray-500">Transaksi sewa aktif.</p>
        </div>
        <a href="{{ route('kontrak-sewa.create') }}" class="bg-violet-600 hover:bg-violet-700 text-white px-5 py-2 rounded-full shadow-lg shadow-violet-200 transition">
            + Buat Kontrak
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 font-semibold text-gray-600">Penyewa</th>
                    <th class="px-6 py-4 font-semibold text-gray-600">Kamar</th>
                    <th class="px-6 py-4 font-semibold text-gray-600">Durasi</th>
                    <th class="px-6 py-4 font-semibold text-gray-600">Status</th>
                    <th class="px-6 py-4 font-semibold text-gray-600 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach($kontrak as $item)
                <tr class="hover:bg-violet-50/30 transition">
                    <td class="px-6 py-4 font-bold text-gray-800">{{ $item->penyewa->nama_lengkap }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $item->kamar->nomor_kamar }}</td>
                    <td class="px-6 py-4 text-xs text-gray-500">
                        {{ $item->tanggal_mulai }} <br>s/d<br> {{ $item->tanggal_selesai }}
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 bg-violet-100 text-violet-700 rounded-full text-xs font-bold uppercase">{{ $item->status }}</span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <form action="{{ route('kontrak-sewa.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus Kontrak? Kamar akan otomatis menjadi tersedia.')">
                            @csrf @method('DELETE')
                            <button class="text-red-400 hover:text-red-600 text-sm font-semibold">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-4">{{ $kontrak->links() }}</div>
    </div>
</div>
@endsection