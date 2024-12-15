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
        Schema::create('kelola_kunjungan', function (Blueprint $table) {
            $table->id(); // Auto-increment Primary Key
            
            // Foreign key ke tabel lansia
            $table->unsignedBigInteger('id_lansia'); 
            $table->foreign('id_lansia')
                  ->references('id') // Kolom yang dirujuk di tabel lansia
                  ->on('lansia')
                  ->onDelete('cascade'); // Jika lansia dihapus, kunjungan ikut terhapus
            
            // Foreign key ke tabel master_jadwal
            $table->unsignedBigInteger('id_master_jadwal'); 
            $table->foreign('id_master_jadwal')
                  ->references('id') // Kolom yang dirujuk di tabel master_jadwal
                  ->on('master_jadwal')
                  ->onDelete('cascade'); // Jika jadwal dihapus, kunjungan ikut terhapus
            
            // Kolom tambahan
            $table->date('tanggal'); // Kolom tanggal kunjungan
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelola_kunjungan');
    }
};
