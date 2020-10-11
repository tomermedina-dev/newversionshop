<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminUsers extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'first_name' ,
     'last_name' ,
     'username' ,
     'password' ,
     'email' ,
     'status' ,
   ];
}
