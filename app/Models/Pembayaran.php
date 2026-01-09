<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    
    // TODO: Definisikan kolom yang dapat diisi (mass assignment)
    // BONUS: Jangan lupa tambahkan 'bukti_transfer' jika mengerjakan fitur upload
    protected $fillable = [
        'kontrak_sewa_id',
        'bulan',
        'tahun',
        'jumlah_bayar',
        'tanggal_bayar',
        'status',
        'keterangan',
        'bukti_transfer'
    ];
    
    // TODO: Cast kolom tanggal ke tipe date
    protected $casts = [
        'tanggal_bayar' => 'date',
    ];
    
    // TODO: Definisikan relasi ke tabel KontrakSewa
    public function kontrakSewa()
    {
        return $this->belongsTo(KontrakSewa::class, 'kontrak_sewa_id');
    }
    
}
