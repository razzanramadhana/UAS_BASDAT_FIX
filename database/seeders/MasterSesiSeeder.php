<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterSesi;
use Faker\Factory as Faker;

class MasterSesiSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            MasterSesi::create([
                'sesi' => $faker->time,
                'id_pengguna' => $faker->numberBetween(1, 20),
            ]);
        }
    }
}