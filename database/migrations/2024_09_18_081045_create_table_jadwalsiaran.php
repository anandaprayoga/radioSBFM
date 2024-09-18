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
        Schema::create('jadwalsiaran', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('hari');
            $table->time('waktu_mulai');
            $table->time('waktu_berakhir');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwalsiaran');
    }
};
