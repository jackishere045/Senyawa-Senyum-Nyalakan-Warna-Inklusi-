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
        Schema::create('events', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->string('penyelenggara'); // ganti dari deskripsi awal
        $table->date('tanggal');
        $table->string('lokasi');
        $table->string('gambar')->nullable();
        $table->text('deskripsi'); // deskripsi detail
        $table->text('cara_mendaftar'); // cara daftar
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
