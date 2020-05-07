<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class JobOrder extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'client_id',
     'client_name',
     'checklist_id' ,
     'notes' ,
     'status' ,
     'is_invoiced' ,
     'is_released' ,
     'is_warranty_expired'
   ];
}
