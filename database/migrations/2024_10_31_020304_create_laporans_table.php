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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id('id_laporan'); // Primary key untuk tabel laporans
            $table->foreignId('id_wilayah')->constrained('wilayahs')->onDelete('cascade'); // Foreign key yang merujuk ke id_wilayah di tabel wilayahs, dengan cascade delete jika data wilayah dihapus
            $table->foreignId('id_petugas')->constrained('petugas')->onDelete('cascade'); // Foreign key yang merujuk ke id_petugas di tabel petugas, dengan cascade delete jika data petugas dihapus
            $table->date('tanggal_laporan'); // Tipe DATE untuk menyimpan tanggal laporan
            $table->text('isi_laporan'); // Tipe TEXT untuk menyimpan isi laporan secara rinci
            $table->enum('status', ['Pending', 'Selesai'])->default('Pending'); // Tipe ENUM untuk menyimpan status laporan, dengan nilai default Pending
            $table->timestamps(); // Timestamps (created_at dan updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};