<?php

namespace App\Http\Controllers;

use App\Models\HasilKesehatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasilKesehatanController extends Controller
{
    // Menampilkan halaman hasil kesehatan hanya untuk lansia yang dimiliki oleh pengguna yang sedang login
    public function index()
    {
        // Mendapatkan pengguna yang sedang login
        $user = Auth::user();

        // Mengambil data HasilKesehatan berdasarkan id_lansia yang dimiliki oleh pengguna yang sedang login
        $hasilKesehatan = HasilKesehatan::whereHas('kelolaKunjungan', function ($query) use ($user) {
            // Ambil id_lansia yang terkait dengan pengguna yang sedang login
            $query->whereHas('lansia', function ($query) use ($user) {
                $query->where('id_pengguna', $user->id);
            });
        })->get();
        
        // Kirim data hasilKesehatan ke view
        return view('hasil kesehatan', compact('hasilKesehatan'));
    }
}