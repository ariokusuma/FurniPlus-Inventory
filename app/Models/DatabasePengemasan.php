<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatabasePengemasan extends Model
{
    use HasFactory;

    protected $table ='database_pengemasan';
    protected $primaryKey = 'id_pengemasan';
    protected $guarded =[];
}
