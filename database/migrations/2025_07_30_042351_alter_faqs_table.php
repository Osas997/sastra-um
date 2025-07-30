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
        Schema::table('faqs', function (Blueprint $table) {
            $table->enum('kategori', ['Akademik','Fasilitas','Fakultas','Dan lain lain'])->after('jawaban');
            $table->date('tanggal')->after('kategori');
            $table->enum('status', ['draf', 'terunggah'])->default('draf')->after('tanggal');
        });    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('faqs', function (Blueprint $table) {
            $table->dropColumn(['kategori','tanggal','status']);
        });
    }
};
