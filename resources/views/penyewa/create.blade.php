@extends('layouts.app')
@section('title', 'Tambah Penyewa')
@section('content')
<div class="max-w-xl mx-auto bg-white p-8 rounded-2xl shadow-sm border border-gray-100 fade-in">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Registrasi Penyewa</h2>
    <form action="{{ route('penyewa.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-gray-600 text-sm font-bold mb-2">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="w-full rounded-lg border-gray-300 focus:ring-emerald-500 focus:border-emerald-500" required>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-600 text-sm font-bold mb-2">No. KTP</label>
                <input type="number" name="nomor_ktp" class="w-full rounded-lg border-gray-300" required>
            </div>
            <div>
                <label class="block text-gray-600 text-sm font-bold mb-2">No. Telepon</label>
                <input type="text" name="nomor_telepon" class="w-full rounded-lg border-gray-300" required>
            </div>
        </div>
        <div>
            <label class="block text-gray-600 text-sm font-bold mb-2">Pekerjaan</label>
            <input type="text" name="pekerjaan" class="w-full rounded-lg border-gray-300" required>
        </div>
        <div>
            <label class="block text-gray-600 text-sm font-bold mb-2">Alamat Asal</label>
            <textarea name="alamat_asal" class="w-full rounded-lg border-gray-300" rows="3"></textarea>
        </div>
        <button class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 rounded-xl shadow-lg shadow-emerald-200 transition">Simpan</button>
    </form>
</div>
@endsection