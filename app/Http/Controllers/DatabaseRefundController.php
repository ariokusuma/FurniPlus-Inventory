<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatabaseRefund;
use GuzzleHttp\Client;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class DatabaseRefundController extends Controller
{
    public function fetch () //fetch refund
    {
        //
        $client = new Client();
        $getdata = $client->request('GET', 'http://127.0.0.1:8001/api/data_refund');
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
        ]);

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
            ]);
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
            return response()->json($id_refund);
        }
    }
}
