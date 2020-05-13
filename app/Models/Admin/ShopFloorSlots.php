<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ShopFloorSlots extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'slot_name',
     'description',
     'color_code',
     'status'
   ];
}
