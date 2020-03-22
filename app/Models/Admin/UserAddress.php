<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'user_id',
     'address_details',
     'notes',
     'primary_flag' ,
   ];
}
