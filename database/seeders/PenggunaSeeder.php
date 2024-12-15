<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengguna;
use Faker\Factory as Faker;

class PenggunaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            Pengguna::create([
                'nama' => $faker->name,
                'nik' => $faker->unique()->numerify('################'),
                'email' => $faker->unique()->safeEmail,
                'no_telephone' => $faker->phoneNumber,
                'tanggal_lahir' => $faker->date,
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'alamat' => $faker->address,
                'password' => bcrypt('password'),
                'role' => $faker->randomElement(['wali', 'nakes']), // Hanya 'wali' dan 'nakes'
            ]);
        }
    }
}