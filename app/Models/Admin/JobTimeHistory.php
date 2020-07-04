<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class JobTimeHistory extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'employee_id',
     'assignment_id',
     'job_id' ,
     'start' ,
     'end' ,
     'notes' 
   ];
}
