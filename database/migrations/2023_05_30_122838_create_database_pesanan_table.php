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
        Schema::create('database_pesanan', function (Blueprint $table) {
            $table->id('id_pesanan');
            $table->unsignedBigInteger('id_barang');
            $table->foreign('id_barang')->references('id_barang')->on('database_barang');
            $table->unsignedBigInteger('id_user');
            $table->string('nama_pengguna');
            $table->string('alamat');
            $table->integer('no_hp');
            $table->integer('jumlah_pesanan');
            $table->integer('total_harga');
            $table->string('status');
            $table->integer('resi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('database_pesanan');
    }
};