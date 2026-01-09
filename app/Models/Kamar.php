<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;
    protected $table = 'kamar';
    protected $guarded = ['id'];

    public function kontrakSewa()
    {
        return $this->hasMany(KontrakSewa::class);
    }
}