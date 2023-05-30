<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use DateTime;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 5; $i++) {

            DB::table('superadmin')->insert([
                'id_user' => $faker->numberBetween(1, 5),
                'data' => $faker->sentence(),
                // 'username' => $faker->userName(),
                // 'password' => $faker->password(),
                // 'email' => $faker->unique()->safeEmail(),
                // 'no_telp' => $faker->numerify('08###########'),
                // 'foto' => $faker->imageUrl(640, 480, 'animals', true),
                'created_at' => new DateTime(now()),
                'updated_at' => new DateTime(now())
            ]);
        }
    }
}
