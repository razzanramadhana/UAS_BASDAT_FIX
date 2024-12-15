<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggunaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id(); // Auto-increment Primary Key
            $table->string('nama'); // Nama Pengguna
            $table->string('nik')->unique(); // Nomor Identitas (Unique)
            $table->string('email')->unique(); // Email (Unique)
            $table->string('no_telephone')->nullable(); // No Telepon
            $table->date('tanggal_lahir'); // Tanggal Lahir
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']); // Jenis Kelamin
            $table->text('alamat')->nullable(); // Alamat
            $table->string('password'); // Password untuk Login
            $table->enum('role', ['nakes', 'wali'])->default('wali'); // Role: nakes (Tenaga Kesehatan), wali (Guardian)
            $table->timestamps(); // Timestamps: created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengguna');
    }
}
