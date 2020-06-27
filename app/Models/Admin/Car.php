<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'car_manufacturer',
     'car_model',
     'color',
     'price',
     'description' ,
     'status' ,
     'details'
   ];
}
