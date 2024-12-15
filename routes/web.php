<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilLansiaController;
use App\Http\Controllers\HasilKesehatanController;
use App\Http\Controllers\KelolaKunjunganController;


// Route untuk menampilkan form login
Route::get('/', [LoginController::class, 'showForm'])->name('login.form');

// Route untuk menangani proses login (POST)
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware('auth')->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/profil-wali', function () {
    return view('profil wali');
});

use App\Http\Controllers\ProfilWaliController;

Route::get('/profil-wali', [ProfilWaliController::class, 'show'])
    ->middleware('auth')
    ->name('profil.wali');

   

Route::get('/profil-lansia', function () {
        return view('profil lansia');
});

// Route::get('/tambahkan-lansia', function () {
//     return view('tambahkan_lansia');
// });

use App\Http\Controllers\LansiaController;

Route::get('/tambahkan-lansia', [LansiaController::class, 'showForm']);  // For displaying the form

Route::post('/store-lansia', [LansiaController::class, 'store'])->name('lansia.store');




Route::get('/profil-lansia', [ProfilLansiaController::class, 'show'])
    ->middleware('auth')
    ->name('profil.lansia');

route::get('/dashboard nakes', function () {
        return view('dashboard nakes');
});  

use App\Http\Controllers\NakesDashboardController;

// Route untuk dashboard nakes
Route::get('/dashboard nakes', [NakesDashboardController::class, 'index'])->name('nakes.dashboard');

use Illuminate\Support\Facades\Auth;

// Definisikan route untuk logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');  // Arahkan ke halaman home setelah logout
})->name('logout');



Route::middleware('auth')->get('/dashboard nakes', [DashboardController::class, 'index'])->name('dashboard nakes');

Route::get('/hasil-kesehatan', [HasilKesehatanController::class, 'index'])->name('hasil-kesehatan');


Route::middleware('auth')->get('/dashboard nakes', [NakesDashboardController::class, 'index'])->name('dashboard nakes');

use App\Http\Controllers\JadwalNakesDashboardController;

Route::get('/jadwal-nakes', [JadwalNakesDashboardController::class, 'index'])->name('jadwal-nakes');


use App\Http\Controllers\InputHasilKesehatanController;



// Route untuk menampilkan form input hasil kesehatan
Route::get('/input-hasil-kesehatan', [InputHasilKesehatanController::class, 'create'])
    ->name('input-hasil-kesehatan.create');

// Route untuk menyimpan hasil kesehatan ke database
Route::post('/input-hasil-kesehatan', [InputHasilKesehatanController::class, 'store'])
    ->name('input-hasil-kesehatan.store');




use App\Http\Controllers\DataPasienController;

Route::get('/data-pasien', [DataPasienController::class, 'index'])->name('data-pasien');

Route::middleware(['auth'])->group(function () {
    // Menampilkan daftar kunjungan
    Route::get('/kelola-kunjungan', [KelolaKunjunganController::class, 'index'])->name('kelola-kunjungan.index');

    // Tampilkan form untuk menambahkan kunjungan baru
    Route::get('/kelola-kunjungan/create', [KelolaKunjunganController::class, 'create'])->name('kelola-kunjungan.create');

    // Simpan data kunjungan baru
    Route::post('/kelola-kunjungan', [KelolaKunjunganController::class, 'store'])->name('kelola-kunjungan.store');

    // Tampilkan form untuk mengedit data kunjungan
    Route::get('/kelola-kunjungan/{id}/edit', [KelolaKunjunganController::class, 'edit'])->name('kelola-kunjungan.edit');

    // Perbarui data kunjungan
    Route::put('/kelola-kunjungan/{id}', [KelolaKunjunganController::class, 'update'])->name('kelola-kunjungan.update');

    // Hapus data kunjungan
    Route::delete('/kelola-kunjungan/{id}', [KelolaKunjunganController::class, 'destroy'])->name('kelola-kunjungan.destroy');
});

use App\Http\Controllers\StatusRujukanController;

// Route untuk status rujukan
Route::get('/status-rujukan', [StatusRujukanController::class, 'index'])->name('status-rujukan.index');






Route::get('/input-hasil-kesehatan', [InputHasilKesehatanController::class, 'create'])->name('input-hasil-kesehatan');
Route::post('/input-hasil-kesehatan', [InputHasilKesehatanController::class, 'store'])->name('input-hasil-kesehatan.store');


// routes/web.php


use App\Http\Controllers\RujukanController;

Route::get('rujukan', [RujukanController::class, 'index'])->name('rujukan.index');
Route::get('rujukan/create', [RujukanController::class, 'create'])->name('rujukan.create');
Route::post('rujukan', [RujukanController::class, 'store'])->name('rujukan.store');
Route::get('rujukan/{id}/edit', [RujukanController::class, 'edit'])->name('rujukan.edit');
Route::put('rujukan/{id}', [RujukanController::class, 'update'])->name('rujukan.update');
Route::delete('rujukan/{id}', [RujukanController::class, 'destroy'])->name('rujukan.destroy');


// Untuk AJAX
// Route::get('rujukan/fetchKunjungan', [RujukanController::class, 'fetchKunjungan'])->name('rujukan.fetchKunjungan');
