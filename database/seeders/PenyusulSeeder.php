<?php

namespace Database\Seeders;

use App\Models\Penyusul;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use DateTime;

class PenyusulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jabatan = [
            'Penyusul Tes',
            'Sekretariat Desa',
            'Pelaksana Teknis',
            'Kepala Urusan Keuangan',
            'Kepala Urusan Perencanaan',
            'Seksi Pemerintahan',
        ];

        $faker = Faker::create('id_ID');

        foreach ($jabatan as $data) {
            Penyusul::create([
                'id_wilayah' => $faker->numberBetween(1, 25),
                'username' => $faker->userName(),
                'password' => $faker->password(),
                'email' => $faker->unique()->safeEmail(),
                'name' => $faker->name(),
                'jabatan' => $data,
                'no_telp' => $faker->numerify('08###########'),
                'foto' => $faker->imageUrl(640, 480, 'animals', true),
                'created_at' => new DateTime(now()),
                'updated_at' => new DateTime(now())
            ]);
        }
    }
}
