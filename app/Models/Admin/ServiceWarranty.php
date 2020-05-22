<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ServiceWarranty extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'job_order_id',
     'warranty_start',
     'warranty_end',
     'status' ,
     'is_voided' ,
     'void_reason'
   ];
}
