<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        // Menambahkan middleware auth untuk mengakses dashboard
        $this->middleware('auth');
    }

    public function index()
    {
        // Mengambil data user yang sedang login
        $user = auth()->user();

        // Mengirim data user ke view 'dashboard'
        return view('dashboard', compact('user'));
    }
}

