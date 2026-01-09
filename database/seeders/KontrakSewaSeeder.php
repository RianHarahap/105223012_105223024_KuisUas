<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KontrakSewaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $kontrakSewa = [
            [
                'penyewa_id' => 1,
                'kamar_id' => 1,
                'tanggal_mulai' => '2024-01-01',
                'tanggal_selesai' => '2024-12-31',
                'harga_bulanan' => 2000000,
                'status' => 'Aktif'
            ],
            [
                'penyewa_id' => 2,
                'kamar_id' => 2,
                'tanggal_mulai' => '2024-02-01',
                'tanggal_selesai' => '2024-11-30',
                'harga_bulanan' => 2500000,
                'status' => 'Aktif'
            ]
        ];
        foreach ($kontrakSewa as $data) {
            \App\Models\KontrakSewa::create($data);
    }
}
}