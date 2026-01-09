<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kamar;
use App\Models\Penyewa;
use App\Models\KontrakSewa;
use App\Models\Pembayaran;

class KamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $kamar = [
            [
                'nomor_kamar' => '101',
                'harga' => 2000000,
                'status' => 'Tersedia',
                'tipe' => 'deluxe',
                'fasilitas' => 'AC, Kamar Mandi Dalam'
            ],
            [
                'nomor_kamar' => '102',
                'harga' => 2500000,
                'status' => 'Tersedia',
                'tipe' => 'vip',
                'fasilitas' => 'AC, Kamar Mandi Dalam, Balkon'
            ],
            [
                'nomor_kamar' => '201',
                'harga' => 3000000,
                'status' => 'Tersedia',
                'tipe' => 'deluxe',
                'fasilitas' => 'AC, Kamar Mandi Dalam, Balkon, Dapur Kecil'
            ],
            [
                'nomor_kamar' => '202',
                'harga' => 3500000,
                'status' => 'Tersedia',
                'tipe' => 'standard',
                'fasilitas' => 'AC, Kamar Mandi Dalam, Balkon, Dapur Kecil, Ruang Tamu'
            ],
            [
                'nomor_kamar' => '301',
                'harga' => 4000000,
                'status' => 'Tersedia',
                'tipe' => 'standard',
                'fasilitas' => 'AC, Kamar Mandi Dalam, Balkon, Dapur Kecil, Ruang Tamu, Jacuzzi'
            ],
            [
                'nomor_kamar' => '302',
                'harga' => 4500000,
                'status' => 'Tersedia',
                'tipe' => 'deluxe',
                'fasilitas' => 'AC, Kamar Mandi Dalam, Balkon, Dapur Kecil, Ruang Tamu, Jacuzzi, Pemandangan Laut'
            ],
            [
                'nomor_kamar' => '401',
                'harga' => 5000000,
                'status' => 'Tersedia',
                'tipe' => 'deluxe',
                'fasilitas' => 'AC, Kamar Mandi Dalam, Balkon, Dapur Kecil, Ruang Tamu, Jacuzzi, Pemandangan Laut, Layanan Pramutamu'
            ],

        ];
        foreach ($kamar as $data) {
            \App\Models\Kamar::create($data);
        }   
    }

}