<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterSesiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_sesi')->insert([
            [
                'sesi' => '08:00 - 10:00', // Nama sesi
                'id_pengguna' => 8, // ID pengguna yang valid dari tabel 'pengguna'
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sesi' => '10:00 - 12:00', // Nama sesi
                'id_pengguna' => 7, // ID pengguna yang valid dari tabel 'pengguna'
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
