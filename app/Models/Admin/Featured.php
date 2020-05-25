<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Featured extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'title',
     'description' ,
     'status' ,
     'type'
   ];
}
