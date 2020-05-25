<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class InvoicePayment extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'invoice_id',
     'amount',
     'remarks' ,
     'notes' 
   ];
}
