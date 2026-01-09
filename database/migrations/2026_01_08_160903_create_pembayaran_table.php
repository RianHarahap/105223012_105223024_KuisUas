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
        Schema::create('pembayaran', function (Blueprint $table) {            
            // TODO: Tambahkan kolom-kolom sesuai requirements:
            // - kontrak_sewa_id: foreignId() ke tabel kontrak_sewa (gunakan constrained()->cascadeOnDelete())
            // - bulan: integer (1-12 untuk Januari-Desember)
            // - tahun: integer (contoh: 2026)
            // - jumlah_bayar: decimal(10,2)
            // - tanggal_bayar: date
            // - status: enum('lunas', 'tertunggak'), default 'tertunggak'
            // - keterangan: text()->nullable() (catatan tambahan)
            
            // TODO BONUS: Jika mengerjakan fitur bonus upload bukti transfer
            // - bukti_transfer: string()->nullable() (path file image)
            $table->id();
            $table->foreignId('kontrak_sewa_id')->constrained('kontrak_sewa')->cascadeOnDelete();
            $table->integer('bulan');
            $table->integer('tahun');
            $table->decimal('jumlah_bayar', 10, 2); 
            $table->date('tanggal_bayar');
            $table->enum('status', ['lunas', 'tertunggak'])->default('tertunggak');
            $table->text('keterangan')->nullable();
            $table->string('bukti_transfer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
