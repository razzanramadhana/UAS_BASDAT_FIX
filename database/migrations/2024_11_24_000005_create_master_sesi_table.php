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
        Schema::create('master_sesi', function (Blueprint $table) {
            $table->id(); // Auto-increment Primary Key
            $table->string('sesi'); // Nama Sesi
            $table->unsignedBigInteger('id_pengguna'); // Foreign Key menggunakan auto-increment
            
            // Define the foreign key constraint
            $table->foreign('id_pengguna')
                  ->references('id') // Referensi ke kolom 'id' di tabel 'pengguna'
                  ->on('pengguna')
                  ->onDelete('cascade'); // Cascade on delete
            
            $table->timestamps(); // Timestamps: created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_sesi');
    }
};
