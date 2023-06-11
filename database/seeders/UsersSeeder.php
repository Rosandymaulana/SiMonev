<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Super Admin
        $faker = Faker::create('id_ID');

        DB::table('users')->insert([
            'id_user' => '1',
            'id_role' => '1',
            'id_wilayah' => '1',
            'username' => $faker->userName(),
            'email' => $faker->unique()->safeEmail(),
            'password' => Hash::make('SuperAdmin'),
            'name' => $faker->name(),
            'jabatan' => 'Petugas Bappeda',
            'no_telp' => $faker->phoneNumber(),
            'created_at' => new DateTime(now()),
            'updated_at' => new DateTime(now()),
        ]);

        // Admin 1
        DB::table('users')->insert([
            'id_user' => '2',
            'id_role' => '2',
            'id_wilayah' => '1',
            'username' => $faker->userName(),
            'email' => $faker->unique()->safeEmail(),
            'password' => Hash::make('Admin1'),
            'name' => $faker->name(),
            'jabatan' => 'Petugas Bappeda',
            'no_telp' => $faker->phoneNumber(),
            'created_at' => new DateTime(now()),
            'updated_at' => new DateTime(now()),
        ]);

        // Admin 2
        DB::table('users')->insert([
            'id_user' => '3',
            'id_role' => '2',
            'id_wilayah' => '1',
            'username' => $faker->userName(),
            'email' => $faker->unique()->safeEmail(),
            'password' => Hash::make('Admin2'),
            'name' => $faker->name(),
            'jabatan' => 'Petugas Bappeda',
            'no_telp' => $faker->phoneNumber(),
            'created_at' => new DateTime(now()),
            'updated_at' => new DateTime(now()),
        ]);

        // Admin 3
        DB::table('users')->insert([
            'id_user' => '4',
            'id_role' => '2',
            'id_wilayah' => '1',
            'username' => $faker->userName(),
            'email' => $faker->unique()->safeEmail(),
            'password' => Hash::make('Admin3'),
            'name' => $faker->name(),
            'jabatan' => 'Petugas Bappeda',
            'no_telp' => $faker->phoneNumber(),
            'created_at' => new DateTime(now()),
            'updated_at' => new DateTime(now()),
        ]);

        // Penyusul 1
        DB::table('users')->insert([
            'id_user' => '5',
            'id_role' => '3',
            'id_wilayah' => '27',
            'username' => $faker->userName(),
            'email' => $faker->unique()->safeEmail(),
            'password' => Hash::make('Penyusul2'),
            'name' => $faker->name(),
            'jabatan' => 'Kepala Desa',
            'no_telp' => $faker->phoneNumber(),
            'created_at' => new DateTime(now()),
            'updated_at' => new DateTime(now()),
        ]);

        // Penyusul 2
        DB::table('users')->insert([
            'id_user' => '6',
            'id_role' => '3',
            'id_wilayah' => '34', //Madyopuro
            'username' => $faker->userName(),
            'email' => $faker->unique()->safeEmail(),
            'password' => Hash::make('Penyusul3'), //Admin1234
            'name' => $faker->name(),
            'jabatan' => 'Sekertaris Desa',
            'no_telp' => $faker->phoneNumber(),
            'created_at' => new DateTime(now()),
            'updated_at' => new DateTime(now()),
        ]);
    }
}
