<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformasisTable extends Migration
{
    public function up()
    {
        Schema::create('informasi', function (Blueprint $table) {
            $table->id();

            $table->string('informasi_judul')->nullable();
            $table->text('informasi_isi')->nullable();
            $table->string('informasi_status')->nullable();
            $table->dateTime('informasi_waktu')->nullable();

            $table->unsignedBigInteger('agenda_id')->nullable();
            $table->foreign('agenda_id')->references('id')->on('agenda');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('informasi');
    }
}
