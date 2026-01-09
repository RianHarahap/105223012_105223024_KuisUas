<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KontrakSewa extends Model
{
    protected $table = 'kontrak_sewa';
    
    // TODO: Definisikan kolom yang dapat diisi (mass assignment)
    protected $fillable = [
        'penyewa_id',
        'kamar_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'harga_bulanan',
        'status'
    ];
    
    // TODO: Cast kolom tanggal ke tipe date
    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];
    
    // TODO: Definisikan relasi ke tabel Penyewa, Kamar, dan Pembayaran
    public function penyewa()
    {
        return $this->belongsTo(Penyewa::class, 'penyewa_id');
    }
    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'kontrak_sewa_id');
    }
    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'kamar_id');
    }
}