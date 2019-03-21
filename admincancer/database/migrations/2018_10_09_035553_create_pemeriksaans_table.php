<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemeriksaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemeriksaans', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('category_id')->unsigned();;
            $table->integer('pasiens_id')->unsigned();
            $table->integer('dokters_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('category');
            $table->foreign('pasiens_id')->references('id')->on('pasiens');
            $table->foreign('dokters_id')->references('id')->on('dokters');
            $table->date('tgl_periksa');
            $table->string('hasil_periksa');
            $table->string('resep_obat');
            $table->string('treatment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemeriksaans');
    }
}
