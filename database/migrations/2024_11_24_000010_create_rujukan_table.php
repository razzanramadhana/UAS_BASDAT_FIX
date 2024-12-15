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
        Schema::create('rujukan', function (Blueprint $table) {
            $table->id(); // Auto-increment Primary Key
            $table->unsignedBigInteger('id_rumah_sakit'); // Foreign key ke tabel rumah_sakit
            $table->unsignedBigInteger('id_kelola_kunjungan'); // Foreign key ke tabel kelola_kunjungan
            $table->enum('status_rujukan', ['Diproses', 'Diterima'])->default('Diproses'); // Kolom status_rujukan
            $table->timestamps();

            // Definisi foreign key untuk id_rumah_sakit
            $table->foreign('id_rumah_sakit')
                  ->references('id') // Kolom yang dirujuk di tabel rumah_sakit
                  ->on('rumah_sakit')
                  ->onDelete('cascade');

            // Definisi foreign key untuk id_kelola_kunjungan
            $table->foreign('id_kelola_kunjungan')
                  ->references('id') // Kolom yang dirujuk di tabel kelola_kunjungan
                  ->on('kelola_kunjungan')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rujukan');
    }
};
