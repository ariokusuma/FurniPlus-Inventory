<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatabaseBarang extends Model
{
    use HasFactory;

    protected $table ='database_barang';
    protected $primaryKey = 'id_barang';
    protected $guarded =[];

    // public $timestamps = true;
    // protected $dateFormat = 'Y-m-d H:i:s';
    // const CREATED_AT = 'created_at';
    // const UPDATED_AT = 'updated_at';
}
