<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\VendorBarang;

class VendorBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */

public function fetch ()
{
    $client = new Client();
    $getdata = $client->request('GET', 'https://my-json-server.typicode.com/ray12090/testing/vendor_barangs');
    $dataJson = json_decode($getdata->getBody()->getContents(), true);

    foreach ($dataJson as $item) {
        $vendorBarang = new VendorBarang();
        $vendorBarang->id_vendor = $item['id_vendor'];
        $vendorBarang->nama_vendor = $item['nama_vendor'];
        $vendorBarang->id_barang = $item['id_barang'];
        $vendorBarang->nama_barang = $item['nama_barang'];
        $vendorBarang->jumlah_barang = $item['jumlah_barang'];
        $vendorBarang->save();
    }

    return response()->json([
        'message' => 'Data vendor berhasil disimpan ke database',
        'message' => $dataJson,
    ], 200, [], JSON_PRETTY_PRINT);
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
    public function show()
    {
        $dataPesanan = VendorBarang::all();

        if ($dataPesanan->isEmpty()) {
            return response()->json([
                'message' => 'No data found'
            ]);
        }

        return response()->json([
            'code' => '200',
            'message' => 'Sukses',
            'data_barang' => $dataPesanan
        ], 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VendorBarang $vendorBarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VendorBarang $vendorBarang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VendorBarang $vendorBarang)
    {
        //
    }
}
