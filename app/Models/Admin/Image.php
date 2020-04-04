<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'type',
     'ref_id' ,
     'image_name'
   ];
}
