<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseBarang extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //
        DB::table('database_barang')->insert([
        // DB::table('database_barang')->insert([
            [
                'nama_barang' => 'Linnmon',
                'foto_barang' => 'linnmon.jpg',
                'deskripsi_barang' => 'daun meja',
                'stok_barang' => 10,
                'harga_barang' => 499.000,
            ],
            [
                'nama_barang' => 'lampu aesthetic',
                'foto_barang' => 'lampus_aesthetic.jpg',
                'deskripsi_barang' => 'lampu cakep',
                'stok_barang' => 5,
                'harga_barang' => 55.000,
            ],
        ]);
    }
}
