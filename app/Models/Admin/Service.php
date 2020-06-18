<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'type_id',
     'name',
     'description',
     'price',
     'booking_price',
     'status'
   ];
}
