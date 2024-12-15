<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lansia;
use App\Models\MasterJadwal;

class KelolaKunjungan extends Model
{
    protected $table = 'kelola_kunjungan';

    
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_lansia',
        'nama',
        'id_master_jadwal',
        'tanggal',
    ];

    /**
     * Get the lansia that the kelola_kunjungan belongs to.
     */
    public function lansia()
    {
        return $this->belongsTo(Lansia::class, 'id_lansia', 'id');
    }

    /**
     * Get the master_jadwal that the kelola_kunjungan belongs to.
     */
    public function masterJadwal()
    {
        return $this->belongsTo(MasterJadwal::class, 'id_master_jadwal');
    }

    public function rujukan()
    {
        return $this->hasOne(Rujukan::class, 'id_kelola_kunjungan');
    }
}