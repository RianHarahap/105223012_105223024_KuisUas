@extends('layouts.app')
@section('title', 'Buat Kontrak')
@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-sm border border-gray-100 fade-in">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Buat Kontrak Baru</h2>
    
    @if($kamar->isEmpty())
        <div class="bg-red-50 text-red-600 p-4 rounded-lg mb-4 text-sm font-bold">
            Tidak ada kamar yang tersedia saat ini.
        </div>
    @endif

    <form action="{{ route('kontrak-sewa.store') }}" method="POST" class="space-y-4">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-600 text-sm font-bold mb-2">Pilih Penyewa</label>
                <select name="penyewa_id" class="w-full rounded-lg border-gray-300 focus:ring-violet-500 focus:border-violet-500" required>
                    @foreach($penyewa as $p)
                        <option value="{{ $p->id }}">{{ $p->nama_lengkap }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-gray-600 text-sm font-bold mb-2">Pilih Kamar (Tersedia)</label>
                <select name="kamar_id" class="w-full rounded-lg border-gray-300 focus:ring-violet-500 focus:border-violet-500" required>
                    @foreach($kamar as $k)
                        <option value="{{ $k->id }}">{{ $k->nomor_kamar }} - Rp {{ number_format($k->harga_bulanan) }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-600 text-sm font-bold mb-2">Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" class="w-full rounded-lg border-gray-300" required>
            </div>
            <div>
                <label class="block text-gray-600 text-sm font-bold mb-2">Tanggal Selesai</label>
                <input type="date" name="tanggal_selesai" class="w-full rounded-lg border-gray-300" required>
            </div>
        </div>

        <div>
            <label class="block text-gray-600 text-sm font-bold mb-2">Harga Deal (Bulanan)</label>
            <input type="number" name="harga_bulanan" class="w-full rounded-lg border-gray-300" required>
        </div>

        <button class="w-full bg-violet-600 hover:bg-violet-700 text-white font-bold py-3 rounded-xl shadow-lg shadow-violet-200 transition">Simpan Kontrak</button>
    </form>
</div>
@endsection