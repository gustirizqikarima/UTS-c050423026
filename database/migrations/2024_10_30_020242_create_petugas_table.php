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
        Schema::create('petugas', function (Blueprint $table) {
            $table->id('id_petugas'); // Primary Key
            $table->string('nama_petugas', 100); // Nama petugas
            $table->string('kontak', 50); // Kontak petugas
            $table->string('email', 100)->unique(); // Email petugas
            $table->foreignId('id_wilayah')->constrained('wilayahs', 'id_wilayah')->onDelete('cascade'); // Foreign Key ke tabel wilayah
            $table->timestamps(); // Timestamps (created_at dan updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petugas');
    }
};