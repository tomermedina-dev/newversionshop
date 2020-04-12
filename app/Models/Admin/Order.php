<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'user_id',
     'address',
     'contact' ,
     'email',
     'notes' ,
     'is_shipped'
   ];
}
