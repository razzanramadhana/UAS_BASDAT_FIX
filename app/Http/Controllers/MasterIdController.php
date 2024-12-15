<?php

namespace App\Http\Controllers;

use App\Models\Nakes; // Pastikan model Nakes sesuai
use App\Models\MasterSesi;
use App\Models\MasterJadwal;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class MasterIdController extends Controller
{
    public function __construct()
    {
        // Menambahkan middleware auth untuk mengakses dashboard
        $this->middleware('auth');
    }

    public function createSessionsAutomatically()
    {
        // Mengambil pengguna yang sedang login
        // $user = auth()->user(); 
        
        // Ambil nakes berdasarkan role
        $nakesList = Pengguna::where('role', 'nakes')->get();

        // Cek jika tidak ada nakes
        if ($nakesList->isEmpty()) {
            return response()->json(['message' => 'Tidak ada nakes tersedia.'], 404);
        }

        foreach ($nakesList as $nakes) {
            // Buat sesi berdasarkan nakes
            $sesi = MasterSesi::create([
                'nakes_id' => $nakes->id,
                'tanggal' => now(), // Ganti dengan tanggal yang sesuai
                // Tambahkan atribut lain yang diperlukan
            ]);

            // Buat jadwal untuk sesi tersebut
            $jadwal = MasterJadwal::create([
                'master_sesi_id' => $sesi->id,
                'waktu_mulai' => '08:00', // Contoh waktu
                'waktu_selesai' => '12:00', // Contoh waktu
                // Tambahkan atribut lain yang diperlukan
            ]);
        }

        return response()->json(['message' => 'Sesi dan Jadwal berhasil dibuat.']);
    }
}