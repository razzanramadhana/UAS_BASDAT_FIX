<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FactKesehatan;
use App\Models\FactKunjungan;
use App\Models\DimLansia; // Pastikan untuk mengimpor model DimLansia

class NakesDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $user = auth()->user();

        // Mengambil data dari model DimLansia
        $lansiaData = DimLansia::all();
        
        // Menghitung distribusi umur
        $umurDistribution = $lansiaData->groupBy(function($item) {
            return intval($item->umur / 10) * 10; // Kelompokkan berdasarkan dekade
        });

        // Mendapatkan semua dekade yang mungkin
        $allDecades = range(0, 100, 10); // Misalkan umur maksimum 100

        $umurLabels = [];
        $umurCounts = [];

        // Mengisi umurLabels dan umurCounts dengan data yang ada
        foreach ($allDecades as $decade) {
            $umurLabels[] = $decade . ' - ' . ($decade + 9);
            $umurCounts[] = $umurDistribution->get($decade, collect())->count(); // Hitung atau 0 jika tidak ada
        }
        
        // Mengambil data dari model FactKesehatan
        $dataKesehatan = FactKesehatan::select('tekanan_darah', 'gula_darah', 'kolesterol')
                                        ->where('id_lansia', $user->id)
                                        ->get();
        
        $tekananDarah = $dataKesehatan->pluck('tekanan_darah');

        // Menghitung jumlah status kesehatan
        $jumlahBaik = FactKesehatan::where('skor_kesehatan', 'Baik')->count() ?: 0;
        $jumlahWaspada = FactKesehatan::where('skor_kesehatan', 'Waspada')->count() ?: 0;
        $jumlahBuruk = FactKesehatan::where('skor_kesehatan', 'Bahaya')->count() ?: 0;

        // Mengambil data kunjungan per bulan hanya dari kolom bulan
        $kunjunganData = FactKunjungan::selectRaw('bulan, COUNT(*) as jumlah')
                                        ->groupBy('bulan')
                                        ->orderBy('bulan')
                                        ->get();

        $jumlahKunjunganPerBulan = [];
        $bulanKunjungan = [];

        // Mengisi array jumlahKunjunganPerBulan dan bulanKunjungan
        foreach ($kunjunganData as $data) {
            $jumlahKunjunganPerBulan[(int)$data->bulan] = $data->jumlah;
            $bulanKunjungan[(int)$data->bulan] = date('F', mktime(0, 0, 0, (int)$data->bulan, 1));
        }

        // Mengisi bulan yang tidak ada data dengan 0
        for ($i = 1; $i <= 12; $i++) {
            if (!isset($jumlahKunjunganPerBulan[$i])) {
                $jumlahKunjunganPerBulan[$i] = 0;
                $bulanKunjungan[$i] = date('F', mktime(0, 0, 0, $i, 1));
            }
        }

        $totalKunjungan = array_sum($jumlahKunjunganPerBulan);

        // Mengirim data ke view
        return view('dashboard nakes', compact('user', 'tekananDarah', 'jumlahBaik', 'jumlahWaspada', 'jumlahBuruk', 'jumlahKunjunganPerBulan', 'totalKunjungan', 'bulanKunjungan', 'umurLabels', 'umurCounts'));
    }
}