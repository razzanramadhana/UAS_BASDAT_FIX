<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimLansia extends Model
{
    protected $connection = 'mysql2';
    use HasFactory;

    protected $table = 'dim_lansia';

    protected $fillable = [
        'sk_lansia',
        'id_lansia',
        'nama_lansia',
        'nik',
        'umur',
        'jenis_kelamin',
    ];
}