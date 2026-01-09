@extends('layouts.app')
@section('title', 'Catat Pembayaran')
@section('content')
<div class="max-w-xl mx-auto bg-white p-8 rounded-2xl shadow-sm border border-gray-100 fade-in">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Catat Pembayaran</h2>
    <form action="{{ route('pembayaran.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-gray-600 text-sm font-bold mb-2">Pilih Kontrak (Penyewa)</label>
            <select name="kontrak_sewa_id" class="w-full rounded-lg border-gray-300 focus:ring-orange-500 focus:border-orange-500" required>
                @foreach($kontrak as $k)
                    <option value="{{ $k->id }}">{{ $k->penyewa->nama_lengkap }} ({{ $k->kamar->nomor_kamar }})</option>
                @endforeach
            </select>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-600 text-sm font-bold mb-2">Bulan (Angka)</label>
                <input type="number" name="bulan" class="w-full rounded-lg border-gray-300" min="1" max="12" value="{{ date('n') }}" required>
            </div>
            <div>
                <label class="block text-gray-600 text-sm font-bold mb-2">Tahun</label>
                <input type="number" name="tahun" class="w-full rounded-lg border-gray-300" value="{{ date('Y') }}" required>
            </div>
        </div>
        <div>
            <label class="block text-gray-600 text-sm font-bold mb-2">Jumlah Bayar</label>
            <input type="number" name="jumlah_bayar" class="w-full rounded-lg border-gray-300" required>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-600 text-sm font-bold mb-2">Tanggal Bayar</label>
                <input type="date" name="tanggal_bayar" class="w-full rounded-lg border-gray-300" value="{{ date('Y-m-d') }}" required>
            </div>
            <div>
                <label class="block text-gray-600 text-sm font-bold mb-2">Status</label>
                <select name="status" class="w-full rounded-lg border-gray-300">
                    <option value="lunas">Lunas</option>
                    <option value="tertunggak">Tertunggak</option>
                </select>
            </div>
        </div>
        <div>
             <label class="block text-gray-600 text-sm font-bold mb-2">Keterangan</label>
             <textarea name="keterangan" class="w-full rounded-lg border-gray-300" rows="2"></textarea>
        </div>
        <button class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 rounded-xl shadow-lg shadow-orange-200 transition">Simpan</button>
    </form>
</div>
@endsection