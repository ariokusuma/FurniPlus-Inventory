<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabasePesanan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run():void
    {
        // DB::table('database_pesanan')->insert([
        //         [
        //             'id_barang'=>1,
        //             'id_user'=>1,
        //             'nama_pengguna'=>'pawpaw',
        //             'alamat'=>'Sukapura',
        //             'no_hp'=>123,
        //             'jumlah_pesanan'=>3,
        //             'total_harga'=>50000,
        //             'status'=>'memintan barang',
        //             'resi'=>null,
        //         ],
        //         [
        //             'id_barang'=>2,
        //             'id_user'=>2,
        //             'nama_pengguna'=>'lala',
        //             'alamat'=>'Bojongsoang',
        //             'no_hp'=>356,
        //             'jumlah_pesanan'=>3,
        //             'total_harga'=>50000,
        //             'status'=>'memesan barang',
        //             'resi'=>null,
        //         ],
        //     ]);
    }
}
