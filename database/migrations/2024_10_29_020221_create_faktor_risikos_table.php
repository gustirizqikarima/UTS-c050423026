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
        Schema::create('faktor_risikos', function (Blueprint $table) {
            $table->id('id_faktor'); // Primary Key
            $table->foreignId('id_wilayah')->constrained('wilayahs', 'id_wilayah')->onDelete('cascade'); // Foreign Key ke tabel wilayah
            $table->string('nama_faktor', 100); // Nama faktor risiko
            $table->enum('tingkat_risiko', ['Rendah', 'Sedang', 'Tinggi']); // Tingkat risiko kebakaran
            $table->timestamps(); // Timestamps (created_at dan updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faktor_risikos');
    }
};