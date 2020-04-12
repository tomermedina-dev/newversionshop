<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'order_id',
     'product_id',
     'quantity' ,
     'discount',
   ];
}
