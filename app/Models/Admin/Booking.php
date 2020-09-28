<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'user_id',
     'service_id' ,
     'first_name',
     'last_name',
     'email',
     'contact' ,
     'address' ,
     'unit_id' ,
     'service_date_orig' ,
     'service_time_orig' ,
     'service_date_new' ,
     'service_time_new' ,
     'notes' ,
     'status' ,
     'reject_reason' ,
     'payment_status'
   ];
}
