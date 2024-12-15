<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MasterSesi;

class MasterJadwal extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_sesi',
        'hari',
        'tanggal',
    ];

    protected $table = 'master_jadwal';

    /**
     * Get the master_sesi that the master_jadwal belongs to.
     */
    public function masterSesi()
    {
        return $this->belongsTo(MasterSesi::class, 'id_sesi');
    }
}