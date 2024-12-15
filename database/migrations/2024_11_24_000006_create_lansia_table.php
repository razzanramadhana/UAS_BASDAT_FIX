<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lansia', function (Blueprint $table) {
            $table->id(); // Auto-increment sebagai primary key
            $table->string('nama'); // Nama lansia
            $table->string('nik')->unique(); // NIK unik
            $table->date('tanggal_lahir'); // Tanggal lahir
            $table->enum('jenis_kelamin', ['L', 'P']); // Jenis kelamin: L (Laki-laki), P (Perempuan)
            $table->text('alamat'); // Alamat
            $table->string('no_telp'); // Nomor telepon
            $table->date('tanggal_daftar'); // Tanggal daftar
            $table->text('riwayat_penyakit')->nullable(); // Riwayat penyakit
            $table->text('alergi_obat')->nullable(); // Alergi obat
            $table->unsignedBigInteger('id_pengguna'); // Foreign key dengan auto-increment
           
            // Menambahkan kolom riwayat_penyakit dan alergi_obat

            // Definisi foreign key yang merujuk ke tabel 'pengguna'
            $table->foreign('id_pengguna')
                ->references('id') // Kolom referensi di tabel 'pengguna'
                ->on('pengguna')
                ->onDelete('cascade'); // Hapus otomatis jika data di 'pengguna' dihapus

            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        Schema::dropIfExists('lansia'); // Hapus tabel jika rollback
    }
};
