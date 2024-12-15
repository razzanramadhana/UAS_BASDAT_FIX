<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rujukan extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'rujukan';

    // Fields that are allowed for mass assignment
    protected $fillable = [
        'id_kelola_kunjungan',
        'id_rumah_sakit',
        'status_rujukan',
    ];

    // Define the relationship with KelolaKunjungan
    public function kelolaKunjungan()
    {
        return $this->belongsTo(KelolaKunjungan::class, 'id_kelola_kunjungan');
    }

    // Define the relationship with RumahSakit
    public function rumahSakit()
    {
        return $this->belongsTo(RumahSakit::class, 'id_rumah_sakit');
    }
}