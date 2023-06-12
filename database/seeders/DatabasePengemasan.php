<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabasePengemasan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('database_pengemasan')->insert([
            [
                'id_pengemasan'=>3,
                'id_pesanan'=>1,
                'nama_pengguna'=>'pawpaw',
                'alamat'=>'Sukapura',
                'no_hp'=>123,
                'jumlah_pesanan'=>3,
                'status'=>'siap dikirim dan diserahkan kepada pihak perngiriman',
                'resi'=>null,
                'nama_barang'=>'kursi',
                'deskripsi'=>'Kursi kakinya ada enam'
            ],
            [
                'id_pengemasan'=>4,
                'id_pesanan'=>2,
                'nama_pengguna'=>'lala',
                'alamat'=>'Sukpur',
                'no_hp'=>234,
                'jumlah_pesanan'=>2,
                'status'=>'siap dikirim dan diserahkan kepada pihak perngiriman',
                'resi'=>null,
                'nama_barang'=>'meja',
                'deskripsi'=>'meja kakinya ada empat'
            ]
            ]);
    }
}
