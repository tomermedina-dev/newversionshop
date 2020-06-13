<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'product_id',
     'percentage',
     'start_date' ,
     'end_date' ,
     'description'
   ];
}
