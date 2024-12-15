<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman login.
     *
     * @return \Illuminate\View\View
     */
    public function showForm()
    {
        return view('login');  // Pastikan kamu memiliki view login.blade.php
    }

    /**
     * Menangani proses login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Melakukan autentikasi menggunakan data yang dikirimkan
        if (Auth::attempt($credentials)) {
            // Mendapatkan pengguna yang sedang login
            $user = Auth::user();

            // Memeriksa role pengguna
            if ($user->role === 'nakes') {
                // Jika pengguna adalah "nakes", arahkan ke dashboard nakes
                return redirect()->route('dashboard nakes');  // Arahkan ke dashboard nakes.blade.php
            } else {
                // Jika pengguna bukan "nakes", arahkan ke dashboard umum
                return redirect()->route('dashboard');  // Arahkan ke dashboard umum
            }
        }

        // Jika login gagal, kembalikan dengan error message
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }
}
