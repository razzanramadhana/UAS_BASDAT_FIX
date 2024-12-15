<?php

namespace App\Http\Controllers;

use App\Models\Lansia;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class LansiaController extends Controller
{
    /**
     * Menampilkan daftar lansia.
     */
    public function index()
    {
        // Menampilkan semua lansia beserta informasi pengguna yang terkait
        $lansias = Lansia::with('pengguna')->get();
        return view('lansia.index', compact('lansias'));
    }

    /**
     * Menampilkan form untuk menambahkan lansia.
     */
    public function showForm()
    {
        // Mendapatkan daftar pengguna dengan role wali
        $wali = Pengguna::where('role', 'wali')->get();
        return view('tambahkan_lansia', compact('wali'));
    }

    /**
     * Menyimpan data lansia baru.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nik_lansia' => 'required|string|unique:lansia,nik', // Validasi unik untuk nik
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'no_telp' => 'required|string', // Pastikan penamaan sesuai dengan form
            'riwayat_penyakit' => 'nullable|string',
            'alergi_obat' => 'nullable|string',
            'id_pengguna' => 'required|exists:pengguna,id', // Validasi foreign key
        ]);

        // Menyimpan data lansia
        Lansia::create([
            'nama' => $validated['nama'],
            'nik' => $validated['nik_lansia'], // Pastikan sesuai dengan field di tabel
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'alamat' => $validated['alamat'],
            'no_telp' => $validated['no_telp'], // Pastikan penamaan sesuai dengan form
            'riwayat_penyakit' => $validated['riwayat_penyakit'] ?? null,
            'alergi_obat' => $validated['alergi_obat'] ?? null,
            'id_pengguna' => $validated['id_pengguna'],
            'tanggal_daftar' => now(), // Sesuaikan jika perlu
        ]);

        // Mengirim response JSON untuk AJAX
        return response()->json([
            'status' => 'success',
            'message' => 'Data lansia berhasil ditambahkan.'
        ]);
    }

    /**
     * Menampilkan form untuk mengedit data lansia.
     */
    public function edit($id)
    {
        // Menampilkan data lansia berdasarkan ID
        $lansia = Lansia::findOrFail($id);
        
        // Mendapatkan daftar pengguna dengan role wali
        $wali = Pengguna::where('role', 'wali')->get();

        return view('lansia.edit', compact('lansia', 'wali'));
    }

    /**
     * Memperbarui data lansia.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nik_lansia' => 'required|string|unique:lansia,nik,' . $id, // Mengizinkan nik yang sama pada update
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'no_telpon' => 'required|string',
            'riwayat_penyakit' => 'nullable|string',
            'alergi_obat' => 'nullable|string',
            'id_pengguna' => 'required|exists:pengguna,id', // Validasi foreign key
        ]);

        // Memperbarui data lansia
        $lansia = Lansia::findOrFail($id);
        $lansia->update([
            'nama' => $validated['nama'],
            'nik' => $validated['nik_lansia'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'alamat' => $validated['alamat'],
            'no_telpon' => $validated['no_telpon'],
            'riwayat_penyakit' => $validated['riwayat_penyakit'] ?? null,
            'alergi_obat' => $validated['alergi_obat'] ?? null,
            'id_pengguna' => $validated['id_pengguna'],
            'tanggal_daftar' => now(), // Sesuaikan jika perlu
        ]);

        // Mengirim response JSON untuk AJAX
        return response()->json([
            'status' => 'success',
            'message' => 'Data lansia berhasil diperbarui.'
        ]);
    }

    /**
     * Menghapus data lansia.
     */
    public function destroy($id)
    {
        // Menghapus data lansia
        $lansia = Lansia::findOrFail($id);
        $lansia->delete();

        // Mengirim response JSON untuk AJAX
        return response()->json([
            'status' => 'success',
            'message' => 'Data lansia berhasil dihapus.'
        ]);
    }
    public function show($id)
    {
        $lansia = Lansia::findOrFail($id);
        return view('detail_pasien', compact('lansia'));
    }
}
