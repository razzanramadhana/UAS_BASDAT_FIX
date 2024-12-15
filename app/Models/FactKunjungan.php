<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactKunjungan extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';

    protected $table = 'fact_kunjungan';

    protected $fillable = [
        'id_fact',
        'sk_waktu',
        'sk_lansia',
        'tanggal_kunjungan',
        'tahun',
        'bulan',
        'id_sesi',
    ];
}