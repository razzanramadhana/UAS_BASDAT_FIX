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
        Schema::create('master_jadwal', function (Blueprint $table) {
            $table->id(); // Auto-increment Primary Key
            $table->unsignedBigInteger('id_sesi'); // Foreign Key menggunakan auto-increment

            // Definisikan foreign key secara eksplisit
            $table->foreign('id_sesi')
                  ->references('id') // Kolom yang dirujuk di tabel master_sesi
                  ->on('master_sesi')
                  ->onDelete('cascade'); // Hapus otomatis jika master_sesi dihapus
            
            $table->string('hari'); // Kolom hari
            $table->date('tanggal'); // Tambahkan kolom tanggal
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_jadwal');
    }
};
