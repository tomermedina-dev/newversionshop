<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'key',
     'value'
   ];
}
