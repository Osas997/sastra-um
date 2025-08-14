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
        Schema::create('konotatifs', function (Blueprint $table) {
            $table->id();
            $table->string('nomina');
            $table->string('nomina2')->nullable();
            $table->string('verba')->nullable();
            $table->string('adjektiva')->nullable();
            $table->string('adverbia')->nullable();
            $table->text('kata_konotatif');
            $table->string('contoh_penggunaan');
            $table->string('makna');
            $table->string('fungsi');
            $table->string('konteks');
            $table->enum('kategori', ['nomina', 'verba', 'adjektiva', 'adverbia']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konotatifs');
    }
};
