<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenyewaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $penyewa = [
            [
                'nama_lengkap' => 'Ahmad Fauzi',
                'nomor_telepon' => '081234567890',
                'nomor_ktp' => '8888888888888888',
                'alamat_asal' => 'Jl. Merdeka No. 1, Jakarta',
                'pekerjaan' => 'Mahasiswa'
            ],
            [
                'nama_lengkap' => 'Siti Nurhaliza',
                'nomor_telepon' => '089876543210',
                'nomor_ktp' => '999999999999',
                'alamat_asal' => 'Jl. Sudirman No. 2, Bandung',
                'pekerjaan' => 'Karyawan'
            ]
        ];
        foreach ($penyewa as $data) {
            \App\Models\Penyewa::create($data);
    }
}   
}