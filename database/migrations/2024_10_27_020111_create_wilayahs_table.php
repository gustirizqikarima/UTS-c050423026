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
        Schema::create('wilayahs', function (Blueprint $table) {
            $table->id('id_wilayah'); // Primary Key
            $table->string('nama_wilayah', 100); // Nama wilayah atau daerah
            $table->decimal('latitude', 10, 8)->nullable(); // Koordinat latitude
            $table->decimal('longitude', 11, 8)->nullable(); // Koordinat longitude
            $table->integer('populasi')->nullable(); // Jumlah populasi
            $table->decimal('luas_area', 10, 2)->nullable(); // Luas area dalam km²
            $table->timestamps(); // Timestamps (created_at dan updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wilayahs');
    }
};