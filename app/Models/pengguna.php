<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Pengguna extends Authenticatable
{
    use HasFactory, Notifiable;

    // Tambahkan ini jika nama tabel bukan default (penggunas)
    protected $table = 'pengguna';  

    protected $fillable = [
        'nama', 'nik', 'email', 'no_telephone', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'password', 'role',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];
    
    public function masterSesi()
    {
        return $this->hasMany(MasterSesi::class, 'id_pengguna', 'id');
    }

    public function lansias()
    {
        return $this->hasManyThrough(Lansia::class, KelolaKunjungan::class);
    }
}