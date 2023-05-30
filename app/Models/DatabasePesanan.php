<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatabasePesanan extends Model
{
    use HasFactory;

    protected $table ='database_pesanan';
    protected $primaryKey = 'id_pesanan';
    protected $guarded =[];
}
