<?php

use Illuminate\Support\Facades\Route;
// TODO: Import controllers yang sudah dibuat

// TODO: Route untuk Dashboard (halaman utama)
Route::get('/', function () {
    return view('dashboard.index');
});


// TODO: Resource routes untuk CRUD Kamar
route::resource('kamar', \App\Http\Controllers\KamarController::class);

// TODO: Resource routes untuk CRUD Penyewa
route::resource('penyewa', \App\Http\Controllers\PenyewaController::class);

// TODO: Resource routes untuk CRUD Kontrak Sewa
Route::resource('kontrak-sewa', KontrakSewaController::class);

// TODO: Resource routes untuk CRUD Pembayaran
Route::resource('pembayaran', PembayaranController::class);
