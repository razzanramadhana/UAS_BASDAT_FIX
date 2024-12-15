<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RumahSakit;
use Faker\Factory as Faker;

class RumahSakitSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            RumahSakit::create([
                'nama_rumah_sakit' => $faker->company . ' Hospital',
                'kota' => $faker->city,
                'alamat' => $faker->address,
            ]);
        }
    }
}