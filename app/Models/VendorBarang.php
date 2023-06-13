<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorBarang extends Model
{
    use HasFactory;

    protected $table ='vendor_barangs';
    protected $primaryKey = 'id_vendor';
    protected $guarded =[];

}
