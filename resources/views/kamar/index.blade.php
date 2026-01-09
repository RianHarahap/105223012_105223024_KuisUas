@extends('layouts.app')
@section('title', 'Kamar')
@section('content')
<div class="fade-in space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Data Kamar</h1>
            <p class="text-gray-500">Manajemen unit kost.</p>
        </div>
        <a href="{{ route('kamar.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-full shadow-lg shadow-blue-200 transition">
            + Tambah Kamar
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 font-semibold text-gray-600">Nomor</th>
                    <th class="px-6 py-4 font-semibold text-gray-600">Tipe</th>
                    <th class="px-6 py-4 font-semibold text-gray-600">Harga</th>
                    <th class="px-6 py-4 font-semibold text-gray-600">Status</th>
                    <th class="px-6 py-4 font-semibold text-gray-600 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach($kamar as $item)
                <tr class="hover:bg-blue-50/30 transition">
                    <td class="px-6 py-4 font-bold text-gray-800">{{ $item->nomor_kamar }}</td>
                    <td class="px-6 py-4"><span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-xs font-bold uppercase">{{ $item->tipe }}</span></td>
                    <td class="px-6 py-4 text-blue-600 font-medium">Rp {{ number_format($item->harga_bulanan) }}</td>
                    <td class="px-6 py-4">
                        <span class="w-3 h-3 rounded-full inline-block mr-1 {{ $item->status == 'tersedia' ? 'bg-green-500' : 'bg-red-500' }}"></span>
                        {{ ucfirst($item->status) }}
                    </td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('kamar.edit', $item->id) }}" class="text-blue-500 hover:text-blue-700 text-sm font-semibold">Edit</a>
                        <form action="{{ route('kamar.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus?')">
                            @csrf @method('DELETE')
                            <button class="text-red-400 hover:text-red-600 text-sm font-semibold">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-4">{{ $kamar->links() }}</div>
    </div>
</div>
@endsection