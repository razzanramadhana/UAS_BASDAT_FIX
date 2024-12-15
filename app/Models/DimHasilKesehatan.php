<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimHasilKesehatan extends Model
{
    protected $connection = 'mysql2';
    use HasFactory;

    protected $table = 'dim_hasil_kesehatan';

    protected $fillable = [
        'id',
        'berat_badan',
        'gula_darah',
        'kolesterol',
        'tinggi_badan',
        'tekanan_darah',
        'sk_kesehatan',
    ];
}