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
        Schema::create('harga_tbs', function (Blueprint $table) {
            $table->id('harga_id');  // Primary key
            $table->float('harga_perkg');  // Harga per kg TBS
            $table->date('tanggal');  // Tanggal harga TBS
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('harga_tbs');
    }
};
