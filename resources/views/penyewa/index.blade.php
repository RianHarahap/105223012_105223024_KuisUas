@extends('layouts.app')
@section('title', 'Penyewa')
@section('content')
<div class="fade-in space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Data Penyewa</h1>
            <p class="text-gray-500">Daftar penghuni kost.</p>
        </div>
        <a href="{{ route('penyewa.create') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2 rounded-full shadow-lg shadow-emerald-200 transition">
            + Tambah Penyewa
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 font-semibold text-gray-600">Nama</th>
                    <th class="px-6 py-4 font-semibold text-gray-600">Kontak</th>
                    <th class="px-6 py-4 font-semibold text-gray-600">KTP</th>
                    <th class="px-6 py-4 font-semibold text-gray-600 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach($penyewa as $item)
                <tr class="hover:bg-emerald-50/30 transition">
                    <td class="px-6 py-4 font-bold text-gray-800">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xs">{{ substr($item->nama_lengkap, 0, 1) }}</div>
                            {{ $item->nama_lengkap }}
                        </div>
                    </td>
                    <td class="px-6 py-4 text-gray-600">{{ $item->nomor_telepon }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $item->nomor_ktp }}</td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('penyewa.edit', $item->id) }}" class="text-emerald-600 hover:text-emerald-800 text-sm font-semibold">Edit</a>
                        <form action="{{ route('penyewa.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus?')">
                            @csrf @method('DELETE')
                            <button class="text-red-400 hover:text-red-600 text-sm font-semibold">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-4">{{ $penyewa->links() }}</div>
    </div>
</div>
@endsection