<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RujukanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rujukan')->insert([
            [
                'id_rumah_sakit' => 1, // ID yang valid dari tabel rumah_sakit
                'id_kelola_kunjungan' => 1, // ID yang valid dari tabel kelola_kunjungan
                'created_at' => now(),
                'updated_at' => now(),
                'status_rujukan' => 'Diproses',
            ],
            [
                'id_rumah_sakit' => 2, // ID yang valid dari tabel rumah_sakit
                'id_kelola_kunjungan' => 2, // ID yang valid dari tabel kelola_kunjungan
                'created_at' => now(),
                'updated_at' => now(),
                'status_rujukan' => 'Diterima',
            ],
        ]);
    }
}
