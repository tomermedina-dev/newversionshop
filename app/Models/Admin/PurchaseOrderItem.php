<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderItem extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'purchase_id',
     'item',
     'description',
     'quantity',
     'unit_price'
   ];
}
