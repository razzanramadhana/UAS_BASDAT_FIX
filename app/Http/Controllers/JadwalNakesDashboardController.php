<?php

namespace App\Http\Controllers;

use App\Models\MasterJadwal;
use Illuminate\Support\Facades\Auth;

class JadwalNakesDashboardController extends Controller
{
    public function index()
    {
        // Mengambil user yang sedang login
        $user = auth()->user();

        // Cek apakah user memiliki role 'nakes'
        if ($user && $user->role == 'nakes') {
            // Ambil jadwal yang terkait dengan user melalui model MasterJadwal
            $jadwals = MasterJadwal::whereHas('masterSesi', function ($query) use ($user) {
                $query->where('id_pengguna', $user->id);
            })->get();

            // Jika tidak ada jadwal
            $message = $jadwals->isEmpty() ? 'Belum ada kunjungan.' : null;

            // Debugging untuk memeriksa data yang diambil
            logger()->info('Data jadwal:', $jadwals->toArray());

            // Kirim data jadwal ke view
            return view('jadwal_nakes', compact('jadwals', 'message', 'user'));
        }

        // Jika user bukan nakes, redirect ke halaman lain
        // return redirect()->route('home')->with('error', 'Akses ditolak. Anda tidak memiliki izin.');
    }
}
