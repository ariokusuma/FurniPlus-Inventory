<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatabasePengemasan;

class DatabasePengemasanController extends Controller
{
    public function index()
    {
        $pengemasan = DatabasePengemasan::where('status', 'siap dikirim dan diserahkan kepada pihak perngiriman')->get();
        return $pengemasan;
    }
}
