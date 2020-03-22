<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class UserUnit extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'user_id',
     'car_brand',
     'model',
     'vin' ,
     'plate_number' ,
   ];
}
