<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggunasTable extends Migration
{
    public function up()
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id();

            $table->string('pengguna_nama')->nullable();
            $table->string('pengguna_jeniskelamin')->nullable();
            $table->string('pengguna_alamat')->nullable();
            $table->string('pengguna_telepon')->nullable();
            $table->string('pengguna_foto')->nullable();
            $table->string('pengguna_status')->nullable();

            $table->unsignedBigInteger('login_id')->nullable();
            $table->foreign('login_id')->references('id')->on('login')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengguna');
    }
}
