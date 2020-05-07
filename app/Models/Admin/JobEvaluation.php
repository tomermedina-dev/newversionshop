<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class JobEvaluation extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'job_order_id',
     'employee_id',
     'evaluation_notes'
   ];
}
