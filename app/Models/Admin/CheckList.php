<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class CheckList extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'client_id',
     'client_name',
     'order_number' ,
     'order_received',
     'order_dt_time' ,
     'order_dt_promised' ,
     'order_actual_dt' ,
     'odometer_reading' ,
     'fuel_level' ,
     'make_model' ,
     'personal_items' ,
     'checkbox_items' ,
     'contact' ,
     'type' ,
     'notes' ,
     'client_type'
   ];
}
