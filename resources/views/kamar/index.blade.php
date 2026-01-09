@extends('layouts.app')

@section('title', 'Data Kamar')

@section('content')
<div class="space-y-6 fade-in">
    {{-- Header --}}
    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Manajemen Kamar</h1>
            <p class="text-gray-500 text-sm mt-1">Daftar seluruh unit kamar kost Anda.</p>
        </div>
        <a href="{{ route('kamar.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-full shadow-lg shadow-blue-200 transition transform hover:-translate-y-0.5 flex items-center gap-2 font-medium">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Kamar
        </a>
    </div>

    {{-- Content Card --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50/50">
                    <tr>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">No. Kamar</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Tipe</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Harga/Bulan</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($kamar as $item)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-6 py-4 font-bold text-gray-800">{{ $item->nomor_kamar }}</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-xs font-bold rounded-full 
                                @if($item->tipe == 'vip') bg-amber-100 text-amber-700
                                @elseif($item->tipe == 'deluxe') bg-purple-100 text-purple-700
                                @else bg-gray-100 text-gray-700 @endif">
                                {{ ucfirst($item->tipe) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-600 font-medium">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">
                            <span class="flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full {{ $item->status == 'tersedia' ? 'bg-emerald-500' : 'bg-red-500' }}"></span>
                                <span class="text-sm font-medium {{ $item->status == 'tersedia' ? 'text-emerald-600' : 'text-red-600' }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('kamar.edit', $item->id) }}" class="text-blue-600 hover:text-blue-800 font-medium text-sm transition">Edit</a>
                            <form action="{{ route('kamar.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus kamar ini?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 font-medium text-sm transition">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-400">
                            <p class="text-lg">📭</p>
                            <p class="mt-2 text-sm">Belum ada data kamar.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        {{-- Pagination --}}
        <div class="px-6 py-4 border-t border-gray-100">
            {{ $kamar->links() }}
        </div>
    </div>
</div>
@endsection