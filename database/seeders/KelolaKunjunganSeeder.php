<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KelolaKunjungan;
use Faker\Factory as Faker;

class KelolaKunjunganSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            KelolaKunjungan::create([
                'id_lansia' => $faker->numberBetween(1, 20),
                'id_master_jadwal' => $faker->numberBetween(1, 20),
                'tanggal' => $faker->date,
            ]);
        }
    }
}