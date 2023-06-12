<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatabaseBarang;
use Illuminate\Support\Facades\Validator;

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
        try
        {
            $data_barang = DatabaseBarang::create([
                'id_barang' => $request->id_barang,
                'nama_barang' => $request->nama_barang,
                'foto_barang' => $request->foto_barang,
                'deskripsi_barang' => $request->deskripsi_barang,
                'stok_barang' => $request->stok_barang,
                'harga_barang' => $request->harga_barang,
            ]);

            return response()->json([
                'message' => 'Data berhasil ditambahkan',
                'response' => $data_barang
            ], 200);

        } catch (\Illuminate\Database\QueryException $e)
        {
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062)
            {
                $errorMessage = $e->getMessage();
                preg_match("/Duplicate entry '(.*?)'/", $errorMessage, $matches);
                $id_error = $matches[1] ?? 'Unknown column';
                $errorMessage = str_replace("{column_name}", $id_error, $errorMessage);


                return response()->json([
                    'message' => 'Duplicate Entry',
                    'error details' => 'id_barang ' . $id_error .  ' telah terdaftar, mohon gunakan id lain',
                    //  'error' => $e->getMessage()
                ], 500);
            }

            if($errorCode == 1265)
            {
                $errorMessage = $e->getMessage();
                preg_match("/Data truncated for column '(.*?)'/", $errorMessage, $matches);
                $columnName = $matches[1] ?? 'Unknown column';
                $errorMessage = str_replace("{column_name}", $columnName, $errorMessage);

                return response()->json([
                    'message' => 'Error!',
                    'error details' => 'Mohon periksa kembali tipe data pada kolom ' . $columnName
                    // 'error details' => $e->getMessage()
                ], 500);
            }


        }
        return response()->json([
            'message' => 'Bad request',
            'error' => $data_barang->errors()
        ], 400);
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
        $id_barang = DatabaseBarang::findOrFail($id_barang);

        if ($id_barang)
        {
            $validasiData = Validator::make($request->all(),
            [
                'id_barang' => 'integer|required',
                'nama_barang' => 'string',
                'foto_barang' => 'string',
                'deskripsi_barang' => 'string',
                'stok_barang' => 'integer',
                'harga_barang' => 'integer'
            ]);

            if($validasiData->fails())
            {
                return response()->json([
                    'message' => 'Bad request',
                    'error' => $validasiData->errors()
                ], 400);

            } else{
                $id_barang -> update($request->all());
                return response()->json([
                    'message' => '200 = Ok',
                    'response' => $id_barang
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DatabaseBarang $database_barang)
{
    // Check if the data exists
    if (!$database_barang) {
        return response()->json([
            'message' => 'Data not found.'
        ], 404);
    }

    // Get the data before deleting
    $deletedData = $database_barang;

    // Delete the data
    $database_barang->delete();

    return response()->json([
        'code' => '200',
        'message' => 'Data deleted successfully.',
        'data' => $deletedData
    ]);
}

}
