<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class BookingSchedule extends Model
{
    //
    public $timestamps = true;
    protected $fillable = [
     'booking_id',
     'booking_date',
     'booking_time' ,
     'reason' ,
     'is_approve' ,
     'is_request'
   ];
}
