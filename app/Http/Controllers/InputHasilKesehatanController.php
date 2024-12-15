<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Untuk otentikasi
use App\Models\HasilKesehatan; // Model untuk hasil kesehatan
use App\Models\Lansia; // Model untuk Lansia
use App\Models\KelolaKunjungan; // Model untuk Kunjungan
use App\Models\MasterJadwal; // Model untuk Master Jadwal

class InputHasilKesehatanController extends Controller
{
    // Tampilkan form untuk input hasil kesehatan
    public function create(Request $request)
    {
        // Ambil ID pengguna (nakes) yang sedang login
        $nakesId = Auth::id();

        // Ambil master_jadwal berdasarkan id_pengguna (nakes)
        $jadwals = MasterJadwal::whereHas('masterSesi', function ($query) use ($nakesId) {
            $query->where('id_pengguna', $nakesId);
        })->get();

        $idLansia = $request->input('id_lansia');
        if ($idLansia) {
            $kunjungans = KelolaKunjungan::where('id_lansia', $idLansia)
                ->select('id', 'tanggal') // Ambil kolom yang diperlukan
                ->get();
        }

        // Ambil data lansia yang unik
        $kelolaKunjungan = KelolaKunjungan::with('lansia')->get();
        $lansia = $kelolaKunjungan->pluck('lansia')->unique();

        return view('input_hasil_kesehatan', compact('lansia', 'kelolaKunjungan'));
    }
    
    // Simpan hasil kesehatan ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_lansia' => 'required|exists:lansia,id',
            'id_kunjungan' => 'required|exists:kelola_kunjungan,id', // Perbaiki nama kolom
            'berat_badan' => 'required|numeric',
            'tinggi_badan' => 'required|numeric',
            'tekanan_darah' => 'required|numeric',
            'gula_darah' => 'required|numeric',
            'kolesterol' => 'required|numeric',
            'komentar_nakes' => 'nullable|string|max:255', // Gabungkan validasi menjadi satu
        ]);
        
        // Simpan data hasil kesehatan
        HasilKesehatan::create([
            'id_lansia' => $request->id_lansia,
            'id_kelola_kunjungan' => $request->id_kunjungan, // Sesuaikan dengan kolom validasi
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
            'tekanan_darah' => $request->tekanan_darah,
            'gula_darah' => $request->gula_darah,
            'kolesterol' => $request->kolesterol,
            'komentar_nakes' => $request->komentar_nakes, // Ambil nilai dari request
        ]);
        

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }
}
