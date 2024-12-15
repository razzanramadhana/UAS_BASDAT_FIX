<?php

// app/Http/Controllers/RegisterController.php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Menampilkan form registrasi.
     *
     * @return \Illuminate\View\View
     */
    public function showForm()
    {
        return view('register');
    }

    /**
     * Menangani proses registrasi pengguna.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Validasi input form
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'nik' => 'required|unique:pengguna,nik|digits:16',  // Validasi untuk NIK 16 digit
            'email' => 'required|email|unique:pengguna,email',  // Validasi email
            'password' => 'required|min:8|confirmed',  // Validasi password dan konfirmasi
            'tanggal_lahir' => 'required|date',  // Validasi tanggal lahir
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',  // Validasi jenis kelamin
            'no_telephone' => 'nullable|numeric',  // Validasi nomor telepon
            'alamat' => 'nullable|string',  // Validasi alamat
        ]);
        
        // Cek apakah validasi gagal
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Simpan data pengguna baru dengan role 'wali'
        Pengguna::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'email' => $request->email,
            'no_telephone' => $request->no_telephone,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),  // Hash password
            'role' => 'wali',  // Set role default menjadi 'wali'
        ]);

        // Redirect ke halaman login setelah registrasi berhasil
        return redirect()->route('login.form')->with('success', 'Registrasi berhasil, silakan login!');
    }
}