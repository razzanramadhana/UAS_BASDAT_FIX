<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimRumahSakit extends Model
{
    protected $connection = 'mysql2';
    use HasFactory;

    protected $table = 'dim_rumah_sakit';

    protected $fillable = [
        'nama_rumah_sakit',
        'alamat',
        'kota',
        'id_rumah_sakit',
        'sk_rumah_sakit',
    ];
}