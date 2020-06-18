<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Booking;
use App\Models\Admin\BookingSchedule;
use DB;
use App\Http\Controllers\Front\ServicesHistoryController;

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
        'service_date_new' => $request->date ,
        'service_time_new' => $request->time ,
        'notes' => $request->notes ,
        'status' => '0' ,
      ] ;
      $booking = Booking::create($book_data);
      $schedule = [
        'booking_id' =>str_pad( $booking->id, 10, '0', STR_PAD_LEFT),
        'booking_date' =>$request->date  ,
        'booking_time' =>$request->time  ,
        'reason' => ' ' ,
        'is_approve' => '1'
      ];
      $bookingSchedule = BookingSchedule::create($schedule);
      return json_encode($booking);
    }
    public function getAllBookingsStatus($status)
    {
      // code...
      if($status =='new'){
        $sql= "select * from bookings_vw where status = '0' order by created_at desc";
      }
      if($status =='rejected'){
        $sql = "select * from bookings_vw where status = 'X' order by created_at desc";
      }
      if($status =='new-confirmed'){
        $sql = "select * from bookings_vw where status = '1' or status ='0' order by created_at desc";
      }
      $bookingHistory = array();
      $bookingData = array();
      $booking = DB::select($sql);
      foreach ($booking as $key=>$value  ) {
        $bookingData['bookingData'] = $value;
        $bookingId = str_pad($value->id, 10, '0', STR_PAD_LEFT);
        $sched = BookingSchedule::where('booking_id' ,$bookingId )->where('is_approve' , '0')->where('is_request' ,'1')->get();
        $bookingData['schedules'] = json_encode($sched) ;
        array_push($bookingHistory,$bookingData);
      }

      return json_encode($bookingHistory);
    }
    public function getAllNewBookingsDataOnly()
    {
      // code...
        $booking = DB::select("select * from bookings_vw where status = 0 order by created_at desc");
        return json_encode($booking);
    }
    public function changeDateRequest(Request $request)
    {
      // code...
      $schedule = [
        'booking_id' =>$request->booking_id,
        'booking_date' =>$request->date  ,
        'booking_time' =>$request->time  ,
        'reason' => $request->reason ,
        'is_approve' => '0' ,
        'is_request' => '1'
      ];
      $bookingSchedule = BookingSchedule::create($schedule);
      return json_encode($bookingSchedule);
    }
    public function setRequestChangeDateResponse($schedId , $response)
    {
      // code...
      $update = BookingSchedule::where('id' , $schedId)->update(['is_approve' => $response]);
      if($response == '1'){
        $bookingSched = BookingSchedule::where('id' , $schedId)->first();
        Booking::where('id' , $schedId)->update(['service_date_new' => $bookingSched->booking_date , 'service_time_new' => $bookingSched->booking_time]);
      }
      return $update;
    }
    public function changeBookingStatus(Request $request)
    {
      // code...
      if($request->status == 'X'){
        $serviceDetails = DB::select("select * from bookings_vw where id = '$request->serviceId'")[0];
        $mail = array('client_name'=> $serviceDetails->first_name . ' ' . $serviceDetails->last_name, 'service_code' => $serviceDetails->id , 'email' => $serviceDetails->email , 'contact' =>$serviceDetails->contact, 'address'=> $serviceDetails->address,
         'notes'=> $serviceDetails->notes , 'model'=> $serviceDetails->model , 'date'=> $serviceDetails->service_date_new , 'time'=>  $serviceDetails->service_time_new , 'price' => $serviceDetails->price);
         EmailController::sendRejectedService($mail);
          return Booking::where('id' , $request->serviceId)->update(['status'=> 'X' , 'reject_reason'=>$request->reason]);
      }
      if($request->status == '1'){
        $serviceDetails = DB::select("select * from bookings_vw where id = '$request->serviceId'")[0];
        $mail = array('client_name'=> $serviceDetails->first_name . ' ' . $serviceDetails->last_name, 'service_code' => $serviceDetails->id , 'email' => $serviceDetails->email , 'contact' =>$serviceDetails->contact, 'address'=> $serviceDetails->address,
         'notes'=> $serviceDetails->notes , 'model'=> $serviceDetails->model , 'date'=> $serviceDetails->service_date_new , 'time'=>  $serviceDetails->service_time_new , 'price' => $serviceDetails->price);
          EmailController::sendAcceptedService($mail);
          return Booking::where('id' , $request->serviceId)->update(['status'=> '1']);
      }
    }
}
