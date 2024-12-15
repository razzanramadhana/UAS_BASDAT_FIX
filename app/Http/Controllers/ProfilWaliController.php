<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Pengguna;

class ProfilWaliController extends Controller
{
    /**
     * Menampilkan halaman profil wali.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        // Pastikan pengguna sudah login
        if (!Auth::check()) {
            // Jika pengguna belum login, arahkan ke halaman login
            return redirect()->route('login.form'); // Ganti 'login.form' dengan nama route login yang sesuai
        }

        // Mengambil data pengguna yang sedang login
        $pengguna = Auth::user();

        // Mengirim data pengguna ke view
        return view('profil wali', [
            'pengguna' => $pengguna
        ]);
    }
}
