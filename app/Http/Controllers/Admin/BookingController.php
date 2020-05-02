<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Booking;
use DB;
class BookingController extends Controller
{
    //
    public function createNewBooking(Request $request)
    {
      // code...
      $book_data = [
        'user_id' => $request->user_id ,
        'service_id' => $request->service_id ,
        'first_name' => $request->first_name ,
        'last_name' => $request->last_name ,
        'email' => $request->email ,
        'contact' => $request->contact,
        'address' => $request->address ,
        'unit_id' => $request->unit ,
        'service_date_orig' => $request->date ,
        'service_time_orig' => $request->time ,
        'notes' => $request->notes ,
        'status' => '0' ,
      ] ;
      $booking = Booking::create($book_data);
      return json_encode($booking);
    }
    public function getAllNewBookings()
    {
      // code...
      $booking = DB::select("select * from bookings_vw where status = 0");
      return json_encode($booking);
    }
}
