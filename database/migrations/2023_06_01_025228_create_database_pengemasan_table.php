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
        Schema::create('database_pengemasan', function (Blueprint $table) {
            $table->id('id_pengemasan');
            $table->unsignedBigInteger('id_pesanan');
            $table->foreign('id_pesanan')->references('id_pesanan')->on('database_pesanan');
            $table->string('nama_pengguna');
            $table->string('alamat');
            $table->integer('no_hp');
            $table->integer('jumlah_pesanan');
            $table->string('status');
            $table->integer('resi');
            $table->string('nama_barang');
            $table->string('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('database_pengemasan');
    }
};
