<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('database_refund', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_barang');
            $table->unsignedBigInteger('id_user');
            $table->string('nama_pengguna');
            $table->string('alamat');
            $table->string('no_hp');
            $table->integer('jumlah_pesanan');
            $table->integer('total_harga');
            $table->string('status');
            $table->string('resi');
            $table->string('alasan_refund');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_refund');
    }
};
