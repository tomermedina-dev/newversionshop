<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'user_id',
     'product_id',
     'quantity' ,
     'notes',
     'date_ordered'
   ];
}
