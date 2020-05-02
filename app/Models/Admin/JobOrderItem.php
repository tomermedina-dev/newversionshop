<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class JobOrderItem extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'job_id',
     'service_id',
     'service_name' ,
     'service_description' ,
     'product_id' ,
     'product_name' ,
     'product_description' ,
     'quantity' ,
     'unit_price' ,
     'service_fee'
   ];
}
