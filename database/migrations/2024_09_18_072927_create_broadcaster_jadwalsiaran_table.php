<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBroadcasterJadwalsiaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('broadcaster_jadwalsiaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_jadwal_siaran');
            $table->unsignedBigInteger('id_broadcaster');
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_jadwal_siaran')->references('id')->on('jadwalsiaran')->onDelete('cascade');
            $table->foreign('id_broadcaster')->references('id')->on('broadcaster')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('broadcaster_jadwalsiaran');
    }
}
