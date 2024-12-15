<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rujukan;
use Faker\Factory as Faker;

class RujukanSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            Rujukan::create([
                'id_kelola_kunjungan' => $faker->numberBetween(1, 20),
                'id_rumah_sakit' => $faker->numberBetween(1, 20),
                'status_rujukan' => $faker->randomElement(['Diproses', 'Diterima']),
            ]);
        }
    }
}