<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rujukan;

class StatusRujukanController extends Controller
{
    // Method untuk menampilkan data rujukan
    public function index()
    {
        // Ambil data rujukan beserta relasi kelolaKunjungan dan lansia
        $rujukan = Rujukan::with('kelolaKunjungan.lansia')->get();
        
        // Debugging data rujukan (Opsional, bisa dihapus jika tidak perlu)
        // dd($rujukan);
        
        // Return ke view dengan data
        return view('status rujukan', compact('rujukan'));
    }
}