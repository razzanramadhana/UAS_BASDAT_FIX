<?php

namespace App\Http\Controllers;

use App\Models\KelolaKunjungan;
use App\Models\Rujukan;
use App\Models\RumahSakit;
use Illuminate\Http\Request;

class RujukanController extends Controller
{
    public function index()
    {
        // Fetch Rujukan along with KelolaKunjungan, Lansia, and RumahSakit
        $rujukanList = Rujukan::with(['kelolaKunjungan.lansia', 'rumahSakit'])->get();
    
        // Fetch KelolaKunjungan with related Lansia
        $kelolaKunjungan = KelolaKunjungan::with('lansia')->get();
    
        // Extract unique Lansia
        $lansiaList = $kelolaKunjungan->pluck('lansia')->flatten()->unique('id_lansia');
    
        return view('rujukan.index', compact('kelolaKunjungan', 'lansiaList', 'rujukanList'));
    }

    public function edit($id)
    {
        // Cari rujukan berdasarkan ID
        $rujukan = Rujukan::with(['kelolaKunjungan.lansia', 'rumahSakit'])->findOrFail($id);

        // Data pendukung, misalnya daftar rumah sakit
        $rumahSakitList = RumahSakit::all();

        // Kirim data ke view
        return view('rujukan.edit', compact('rujukan', 'rumahSakitList'));
    }

    public function update(Request $request, $id)
    {
        // Cari rujukan berdasarkan ID
        $rujukan = Rujukan::findOrFail($id);
    
        // Validasi input
        $request->validate([
            'id_rumah_sakit' => 'required|exists:rumah_sakit,id',
            'status_rujukan' => 'required|in:Diproses,Diterima',
        ]);
    
        // Update data menggunakan mass assignment
        $rujukan->update([
            'id_rumah_sakit' => $request->id_rumah_sakit,
            'status_rujukan' => $request->status_rujukan,
        ]);
    
        // Redirect dengan pesan sukses
        return redirect()->route('rujukan.index')->with('success', 'Data rujukan berhasil diperbarui!');
    }

    public function create()
    {
        // Ambil data pendukung, seperti daftar rumah sakit dan kelola kunjungan
        $rumahSakitList = RumahSakit::all();
        $kelolaKunjunganList = KelolaKunjungan::with('lansia')->get();
    
        // Kirim data ke view
        return view('rujukan.create', compact('rumahSakitList', 'kelolaKunjunganList'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_kelola_kunjungan' => 'required|exists:kelola_kunjungan,id', // Pastikan ID kelola kunjungan valid
            'id_rumah_sakit' => 'required|exists:rumah_sakit,id',           // Pastikan ID rumah sakit valid
            'status_rujukan' => 'required|in:Diproses,Diterima',            // Validasi enum status
        ]);
    
        // Simpan data ke database
        Rujukan::create([
            'id_kelola_kunjungan' => $request->id_kelola_kunjungan,
            'id_rumah_sakit' => $request->id_rumah_sakit,
            'status_rujukan' => $request->status_rujukan,
        ]);
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('rujukan.index')->with('success', 'Rujukan baru berhasil dibuat!');
    }

    public function destroy($id)
    {
        // Cari rujukan berdasarkan ID
        $rujukan = Rujukan::findOrFail($id);
    
        // Hapus rujukan dari database
        $rujukan->delete();
    
        // Redirect dengan pesan sukses
        return redirect()->route('rujukan.index')->with('success', 'Data rujukan berhasil dihapus!');
    }
}
