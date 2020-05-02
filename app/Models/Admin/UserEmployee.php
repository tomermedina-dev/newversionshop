<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class UserEmployee extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'first_name',
     'last_name',
     'username',
     'password' ,
     'contact_num' ,
     'email' ,
     'status' ,
     'address'
   ];
}
