<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterJadwal;
use Faker\Factory as Faker;

class MasterJadwalSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            MasterJadwal::create([
                'id_sesi' => $faker->numberBetween(1, 20),
                'hari' => $faker->dayOfWeek,
                'tanggal' => $faker->date,
            ]);
        }
    }
}