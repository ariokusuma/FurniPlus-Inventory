<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatabasePesanan;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;

class DatabasePesananController extends Controller
{
    public function index()
    {
        //
        $database_pesanan = DatabasePesanan::paginate(10);
        return response()->json([
            'data_pesanan' => $database_pesanan
        ]);
    }
    public function store(Request $request)
    {
        //
        $pesanan = DatabasePesanan::create([
            'id_pesanan' => $request->id_pesanan,
            'id_barang' => $request->id_barang,
            'id_user' => $request->id_user,
            'nama_pengguna' => $request->nama_pengguna,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'jumlah_pesanan' => $request->jumlah_pesanan,
            'total_harga' => $request->total_harga,
            'status' => $request->status,
            'resi' => $request->resi,
        ]);
        return response()->json([
            'data_pesanan' => $pesanan
        ]);
    }
    public function show(DatabasePesanan $pesanan)
    {
        return response()->json([
            'data_pesanan' => $pesanan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_pesanan)
    {
        $pesanan = DatabasePesanan::find($id_pesanan);
        if ($pesanan){
            $validator = Validator::make($request->all(), [
                'id_barang'=>'integer',
                'id_user'=>'integer',
                'nama_pengguna'=>'string',
                'alamat'=>'string',
                'no_hp'=>'integer',
                'jumlah_pesanan'=>'integer', 
                'total_harga'=>'integer',
                'status'=>'string'
            ]);
            if ($validator->fails()){
                return '400 = Bad Request';

            }
            else{

                $pesanan = DatabasePesanan::find($id_pesanan);
                $pesanan ->update($request->all());
                return response()->json([
                    'message'=>'200 = Ok',
                    'response'=>$pesanan
                ]);
            }

        } else {
            return "404 = Not Found";
        }

    }

}


