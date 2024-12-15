<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HasilKesehatan;
use Faker\Factory as Faker;

class HasilKesehatanSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            HasilKesehatan::create([
                'tekanan_darah' => $faker->randomNumber(3) . '/' . $faker->randomNumber(3),
                'berat_badan' => $faker->randomFloat(2, 40, 120),
                'tinggi_badan' => $faker->randomFloat(2, 140, 200),
                'gula_darah' => $faker->randomFloat(2, 50, 200),
                'kolesterol' => $faker->randomFloat(2, 100, 300),
                'komentar_nakes' => $faker->sentence,
                'id_kelola_kunjungan' => $faker->numberBetween(1, 20),
            ]);
        }
    }
}