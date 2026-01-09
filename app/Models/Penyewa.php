<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyewa extends Model
{
    protected $table = 'penyewa';
    
    // TODO: Definisikan kolom yang dapat diisi (mass assignment)
    protected $fillable = [
        'nama',
        'alamat',
        'no_telepon',
        'email'
    ];
    
    // TODO: Definisikan relasi ke tabel lain
    public function kontrakSewa()
    {
        return $this->hasMany(KontrakSewa::class, 'penyewa_id');
    }
    
}
