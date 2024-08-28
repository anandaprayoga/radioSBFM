<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnsFromInformasiTable extends Migration
{
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('informasi', function (Blueprint $table) {
            $table->dropColumn(['tanggal_informasi', 'tanggal_update', 'status_informasi']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('informasi', function (Blueprint $table) {
            $table->date('tanggal_informasi')->nullable();
            $table->date('tanggal_update')->nullable();
            $table->string('status_informasi')->nullable();
        });
    }
}
