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
        Schema::create('gaya_bahasas', function (Blueprint $table) {
            $table->id();
            $table->text('contoh_kalimat');
            $table->string('frasa_kunci');
            $table->string('frasa_tipe');
            $table->string('makna_kiasan');
            $table->string('keterangan_konteks');
            $table->enum('kategori', ['simile', 'metafora', 'hiperbola', 'personifikasi', 'ironi', 'paradoks', 'klimaks', 'anti_klimaks', 'litotes', 'eufemisme']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gaya_bahasas');
    }
};
