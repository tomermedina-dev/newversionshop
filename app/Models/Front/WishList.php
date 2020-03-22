<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'user_id',
     'product_id'

   ];
}
