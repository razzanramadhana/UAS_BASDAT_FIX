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
        Schema::create('hasil_kesehatan', function (Blueprint $table) {
            $table->id(); // Auto-increment Primary Key
            $table->string('tekanan_darah');
            $table->string('berat_badan');
            $table->string('tinggi_badan');
            $table->string('gula_darah');
            $table->string('kolesterol');
            $table->text('komentar_nakes');

            // Foreign key ke tabel kelola_kunjungan
            $table->unsignedBigInteger('id_kelola_kunjungan'); 
            $table->foreign('id_kelola_kunjungan')
                  ->references('id') // Kolom yang dirujuk di tabel kelola_kunjungan
                  ->on('kelola_kunjungan')
                  ->onDelete('cascade'); // Hapus otomatis jika kelola_kunjungan dihapus
            
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_kesehatan');
    }
};
