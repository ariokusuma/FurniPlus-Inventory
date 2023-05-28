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
        Schema::dropIfExists('database_barang');
        
        Schema::create('database_barang', function (Blueprint $table) {
            $table->id('id_barang', 10);
            $table->string('nama_barang', 50);
            $table->string('foto_barang');
            $table->string('deskripsi_barang', 250);
            $table->integer('stok_barang');
            $table->integer('harga_barang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('database_barang');
    }
};
