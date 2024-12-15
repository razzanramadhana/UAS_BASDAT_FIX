<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterSesi;
use App\Models\MasterJadwal;
use App\Models\KelolaKunjungan;
use App\Models\Lansia;
use Illuminate\Support\Facades\Auth;

class KelolaKunjunganController extends Controller
{
    /**
     * Menampilkan daftar kunjungan
     */
    public function index()
    {
        // Ambil data kunjungan yang terkait dengan pengguna yang sedang login
        $kunjungan = KelolaKunjungan::with(['lansia', 'masterJadwal', 'masterJadwal.masterSesi'])
            ->whereHas('lansia', function ($query) {
                $query->where('id_pengguna', Auth::id());
            })->get();

        // Tampilkan halaman index dengan data kunjungan
        return view('kelola_kunjungan.index', compact('kunjungan'));
    }

    /**
     * Tampilkan form untuk menambahkan kunjungan baru
     */
    public function create()
    {
        // Ambil data lansia dari database
        $lansia = Lansia::all(); // Pastikan Anda memiliki model Lansia
        return view('kelola_kunjungan.create', compact('lansia'));
    }

    /**
     * Simpan data kunjungan baru
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_lansia' => 'required|exists:lansia,id',
            'tanggal_kunjungan' => 'required|date',
            'sesi' => 'required|in:1,2',
        ]);

        // Hitung jumlah sesi pada tanggal tertentu
        $sesiCount = MasterJadwal::where('tanggal', $request->tanggal_kunjungan)
            ->count();

        // Batasi maksimal 3 sesi per hari
        if ($sesiCount >= 3) {
            return redirect()->back()->withErrors('Sesi untuk tanggal tersebut sudah penuh.');
        }

        // Tentukan id_pengguna berdasarkan sesi
        $idPengguna = $request->sesi == 1 ? 5 : 6;

        // 1. Tambahkan data ke tabel master_sesi
        $masterSesi = MasterSesi::create([
            'sesi' => 'Sesi ' . $request->sesi,
            'id_pengguna' => $idPengguna,
        ]);

        // 2. Tambahkan data ke tabel master_jadwal
        $masterJadwal = MasterJadwal::create([
            'id_sesi' => $masterSesi->id, // ID dari master_sesi
            'hari' => date('l', strtotime($request->tanggal_kunjungan)), // Nama hari dari tanggal yang dipilih
            'tanggal' => $request->tanggal_kunjungan, // Tanggal input dari form
        ]);

        // 3. Tambahkan data ke tabel kelola_kunjungan
        KelolaKunjungan::create([
            'id_lansia' => $request->id_lansia, // ID lansia dari form
            'id_master_jadwal' => $masterJadwal->id, // ID jadwal dari master_jadwal
            'tanggal' => $request->tanggal_kunjungan, // Tanggal kunjungan dari form
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('kelola-kunjungan.index')->with('success', 'Data kunjungan berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit untuk mengedit data kunjungan
     */
    public function edit($id)
    {
        // Cari data kunjungan berdasarkan ID
        $kunjungan = KelolaKunjungan::findOrFail($id);

        // Ambil data lansia terkait pengguna yang sedang login
        $lansia = Lansia::where('id_pengguna', Auth::id())->get();  

        // Tampilkan halaman edit
        return view('kelola_kunjungan.edit', compact('kunjungan', 'lansia'));
    }

    /**
     * Perbarui data kunjungan yang sudah ada
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'id_lansia' => 'required|exists:lansia,id',
            'tanggal_kunjungan' => 'required|date',
        ]);

        // Cari data kunjungan berdasarkan ID
        $kunjungan = KelolaKunjungan::findOrFail($id);

        // Update data kunjungan
        $kunjungan->update([
            'id_lansia' => $request->id_lansia,
            'tanggal_kunjungan' => $request->tanggal_kunjungan,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('kelola-kunjungan.index')->with('success', 'Kunjungan berhasil diperbarui.');
    }

    /**
     * Hapus data kunjungan
     */
    public function destroy($id)
    {
        // Cari data kunjungan berdasarkan ID
        $kunjungan = KelolaKunjungan::findOrFail($id);

        // Hapus data kunjungan
        $kunjungan->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('kelola-kunjungan.index')->with('success', 'Kunjungan berhasil dihapus.');
    }
}
