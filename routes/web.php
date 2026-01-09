<?php

use Illuminate\Support\Facades\Route;
// TODO: Import controllers yang sudah dibuat

// TODO: Route untuk Dashboard (halaman utama)
Route::get('/', function () {
    return view('dashboard.index');
})->name('dashboard');


// TODO: Resource routes untuk CRUD Kamar
Route::resource('kamar', \App\Http\Controllers\KamarController::class);

// TODO: Resource routes untuk CRUD Penyewa
Route::resource('penyewa', \App\Http\Controllers\PenyewaController::class);

// TODO: Resource routes untuk CRUD Kontrak Sewa
Route::resource('kontrak-sewa', \App\Http\Controllers\KontrakSewaController::class);

// TODO: Resource routes untuk CRUD Pembayaran
Route::resource('pembayaran', \App\Http\Controllers\PembayaranController::class);
