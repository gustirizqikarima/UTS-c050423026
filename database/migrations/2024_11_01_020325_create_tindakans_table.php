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
        Schema::create('tindakans', function (Blueprint $table) {
            $table->id('id_tindakan'); // ID unik untuk tindakan (Primary Key, AUTO_INCREMENT)
            $table->unsignedBigInteger('id_laporan'); // Foreign key ke laporan
            $table->string('jenis_tindakan', 100); // Jenis tindakan (misalnya: Evakuasi, Pemadaman)
            $table->date('tanggal_tindakan'); // Tanggal tindakan dilakukan
            $table->text('deskripsi')->nullable(); // Deskripsi tindakan
            $table->timestamps(); // Kolom created_at dan updated_at

            // Menambahkan foreign key constraint
            $table->foreign('id_laporan')->references('id')->on('laporans')->onDelete('cascade');
        });
    }

    /**
     * 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tindakans');
    }
};
