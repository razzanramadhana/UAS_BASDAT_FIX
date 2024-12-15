<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterJadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_jadwal')->insert([
            [
                'id_sesi' => 1, // ID sesi yang valid dari tabel 'master_sesi'
                'hari' => 'Senin',
                'tanggal' => '2024-01-08',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_sesi' => 2, // ID sesi yang valid dari tabel 'master_sesi'
                'hari' => 'Rabu',
                'tanggal' => '2024-01-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
