@extends('layouts.app')
@section('title', 'Tambah Kamar')
@section('content')
<div class="max-w-xl mx-auto bg-white p-8 rounded-2xl shadow-sm border border-gray-100 fade-in">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Tambah Kamar Baru</h2>
    <form action="{{ route('kamar.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-gray-600 text-sm font-bold mb-2">Nomor Kamar</label>
            <input type="text" name="nomor_kamar" class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500" required placeholder="A1">
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-600 text-sm font-bold mb-2">Tipe</label>
                <select name="tipe" class="w-full rounded-lg border-gray-300">
                    <option value="standard">Standard</option>
                    <option value="deluxe">Deluxe</option>
                    <option value="vip">VIP</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-600 text-sm font-bold mb-2">Status</label>
                <select name="status" class="w-full rounded-lg border-gray-300">
                    <option value="tersedia">Tersedia</option>
                    <option value="terisi">Terisi</option>
                </select>
            </div>
        </div>
        <div>
            <label class="block text-gray-600 text-sm font-bold mb-2">Harga Bulanan</label>
            <input type="number" name="harga_bulanan" class="w-full rounded-lg border-gray-300" required>
        </div>
        <div>
            <label class="block text-gray-600 text-sm font-bold mb-2">Fasilitas</label>
            <textarea name="fasilitas" class="w-full rounded-lg border-gray-300" rows="3"></textarea>
        </div>
        <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl shadow-lg shadow-blue-200 transition">Simpan</button>
    </form>
</div>
@endsection