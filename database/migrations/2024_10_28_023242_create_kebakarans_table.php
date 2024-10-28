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
        Schema::create('kebakarans', function (Blueprint $table) {
            $table->id('id_kebakaran'); // Primary Key
            $table->foreignId('id_wilayah')->constrained('wilayahs', 'id_wilayah')->onDelete('cascade'); // Foreign Key ke tabel wilayah
            $table->date('tanggal'); // Tanggal kejadian kebakaran
            $table->integer('jumlah_korban')->nullable(); // Jumlah korban (opsional)
            $table->decimal('kerugian', 15, 2)->nullable(); // Kerugian akibat kebakaran (dalam rupiah, opsional)
            $table->string('penyebab', 255)->nullable(); // Penyebab kebakaran (opsional)
            $table->timestamps(); // Timestamps (created_at dan updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kebakarans');
    }
};