<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HasilKesehatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hasil_kesehatan')->insert([
            [
                'tekanan_darah' => '120/80',
                'berat_badan' => '65',
                'tinggi_badan' => '170',
                'gula_darah' => '90',
                'kolesterol' => '190',
                'komentar_nakes' => 'Normal dan sehat',
                'id_kelola_kunjungan' => 1, // ID yang valid dari tabel kelola_kunjungan
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tekanan_darah' => '130/85',
                'berat_badan' => '70',
                'tinggi_badan' => '165',
                'gula_darah' => '100',
                'kolesterol' => '210',
                'komentar_nakes' => 'Perlu perbaikan pola makan',
                'id_kelola_kunjungan' => 2, // ID yang valid dari tabel kelola_kunjungan
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}