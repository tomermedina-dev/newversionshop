<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'type_name',
     'description',
     'status'
   ];
}
