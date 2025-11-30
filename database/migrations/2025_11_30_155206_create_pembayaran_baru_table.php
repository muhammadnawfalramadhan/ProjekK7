<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pembayaran_baru', function (Blueprint $table) {
            $table->id('id_bayar');  // Primary key untuk pembayaran
            $table->foreignId('timbangans_id')->constrained('timbangans')->onDelete('cascade');  // Foreign key ke tabel timbangan
            $table->foreignId('harga_id')->constrained('harga_tbs')->onDelete('cascade');  // Foreign key ke tabel harga_tbs
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');  // Foreign key ke tabel users (admin atau bendahara)
            $table->string('nama_petani');  // Nama petani yang melakukan pembayaran
            $table->float('total_berat');  // Total berat TBS yang ditimbang
            $table->float('harga_perkg');  // Harga per kg yang diterapkan
            $table->float('total_bayar');  // Total pembayaran yang harus dibayar
            $table->enum('status', ['belum dibayar', 'sudah dibayar']);  // Status pembayaran
            $table->date('tanggal_transaksi');  // Tanggal transaksi pembayaran
            $table->timestamps();  // Timestamps untuk created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembayaran_baru');
    }
};
