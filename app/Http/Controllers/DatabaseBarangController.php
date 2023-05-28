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
    public function update(Request $request, DatabaseBarang $database_barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DatabaseBarang $database_barang)
    {
        //
    }
}
