<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class UserActivation extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'user_id',
     'activation_cd',
     'status'
   ];
}
