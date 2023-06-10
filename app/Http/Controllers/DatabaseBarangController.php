<?php

namespace App\Http\Controllers;

use App\Models\DatabaseBarang;
use Illuminate\Http\Request;

class DatabaseBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $database_barang = DatabaseBarang::all();
        return response()->json([
            'data_barang' => $database_barang
        ]);
    }

    public function showbyid($id_barang)
    {
        $id_barang = DatabaseBarang::findorfail($id_barang);
        if ($id_barang) {
            return response()->json($id_barang);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data_barang = DatabaseBarang::create([
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'foto_barang' => $request->foto_barang,
            'deskripsi_barang' => $request->deskripsi_barang,
            'stok_barang' => $request->stok_barang,
            'harga_barang' => $request->harga_barang,
        ]);
        return response()->json([
            'data' => $data_barang
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(DatabaseBarang $database_barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DatabaseBarang $database_barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateBarang(Request $request, $id_barang)
    {
        $id_barang = DatabaseBarang::findorfail($id_barang);

        $validasiData = $request->validate([
            'id_barang' => 'required',
            'nama_barang' => 'required',
            'foto_barang' => 'required',
            'deskripsi_barang' => 'required',
            'stok_barang' => 'required',
            'harga_barang' => 'required',
        ]);

        $id_barang->id_barang = $validasiData['id_barang'];
        $id_barang->nama_barang = $validasiData['nama_barang'];
        $id_barang->foto_barang = $validasiData['foto_barang'];
        $id_barang->deskripsi_barang = $validasiData['deskripsi_barang'];
        $id_barang->stok_barang = $validasiData['stok_barang'];
        $id_barang->harga_barang = $validasiData['harga_barang'];

        $id_barang->save();

        return response()->json([
            'data' => $id_barang
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DatabaseBarang $database_barang)
    {
        //
    }
}
