<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kontrak_sewa', function (Blueprint $table) {
            // TODO: Tambahkan kolom-kolom sesuai requirements:
            // - penyewa_id: foreignId() ke tabel penyewa (gunakan constrained()->cascadeOnDelete())
            // - kamar_id: foreignId() ke tabel kamar (gunakan constrained()->cascadeOnDelete())
            // - tanggal_mulai: date
            // - tanggal_selesai: date
            // - harga_bulanan: decimal(10,2)
            // - status: enum('aktif', 'selesai'), default 'aktif'
            $table->id();
            $table->foreignId('penyewa_id')->constrained('penyewa')->cascadeOnDelete();
            $table->foreignId('kamar_id')->constrained('kamar')->cascadeOnDelete();
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->decimal('harga_bulanan', 10, 2);
            $table->enum('status', ['aktif', 'selesai'])->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontrak_sewa');
    }
};
