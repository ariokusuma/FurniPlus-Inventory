<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatabasePengemasan;

class DatabasePengemasanController extends Controller
{
    public function index()
    {
        $pengemasan = DatabasePengemasan::where('status', 'siap dikirim dan diserahkan kepada pihak perngiriman')->get();
        if ($pengemasan){
            return response()->json([
                'message'=>'200 = Ok',
                'response'=>$pengemasan
            ]);
        }
        else{
            return "404 = Not Found";
        }
    }
    public function pengiriman($id_pengemasan)
    {
        $id_pengemasan = DatabasePengemasan::findorfail($id_pengemasan);
        if ($id_pengemasan) 
        {
            return response()->json($id_pengemasan);
        }
    }
}