<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatabasePesanan;

class DatabasePesananController extends Controller
{

    public function showbyid($id_pesanan)
    {
        $id_pesanan = DatabasePesanan::findorfail($id_pesanan);
        if ($id_pesanan) {
            return response()->json($id_pesanan);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_pesanan)
    {
        $pesanan = DatabasePesanan::findorfail($id_pesanan);
        $pesanan ->update($request->all());
        return $pesanan;
        
    }

}


