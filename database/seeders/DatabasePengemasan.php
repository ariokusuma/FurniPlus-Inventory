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
    public function run(): void
    {
        DB::table('database_pengemasan')->insert([
            [
                'id_pengemasan'=>1,
                'id_pesanan'=>1,
                'nama_pengguna'=>'pawpaw',
                'alamat'=>'Sukapura',
                'no_hp'=>123,
                'jumlah_pesanan'=>3,
                'status'=>'siap dikirim',
                'resi'=>12345678,
                'nama_barang'=>'kursi',
                'deskripsi'=>'Kursi kakinya ada enam'
            ],
            [
                'id_pengemasan'=>2,
                'id_pesanan'=>2,
                'nama_pengguna'=>'lala',
                'alamat'=>'Sukpur',
                'no_hp'=>234,
                'jumlah_pesanan'=>2,
                'status'=>'siap dikirim',
                'resi'=>12345679,
                'nama_barang'=>'meja',
                'deskripsi'=>'meja kakinya ada empat'
            ]
            ]);
    }
}
