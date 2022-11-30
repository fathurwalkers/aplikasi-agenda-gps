<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendasTable extends Migration
{
    public function up()
    {
        Schema::create('agenda', function (Blueprint $table) {
            $table->id();

            $table->string('agenda_nama')->nullable();
            $table->string('agenda_tempat')->nullable();
            $table->longText('agenda_keterangan')->nullable();
            $table->string('agenda_lat')->nullable();
            $table->string('agenda_long')->nullable();
            $table->string('agenda_status')->nullable();
            $table->string('agenda_penyelenggara')->nullable();
            $table->dateTime('agenda_waktu')->nullable();

            $table->unsignedBigInteger('bulan_id')->nullable();
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->foreign('bulan_id')->references('id')->on('bulan');
            $table->foreign('kategori_id')->references('id')->on('kategori');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('agenda');
    }
}
