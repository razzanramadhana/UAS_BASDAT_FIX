<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactRujukan extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';

    protected $table = 'fact_rujukan';

    protected $fillable = [
        'id_fact',
        'sk_waktu',
        'id_lansia',
        'nama_rumah_sakit',
        'alamat',
        'kota',
    ];
}