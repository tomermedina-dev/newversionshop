<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class JobOrderAssignment extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'job_order_id',
     'employee_id',
     'start' ,
     'end' ,
     'status',
     'notes'
   ];
}
