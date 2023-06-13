<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::dropIfExists('database_pengemasan');

        Schema::create('database_pengemasan', function (Blueprint $table) {
            $table->id('id_pengemasan');
            $table->unsignedBigInteger('id_pesanan');
            // $table->foreign('id_pesanan')->references('id_pesanan')->on('database_pesanan');
            $table->string('nama_pengguna');
            $table->string('alamat');
            $table->integer('no_hp');
            $table->integer('jumlah_pesanan');
            $table->string('status');
            $table->integer('resi')->nullable();
            $table->string('nama_barang')->nullable();
            $table->string('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('database_pengemasan');
    }
};
