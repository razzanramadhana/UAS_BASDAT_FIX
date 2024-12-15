<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengguna')->insert([
            [
                'nama' => 'Budi Santoso',
                'nik' => '1234567890123451',
                'email' => 'budi.santoso@example.com',
                'no_telephone' => '081234567890',
                'tanggal_lahir' => '1980-01-01',
                'jenis_kelamin' => 'Laki-laki',
                'alamat' => 'Jl. Kebon Jeruk No. 12, Jakarta',
                'password' => Hash::make('password123'),
                'role' => 'wali',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Siti Aminah',
                'nik' => '1234567890123452',
                'email' => 'siti.aminah@example.com',
                'no_telephone' => '081298765432',
                'tanggal_lahir' => '1985-05-15',
                'jenis_kelamin' => 'Perempuan',
                'alamat' => 'Jl. Sudirman No. 5, Bandung',
                'password' => Hash::make('password123'),
                'role' => 'wali',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Agus Hartono',
                'nik' => '1234567890123453',
                'email' => 'agus.hartono@example.com',
                'no_telephone' => '081357890123',
                'tanggal_lahir' => '1990-10-20',
                'jenis_kelamin' => 'Laki-laki',
                'alamat' => 'Jl. Pemuda No. 10, Surabaya',
                'password' => Hash::make('password123'),
                'role' => 'wali',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Dewi Lestari',
                'nik' => '1234567890123454',
                'email' => 'dewi.lestari@example.com',
                'no_telephone' => '081345678901',
                'tanggal_lahir' => '1995-12-01',
                'jenis_kelamin' => 'Perempuan',
                'alamat' => 'Jl. Srikandi No. 1, Medan',
                'password' => Hash::make('password123'),
                'role' => 'wali',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Rudi Setiawan',
                'nik' => '1234567890123455',
                'email' => 'rudi.setiawan@example.com',
                'no_telephone' => '081333444555',
                'tanggal_lahir' => '1982-06-12',
                'jenis_kelamin' => 'Laki-laki',
                'alamat' => 'Jl. Merdeka No. 14, Yogyakarta',
                'password' => Hash::make('password123'),
                'role' => 'nakes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Sri Wahyuni',
                'nik' => '1234567890123456',
                'email' => 'sri.wahyuni@example.com',
                'no_telephone' => '081234567891',
                'tanggal_lahir' => '1988-07-14',
                'jenis_kelamin' => 'Perempuan',
                'alamat' => 'Jl. Diponegoro No. 8, Semarang',
                'password' => Hash::make('password123'),
                'role' => 'nakes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Ahmad Fauzi',
                'nik' => '1234567890123457',
                'email' => 'ahmad.fauzi@example.com',
                'no_telephone' => '081244556677',
                'tanggal_lahir' => '1983-11-21',
                'jenis_kelamin' => 'Laki-laki',
                'alamat' => 'Jl. Gatot Subroto No. 5, Palembang',
                'password' => Hash::make('password123'),
                'role' => 'nakes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Aisyah Rahma',
                'nik' => '1234567890123458',
                'email' => 'aisyah.rahma@example.com',
                'no_telephone' => '081255667788',
                'tanggal_lahir' => '1992-04-17',
                'jenis_kelamin' => 'Perempuan',
                'alamat' => 'Jl. Slamet Riyadi No. 9, Solo',
                'password' => Hash::make('password123'),
                'role' => 'nakes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
