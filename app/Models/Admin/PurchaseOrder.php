<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'invoice_id',
     'supplier',
     'purchase_date',
     'total_amount',
     'notes'
   ];
}
