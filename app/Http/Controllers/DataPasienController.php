<?php

namespace App\Http\Controllers;

use App\Models\Lansia; // Import model Lansia
use Illuminate\Http\Request;

class DataPasienController extends Controller
{
    // Method untuk menampilkan data pasien
    public function index()
    {
        // Ambil semua data lansia dari database
        $lansia = Lansia::all(); 

        // Kirim data lansia ke view
        return view('data_pasien', compact('lansia'));
    }
}
