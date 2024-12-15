<?php
// File: app/Models/Lansia.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lansia extends Model
{
    use HasFactory;
    protected $table = 'lansia'; // Pastikan nama tabel sesuai
    protected $fillable = [
        'nama', 'nik', 'tanggal_lahir', 'jenis_kelamin', 'alamat',
        'no_telp', 'tanggal_daftar', 'riwayat_penyakit', 'alergi_obat', 'id_pengguna'
    ];

    // Relasi dengan model Pengguna
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }

    
    public function kunjungan()
    {
        return $this->hasMany(KelolaKunjungan::class, 'id_lansia','id');
    }
}
