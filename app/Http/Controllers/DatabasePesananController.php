<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\DatabaseBarang;
use App\Models\DatabasePesanan;
use App\Models\DatabasePengemasan;
use Illuminate\Support\Facades\Http;
use Illuminate\Auth\Events\Validated;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class DatabasePesananController extends Controller
{
    public function fetch () // /pesanan
    {
        //
        $client = new Client();
        $getdata = $client->request('GET', 'http://furniplus.ecomm.test/api/data_pesanan');
        $dataJson = json_decode($getdata->getBody()->getContents(), true);
        // dd($dataJson);
        // dd($dataJson);
        $data = $dataJson['response'];
        $order = 0;

        foreach ($data as $item) {
            DatabasePesanan::updateOrCreate([
                'id_pesanan' => $data[$order]['id']
            ],[
                'id_pesanan' => $data[$order]['id'],
                'id_barang' => $data[$order]['id_barang'],
                'id_user' => $data[$order]['id_user'],
                'nama_pengguna' => $data[$order]['nama_pengguna'],
                'alamat' => $data[$order]['alamat'],
                'no_hp' => $data[$order]['no_hp'],
                'jumlah_pesanan' => $data[$order]['jumlah_pesanan'],
                'total_harga' => $data[$order]['total_harga'],
                'status' => $data[$order]['status'],
                'resi' => $data[$order]['resi'],
            ]);
            $order += 1;
        }

        return response()->json([
            'code' => '200',
            'message' => 'data telah Sukses disimpan',
            'response' => $data // Assuming $pengemasan variable is replaced with $data
        ]);

    }

    public function updateStatus()
    {
        try {
            // Copy Data from table pesanan > pengemasan
            $tablePesanan = DatabasePesanan::select('id_pesanan', 'nama_pengguna', 'alamat', 'no_hp', 'jumlah_pesanan', 'status', 'resi')->get();

            // Check if data is available
            if ($tablePesanan->isEmpty()) {
                return response()->json(['message' => 'tidak ada data, tabel Pesanan kosong'], Response::HTTP_NOT_FOUND, [], JSON_PRETTY_PRINT);
            }

            // Insert data into pengemasan table
            foreach ($tablePesanan as $data) {
                DatabasePengemasan::create($data->toArray());
            }

            $tabelHasil = DatabasePengemasan::all();

            return response()->json([
                'code' => 200,
                'message' => 'Data copied successfully',
                'data' => $tabelHasil

            ], Response::HTTP_OK, [], JSON_PRETTY_PRINT);

        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Database error',
                'error' => $e->getMessage(),

                ], Response::HTTP_INTERNAL_SERVER_ERROR, [], JSON_PRETTY_PRINT);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Server error'], Response::HTTP_INTERNAL_SERVER_ERROR, [], JSON_PRETTY_PRINT);

        } finally {
            $tabelAkhir = $this->fillNullData(); //panggil fungsi fillNullData
            $responseData = [
                'updateStatusResult' => $tabelHasil,
                'fillNullDataResult' => $tabelAkhir,
            ];

            return response()->json($responseData, Response::HTTP_OK, [], JSON_PRETTY_PRINT);
        }


    }

    public function fillNullData() {
        try {
            $pengemasanData = DatabasePengemasan::whereNull('nama_barang')
                    ->whereNull('deskripsi')
                    ->get();
            // dd($pengemasanData);

            if ($pengemasanData->isEmpty()) {
                return response()->json([
                    'code' => '200',
                    'message' => 'Seluruh status data pengemasan telah diupdate',
                    'data' => $pengemasanData,

                ], Response::HTTP_NOT_FOUND, [], JSON_PRETTY_PRINT);
            }

                foreach ($pengemasanData as $data) {
                    $pesanan = DatabasePesanan::find($data->id_pesanan);
                    // dd($pesanan);
                    $barang = DatabaseBarang::find($pesanan->id_barang);

                    if ($pesanan && $barang) {
                        $data->status = 'paket diserahkan ke pengiriman';
                        $data->nama_barang = $barang->nama_barang;
                        $data->deskripsi = $barang->deskripsi_barang;
                        $data->save();
                    }
                }

        return response()->json([
            'code' => 200,
            'message' => 'Data updated successfully',
            'data' => $data = DatabasePengemasan::all()
        ], Response::HTTP_OK, [], JSON_PRETTY_PRINT);

        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Database error',
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR, [], JSON_PRETTY_PRINT);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Server error'], Response::HTTP_INTERNAL_SERVER_ERROR, [], JSON_PRETTY_PRINT);
        }
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
    // public function show(DatabasePesanan $pesanan)
    public function show()
    {
        $dataPesanan = DatabasePesanan::all();

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

    public function showbyid($id_barang)
    {
        $id_barang = DatabasePesanan::findorfail($id_barang);
        if ($id_barang) {
            return response()->json([
                'code' => '200',
                'message' => 'Sukses',
                'data_barang' => $id_barang
            ], 200, [], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_pesanan)
    {
        $pesanan = DatabasePesanan::findOrFail($id_pesanan);
        if ($pesanan){

            $validator = Validator::make($request->only(['id_barang', 'id_user', 'status']), [
                'id_barang'=>'integer|required',
                'id_user'=>'integer|required',
                'status'=>'string|required'
            ]);
            if ($validator->fails()){
                return response()->json([
                    'message' => '400 = Bad Request',
                    'error' => $validator->errors()
                ], 400);
                // return '400 = Bad Request';
            }
            else{
                $pesanan -> update($request->only(['status']));
                return response()->json([
                    'message'=>'200 = Ok',
                    'response'=> $pesanan->only(['id_barang', 'id_user', 'status'])
                ]);
            }

        } else {
            return "404 = Not Found";
        }

    }

    public function kirimbarang() {
        $dataPesanan = DatabasePengemasan::all();
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

}


