<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'type_id',
     'name',
     'brand',
     'car_brand',
     'car_model',
     'description',
     'price',
     'quantity' ,
     'status' ,
     'target'
   ];
}
