<?php

namespace App\Http\Controllers;

use App\Models\Lansia;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;  

class ProfilLansiaController extends Controller
{
    // Menampilkan semua data lansia
    public function index()
    {
        $dataLansia = Lansia::all(); // Ambil semua data lansia
        return view('data-pasien', compact('dataLansia')); // Kirim dataLansia ke view
    }

    public function show()
    {
        // Mengambil data lansia berdasarkan id_pengguna yang sedang login
        $lansia = Lansia::where('id_pengguna', Auth::id())->get();  // Menggunakan get() bukan first()
        // $lansia = Lansia::with('kunjungan.masterJadwal.masterSesi.pengguna')->get();  // Menggunakan get() bukan first()
    
        if ($lansia->isEmpty()) {
            return redirect()->route('dashboard')->with('error', 'Data lansia tidak ditemukan.');
        }
    
        return view('profil lansia', compact('lansia'));  // Kirim data lansia ke view
    }
    


    public function showdarirujukan($id)
    {
        $lansia = Lansia::findOrFail($id);
        return view('lansia.show', compact('lansia'));
    }
}