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
        Schema::create('citraans', function (Blueprint $table) {
            $table->id();
            $table->string('lanskap');
            $table->text('data');
            $table->string('domain_sumber');
            $table->string('domain_makna');
            $table->string('konteks');
            $table->enum('kategori', ['visual', 'auditori', 'olfaktori', 'gustatori', 'taktil', 'kinestetik', 'organik']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citraans');
    }
};
