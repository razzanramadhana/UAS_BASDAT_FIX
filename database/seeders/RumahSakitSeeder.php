<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RumahSakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rumah_sakit')->insert([
            [
                'nama_rumah_sakit' => 'Rumah Sakit Umum Jakarta',
                'alamat' => 'Jl. Gatot Subroto No. 1, Jakarta',
                'kota' => "Surabaya",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_rumah_sakit' => 'Rumah Sakit Sehat Bandung',
                'alamat' => 'Jl. Merdeka No. 10, Bandung',
                'kota' => "Surabaya",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
