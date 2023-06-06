<?php

namespace Database\Seeders;

use App\Models\Satuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $satuan = [
            'kelompok',
            'lembar',
            'm',
            'm2',
            'orang',
            'paket',
            'pasang',
            'per_satuan_4m',
            'polibag',
            'stel',
            'titik',
            'unit',
        ];

        foreach ($satuan as $data) {
            Satuan::create([
                'nama_satuan' => $data
            ]);
        }
    }
}
