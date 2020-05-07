<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'job_order_id',
     'client_id',
     'client_name' ,
     'address' ,
     'email' ,
     'phone' ,
     'notes'
   ];
}
