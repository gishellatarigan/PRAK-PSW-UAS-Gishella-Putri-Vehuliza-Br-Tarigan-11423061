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
        Schema::create('lapangans', function (Blueprint $table) {
            $table->id();
            $table->string('namaLapangan');
            $table->unsignedBigInteger('pengelola');
            $table->foreign('pengelola')->references('id')->on('pengelolas')->onDelete('cascade');
            $table->string('hargaLapangan');
            $table->string('fotoLapangan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lapangans');
    }
};
