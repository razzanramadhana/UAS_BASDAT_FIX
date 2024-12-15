<?php

namespace App\Http\Controllers;

use App\Models\Rujukan;

class StatusRujukanController extends Controller
{
    /**
     * Tampilkan halaman status rujukan.
     */
    public function index()
    {
        // Ambil data rujukan beserta relasi kelolaKunjungan dan lansia
        $rujukan = Rujukan::with('kelolaKunjungan.lansia')->get();

        // Return ke view dengan data
        return view('status rujukan', compact('rujukan'));
    }
}
