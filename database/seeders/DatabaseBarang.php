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
            [
                'nama_barang' => 'meja makan',
                'foto_barang' => 'meja_makan.jpg',
                'deskripsi_barang' => 'meja makan kayu ulin',
                'stok_barang' => 20,
                'harga_barang' => 900.000,
            ],
            [
                'nama_barang' => 'sofa panjang',
                'foto_barang' => 'sofa_panjang.jpg',
                'deskripsi_barang' => 'sofa nyaman untuk ruang tamu',
                'stok_barang' => 10,
                'harga_barang' => 680.000,
            ],
            [
                'nama_barang' => 'lantai marmer',
                'foto_barang' => 'lantai_marmer.jpg',
                'deskripsi_barang' => 'lantai marmer dengan pola unik',
                'stok_barang' => 109,
                'harga_barang' => 550.000,
            ],
            [
                'nama_barang' => 'kursi kayu',
                'foto_barang' => 'kursi_kayu.jpg',
                'deskripsi_barang' => 'kursi kayu ruang tengah',
                'stok_barang' => 10,
                'harga_barang' => 550.000,
            ],
            [
                'nama_barang' => 'pegboard',
                'foto_barang' => 'pegboard.jpg',
                'deskripsi_barang' => 'pegboard besi',
                'stok_barang' => 10,
                'harga_barang' => 550.000,
            ],
            [
                'nama_barang' => 'kaki meja',
                'foto_barang' => 'kaki_meja.jpg',
                'deskripsi_barang' => 'kaki meja 4 buah',
                'stok_barang' => 150,
                'harga_barang' => 50.000,
            ],
            [
                'nama_barang' => 'handle pintu',
                'foto_barang' => 'handle_pintu.jpg',
                'deskripsi_barang' => 'kursi buat ngegame',
                'stok_barang' => 10,
                'harga_barang' => 550.000,
            ],
            [
                'nama_barang' => 'rak sepatu',
                'foto_barang' => 'rak_sepatu.jpg',
                'deskripsi_barang' => 'kursi buat ngegame',
                'stok_barang' => 10,
                'harga_barang' => 550.000,
            ],
        ]);
    }
}
