<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KelolaKunjungan;

class HasilKesehatan extends Model
{
    protected $table = 'hasil_kesehatan';
   
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tekanan_darah',
        'berat_badan',
        'tinggi_badan',
        'gula_darah',
        'kolesterol',
        'komentar_nakes',
        'id_kelola_kunjungan',
    ];

    /**
     * Get the kelola_kunjungan that the hasil_kesehatan belongs to.
     */
    public function kelolaKunjungan()
    {
        return $this->belongsTo(KelolaKunjungan::class, 'id_kelola_kunjungan');
    }
}