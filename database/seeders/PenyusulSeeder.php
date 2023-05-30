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
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 5; $i++) {
            DB::table('penyusul')->insert([
                'id_user' => $faker->numberBetween(1, 5),
                'id_wilayah' => $faker->numberBetween(1, 25),
                'foto' => $faker->imageUrl(640, 480, 'animals', true),
                'created_at' => new DateTime(now()),
                'updated_at' => new DateTime(now())
            ]);
        };

        // foreach ($jabatan as $data) {
        //     Penyusul::create([
        //         'id_user' => $faker->numberBetween(1, 5),
        //         'id_wilayah' => $faker->numberBetween(1, 25),
        //         // 'username' => $faker->userName(),
        //         // 'password' => $faker->password(),
        //         // 'email' => $faker->unique()->safeEmail(),
        //         // 'name' => $faker->name(),
        //         // 'jabatan' => $data,
        //         'foto' => $faker->imageUrl(640, 480, 'animals', true),
        //         'created_at' => new DateTime(now()),
        //         'updated_at' => new DateTime(now())
        //     ]);
        // }
    }
}
