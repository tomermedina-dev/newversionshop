<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class BackJobChecklist extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'warranty_id' ,
     'job_order_id_reference' ,
     'new_checklist_id' ,
     'notes' ,
     
   ];
}
