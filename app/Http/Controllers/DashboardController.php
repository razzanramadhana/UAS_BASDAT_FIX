<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DimLansia; // Model untuk lansia
use App\Models\FactKesehatan; // Model untuk kesehatan
use App\Models\DimRumahSakit; // Model untuk rumah sakit
use Illuminate\Support\Facades\DB; // Pastikan ini diimpor

class DashboardController extends Controller
{
    public function __construct()
    {
        // Menambahkan middleware auth untuk mengakses dashboard
        $this->middleware('auth');
    }

    public function index()
    {
        // Mengambil data user yang sedang login
        $user = auth()->user();

        // Mengambil data dari database kedua
        $lansiaData = DimLansia::all();
        $kesehatanData = FactKesehatan::all();
        $rumahSakitData = DimRumahSakit::all();

        // Mengirim data user dan data dari database kedua ke view 'dashboard'
        return view('dashboard', compact('user', 'lansiaData', 'kesehatanData', 'rumahSakitData'));
    }

    public function getVisualizationData()
    {
        // Mengambil data menggunakan model FactKesehatan
        $kesehatanData = FactKesehatan::select('skor_kesehatan', DB::raw('count(*) as total'))
            ->groupBy('skor_kesehatan')
            ->get();
        
        return response()->json($kesehatanData);
    }
}