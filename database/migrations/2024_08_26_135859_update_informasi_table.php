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
        Schema::table('informasi', function (Blueprint $table) {
            // Mengatur kolom tanggal_informasi dan kolom lainnya menjadi nullable
            $table->date('tanggal_informasi')->nullable()->change();
            $table->date('tanggal_update')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('informasi', function (Blueprint $table) {
            Schema::table('informasi', function (Blueprint $table) {
                // Jika diperlukan, kembalikan ke keadaan semula
                $table->date('tanggal_informasi')->nullable(false)->change();
                $table->date('tanggal_update')->nullable(false)->change();
            });
        });
    }
};
