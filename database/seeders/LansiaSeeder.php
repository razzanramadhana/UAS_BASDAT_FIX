<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LansiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lansia')->insert([
            [
                'nama' => 'Budi Santoso',
                'nik' => '1111111111111111',
                'tanggal_lahir' => '1950-02-15',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Kebon Jeruk No. 12, Jakarta',
                'no_telp' => '081234567890',
                'tanggal_daftar' => now()->format('Y-m-d'),
                'riwayat_penyakit' => 'sakit ginjal',
                "alergi_obat" => "asma",
                'id_pengguna' => 1, // ID pengguna yang valid
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Siti Aminah',
                'nik' => '2222222222222222',
                'tanggal_lahir' => '1955-05-20',
                'jenis_kelamin' => 'P',
                'alamat' => 'Jl. Sudirman No. 5, Bandung',
                'no_telp' => '081298765432',
                'tanggal_daftar' => now()->format('Y-m-d'),
                'riwayat_penyakit' => 'sakit ginjal',
                "alergi_obat" => "asma",
                'id_pengguna' => 2, // ID pengguna yang valid
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Agus Hartono',
                'nik' => '3333333333333333',
                'tanggal_lahir' => '1948-11-10',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Pemuda No. 10, Surabaya',
                'no_telp' => '081357890123',
                'tanggal_daftar' => now()->format('Y-m-d'),
                'riwayat_penyakit' => 'sakit ginjal',
                "alergi_obat" => "asma",
                'id_pengguna' => 3, // ID pengguna yang valid
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Dewi Lestari',
                'nik' => '4444444444444444',
                'tanggal_lahir' => '1952-09-17',
                'jenis_kelamin' => 'P',
                'alamat' => 'Jl. Srikandi No. 1, Medan',
                'no_telp' => '081345678901',
                'tanggal_daftar' => now()->format('Y-m-d'),
                'id_pengguna' => 4, // ID pengguna yang valid
                'riwayat_penyakit' => 'sakit ginjal',
                "alergi_obat" => "asma",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Rudi Setiawan',
                'nik' => '5555555555555555',
                'tanggal_lahir' => '1958-01-25',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Merdeka No. 14, Yogyakarta',
                'no_telp' => '081333444555',
                'tanggal_daftar' => now()->format('Y-m-d'),
                'id_pengguna' => 1, // ID pengguna yang valid
                'riwayat_penyakit' => 'sakit ginjal',
                "alergi_obat" => "asma",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Sri Wahyuni',
                'nik' => '6666666666666666',
                'tanggal_lahir' => '1954-06-14',
                'jenis_kelamin' => 'P',
                'alamat' => 'Jl. Diponegoro No. 8, Semarang',
                'no_telp' => '081234567891',
                'tanggal_daftar' => now()->format('Y-m-d'),
                'id_pengguna' => 2, // ID pengguna yang valid
                'riwayat_penyakit' => 'sakit ginjal',
                "alergi_obat" => "asma",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Ahmad Fauzi',
                'nik' => '7777777777777777',
                'tanggal_lahir' => '1956-07-30',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Gatot Subroto No. 5, Palembang',
                'no_telp' => '081244556677',
                'tanggal_daftar' => now()->format('Y-m-d'),
                'id_pengguna' => 2, // ID pengguna yang valid
                'riwayat_penyakit' => 'sakit ginjal',
                "alergi_obat" => "asma",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Aisyah Rahma',
                'nik' => '8888888888888888',
                'tanggal_lahir' => '1959-03-19',
                'jenis_kelamin' => 'P',
                'alamat' => 'Jl. Slamet Riyadi No. 9, Solo',
                'no_telp' => '081255667788',
                'tanggal_daftar' => now()->format('Y-m-d'),
                'id_pengguna' => 2, // ID pengguna yang valid
                'riwayat_penyakit' => 'sakit ginjal',
                "alergi_obat" => "asma",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
