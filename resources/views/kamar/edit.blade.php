@extends('layouts.app')
@section('title', 'Edit Kamar')
@section('content')
<div class="max-w-xl mx-auto bg-white p-8 rounded-2xl shadow-sm border border-gray-100 fade-in">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Kamar</h2>
    <form action="{{ route('kamar.update', $kamar->id) }}" method="POST" class="space-y-4">
        @csrf @method('PUT')
        <div>
            <label class="block text-gray-600 text-sm font-bold mb-2">Nomor Kamar</label>
            <input type="text" name="nomor_kamar" value="{{ $kamar->nomor_kamar }}" class="w-full rounded-lg border-gray-300" required>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-600 text-sm font-bold mb-2">Tipe</label>
                <select name="tipe" class="w-full rounded-lg border-gray-300">
                    <option value="standard" {{ $kamar->tipe == 'standard' ? 'selected' : '' }}>Standard</option>
                    <option value="deluxe" {{ $kamar->tipe == 'deluxe' ? 'selected' : '' }}>Deluxe</option>
                    <option value="vip" {{ $kamar->tipe == 'vip' ? 'selected' : '' }}>VIP</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-600 text-sm font-bold mb-2">Status</label>
                <select name="status" class="w-full rounded-lg border-gray-300">
                    <option value="tersedia" {{ $kamar->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="terisi" {{ $kamar->status == 'terisi' ? 'selected' : '' }}>Terisi</option>
                </select>
            </div>
        </div>
        <div>
            <label class="block text-gray-600 text-sm font-bold mb-2">Harga Bulanan</label>
            <input type="number" name="harga_bulanan" value="{{ $kamar->harga_bulanan }}" class="w-full rounded-lg border-gray-300" required>
        </div>
        <div>
            <label class="block text-gray-600 text-sm font-bold mb-2">Fasilitas</label>
            <textarea name="fasilitas" class="w-full rounded-lg border-gray-300" rows="3">{{ $kamar->fasilitas }}</textarea>
        </div>
        <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl shadow-lg shadow-blue-200 transition">Update</button>
    </form>
</div>
@endsection