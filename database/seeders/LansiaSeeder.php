<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lansia;
use Faker\Factory as Faker;

class LansiaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            Lansia::create([
                'nama' => $faker->name,
                'nik' => $faker->unique()->numerify('################'),
                'tanggal_lahir' => $faker->date,
                'jenis_kelamin' => $faker->randomElement(['L', 'P']), // Hanya 'Laki-laki' atau 'Perempuan'
                'alamat' => $faker->address,
                'no_telp' => $faker->phoneNumber,
                'tanggal_daftar' => $faker->date,
                'riwayat_penyakit' => $faker->sentence,
                'alergi_obat' => $faker->sentence,
                'id_pengguna' => $faker->numberBetween(1, 20),
            ]);
        }
    }
}