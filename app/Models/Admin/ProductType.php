<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'type_name',
     'description',
     'status'
   ];
}
