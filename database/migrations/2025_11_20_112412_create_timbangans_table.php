<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('timbangans', function (Blueprint $table) {
            $table->id();
            $table->string('tukang_id');
            $table->string('nama_petani');
            $table->float('berat');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('timbangans');
    }
};
