<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBulansTable extends Migration
{
    public function up()
    {
        Schema::create('bulan', function (Blueprint $table) {
            $table->id();

            $table->string('bulan_nama')->nullable();
            $table->string('bulan_keterangan')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bulan');
    }
}
