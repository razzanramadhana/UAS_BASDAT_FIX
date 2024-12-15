<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactKesehatan extends Model
{
    protected $connection = 'mysql2';
    use HasFactory;

    protected $table = 'fact_kesehatan';

    protected $fillable = [
        'id_fact',
        'id_lansia',
        'tekanan_darah',
        'gula_darah',
        'kolesterol',
        'berat_badan',
        'tinggi_badan',
        'jenis_kelamin',
        'skor_kesehatan',
    ];
}