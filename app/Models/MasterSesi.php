<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pengguna;

class MasterSesi extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sesi',
        'id_pengguna',
    ];

    protected $table = "master_sesi";

    /**
     * Get the pengguna that owns the master_sesi.
     */
    public function masterJadwal()
    {
        return $this->hasMany(MasterJadwal::class, 'id_sesi', 'id');
    }
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }
}