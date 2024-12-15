<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NakesDashboardController extends Controller
{
    public function __construct()
    {
        // Menambahkan middleware auth untuk mengakses dashboard
        $this->middleware('auth');
    }

    public function index()

    {
        $user = auth()->user();  // Mengambil data pengguna yang sedang login
        
        return view('dashboard nakes', compact('user'));  // Pastikan data 'user' sudah dikirimkan
    }

}
