<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatabaseRefund;
use App\Models\DatabaseRefund2;
use App\Models\DatabaseBarang;
use Faker\Provider\ar_EG\Person;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Auth\Events\Validated;
use Illuminate\Database\Events\DatabaseBusy;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class DatabaseRefundController extends Controller
{
    public function fetch () //fetch refund
    {
        //
        $client = new Client();
        $getdata = $client->request('GET', 'http://furniplus.ecomm.test/api/data_refund');
        $dataJson = json_decode($getdata->getBody()->getContents(), true);
        // dd($dataJson);
        // dd($dataJson);
        $data = $dataJson['response'];
        $order = 0;

        foreach ($data as $item) {
            DatabaseRefund::updateOrCreate([
                'id' => $data[$order]['id']
            ],[
                'id' => $data[$order]['id'],
                'id_barang' => $data[$order]['id_barang'],
                'id_user' => $data[$order]['id_user'],
                'nama_pengguna' => $data[$order]['nama_pengguna'],
                'alamat' => $data[$order]['alamat'],
                'no_hp' => $data[$order]['no_hp'],
                'jumlah_pesanan' => $data[$order]['jumlah_pesanan'],
                'total_harga' => $data[$order]['total_harga'],
                'status' => $data[$order]['status'],
                'resi' => $data[$order]['resi'],
                'alasan_refund' => $data[$order]['alasan_refund'],
            ]);
            $order += 1;
        }
        return response()->json([
            'code' => '200',
            'message' => 'data telah Sukses disimpan',
            'response' => $data // Assuming $pengemasan variable is replaced with $data
        ],200, [], JSON_PRETTY_PRINT);

    }


    public function refundfix()
    {
        try {
            // Copy Data from table pesanan > pengemasan
            $tablePesanan = DatabaseRefund::select('id', 'nama_pengguna', 'alamat', 'no_hp', 'jumlah_pesanan', 'status', 'resi','alasan_refund')->get();
            // dd($tablePesanan);

            // Check if data is available
            if ($tablePesanan->isEmpty()) {
                return response()->json(['message' => 'tidak ada data, tabel Pesanan kosong'], Response::HTTP_NOT_FOUND, [], JSON_PRETTY_PRINT);
            }

            // Insert data into pengemasan table
            foreach ($tablePesanan as $data) {
                DatabaseRefund2::create($data->toArray());
            }

            $tabelHasil = DatabaseRefund2::all();

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

        }
        // finally {
        //     $tabelAkhir = $this->fillNullData(); //panggil fungsi fillNullData

        //     $responseData = [
        //         'updateStatusResult' => $tabelHasil,
        //         'fillNullDataResult' => $tabelAkhir,
        //     ];

        //     return response()->json($responseData, Response::HTTP_OK, [], JSON_PRETTY_PRINT);
        // }


    }

    public function fillNullData() {
        try {
            $pengemasanData = DatabaseRefund2::whereNull('nama_barang')
                    ->whereNull('deskripsi')
                    ->get();

                    // dd  ($pengemasanData);

            if ($pengemasanData->isEmpty()) {
                return response()->json([
                    'code' => '200',
                    'message' => 'Seluruh status data pengemasan telah diupdate',
                    'data' => $pengemasanData,

                ], Response::HTTP_NOT_FOUND, [], JSON_PRETTY_PRINT);
            }

                foreach ($pengemasanData as $data) {
                    $pesanan = DatabaseRefund::find($data->id);
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
            'data' => $data = DatabaseRefund2::all()
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



    public function show()
    {
        $dataRefund = DatabaseRefund::all();
            if ($dataRefund->isEmpty()) {
                return response()->json([
                    'message' => 'No data found'
                ]);
            }

            return response()->json([
                'code' => '200',
                'message' => 'Sukses',
                'data_refund' => $dataRefund
            ], 200, [], JSON_PRETTY_PRINT);
        // return response()->json([
        //     'data_refund' => $dataRefund
        // ]);
        // return response()->json([
        //     'message' => 'Success',
        //     'data_Refund' => $Refund
        // ], 200);
    }

    public function showbyid($id_refund)
    {
        $id_refund = DatabaseRefund::findorfail($id_refund);
        if ($id_refund) {
            return response()->json([
                'code' => '200',
                'message' => 'Sukses',
                'data' => $id_refund
            ], 200, [], JSON_PRETTY_PRINT);
        }
    }
}
