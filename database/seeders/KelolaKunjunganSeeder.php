<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelolaKunjunganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelola_kunjungan')->insert([
            [
                'id_lansia' => 1, // ID lansia yang valid dari tabel 'lansia'
                'id_master_jadwal' => 1, // ID jadwal yang valid dari tabel 'master_jadwal'
                'tanggal' => '2024-01-08',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_lansia' => 2, // ID lansia yang valid dari tabel 'lansia'
                'id_master_jadwal' => 2, // ID jadwal yang valid dari tabel 'master_jadwal'
                'tanggal' => '2024-01-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
