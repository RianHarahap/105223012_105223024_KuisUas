<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $pembayaran = [
            [
                'kontrak_sewa_id' => 1,
                'bulan' => '1',
                'tahun' => '2024',
                'jumlah_bayar' => 2000000,
                'tanggal_bayar' => '2024-01-05',
                'status' => 'Lunas',
                'keterangan' => 'Pembayaran tepat waktu',
                'bukti_transfer' => 'bukti_jan2024.jpg'
            ],
            [
                'kontrak_sewa_id' => 2,
                'bulan' => '2',
                'tahun' => '2024',
                'jumlah_bayar' => 2500000,
                'tanggal_bayar' => '2024-02-10',
                'status' => 'Lunas',
                'keterangan' => 'Pembayaran terlambat',
                'bukti_transfer' => 'bukti_feb2024.jpg'
            ]
        ];
        foreach ($pembayaran as $data) {
            \App\Models\Pembayaran::create($data);
    }
}
}
