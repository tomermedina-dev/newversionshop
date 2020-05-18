<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Admin\BookingSchedule;
class ServicesHistoryController extends Controller
{
    //
    public function getUserServicesHistory()
    {
      // code...
      $userId =  session('userId');
      $servicesDetails = DB::select("select * from bookings_vw where user_id = '$userId' order by created_at desc");
      return view('front.user.services.history' , compact('servicesDetails'));
    }
    public static function getBookingScheds($bookingId)
    {
      // code...
      $bookingId = str_pad($bookingId, 10, '0', STR_PAD_LEFT);
      return BookingSchedule::where('booking_id' ,$bookingId )->get();
    }
    public static function getRequestBookingScheds($bookingId)
    {
      // code...
      $bookingId = str_pad($bookingId, 10, '0', STR_PAD_LEFT);
      return BookingSchedule::where('booking_id' ,$bookingId)->where('is_request' ,'1')->get();
    }
    public static function getServiceHistory($userId)
    {
      return json_encode(DB::select("select * from bookings_vw where user_id = '$userId'"));
    }
}
