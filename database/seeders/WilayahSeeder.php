<?php

namespace Database\Seeders;

use App\Models\Wilayah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataKelurahan = [
            // Klojen
            'Klojen',
            'Rampal Celaket',
            'Oro-Oro Dowo',
            'Samaan',
            'Penanggungan',
            'Gadingasri',
            'Bareng',
            'Kasin',
            'Sukoharjo',
            'Kauman',
            'Kiduldalem',
            //Blimbing
            'Kesatrian',
            'Polehan',
            'Purwantoro',
            'Bunulrejo',
            'Pandanwangi',
            'Blimbing',
            'Purwodadi',
            'Arjosari',
            'Balearjosari',
            'Jodipan',
            'Polowijen',
            // Kedungkandang
            'Arjowinangun',
            'Tlogowaru',
            'Mergosono',
            'Bumiayu',
            'Wonokoyo',
            'Buring',
            'Kotalama',
            'Kedungkandang',
            'Cemorokandang',
            'Lesanpuro',
            'Madyopuro',
            'Sawojajar',
            // Lowokwaru
            'Jatimulyo',
            'Lowokwaru',
            'Tulusrejo',
            'Mojolangu',
            'Tunjungsekar',
            'Tasikmadu',
            'Tunggulwulung',
            'Dinoyo',
            'Merjosari',
            'Tlogomas',
            'Sumbersari',
            'Ketawanggede',
            // Sukun
            'Bandulan',
            'Karangbesuki',
            'Pisangcandi',
            'Mulyorejo',
            'Sukun',
            'Tanjungrejo',
            'Bakalankrajan',
            'Bandungrejosari',
            'Ciptomulyo',
            'Gadang',
            'Kebonsari',
        ];

        foreach ($dataKelurahan as $data) {
            Wilayah::create([
                'nama_wilayah' => $data,
            ]);
        }
    }
}
