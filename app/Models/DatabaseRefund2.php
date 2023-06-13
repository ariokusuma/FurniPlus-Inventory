<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatabaseRefund2 extends Model
{
    use HasFactory;
    protected $table = 'db_refund_ship';
    protected $primaryKey = 'id_refund';
    protected $guarded =[];
}
