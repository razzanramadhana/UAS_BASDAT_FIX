<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimWaktu extends Model
{
    protected $connection = 'mysql2';
    use HasFactory;

    protected $table = 'dim_waktu';

    protected $fillable = [
        'sk_waktu',
        'tanggal_kunjungan',
        'tahun',
        'bulan',
        'id_sesi',
        'id_lansia',
    ];
}