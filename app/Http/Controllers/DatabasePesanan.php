<?php

namespace App\Http\Controllers;

use App\Models\DatabasePesanan;
use Illuminate\Http\Request;

class DatabasePesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $database_pesanan = DatabasePesanan::all();
        return response()->json([
            'data_pesanan' => $database_pesanan
        ]);
    }

    public function showbyid($idd_pesanan)
    {
        $id_pesanan = DatabasePesanan::findorfail($id_pesanan);
        if ($id_pesanan) {
            return response()->json($id_pesanan);
        }
    }
}
