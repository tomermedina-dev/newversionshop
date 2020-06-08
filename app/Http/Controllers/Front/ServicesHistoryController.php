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
    public function getUserServicesPendingIndex()
    {
      // code...
      $userId =  session('userId');
      $servicesDetails = DB::select("select * from pending_bookings_vw where user_id = '$userId' order by created_at desc");
      return view('front.user.services.pending' , compact('servicesDetails'));
    }
    public function getUserServicesRejectedIndex()
    {
      // code...
      $userId =  session('userId');
      $servicesDetails = DB::select("select * from bookings_vw where user_id = '$userId' and status = 'X' order by created_at desc");
      return view('front.user.services.rejected' , compact('servicesDetails'));
    }
    public function getUserServicesCompletedHistoryIndex()
    {
      // code...
        return view('front.user.services.completed' );
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
    public function getUserJobMonitoring()
    {
      // code...
      return view('front.user.services.job.list' );
    }
    public function getUserJobMonitoringList($filter , $userId)
    {
      // code...
      if($filter == 'completed'){
        $jobAssignment = DB::select("select * from job_order_assigment_vw where status = '1'   and client_id ='$userId'");

      }else {
        // code...
        $jobAssignment = DB::select("select * from job_order_assigment_vw where status = '0' and end is null and client_id ='$userId'");
      }

      return json_encode($jobAssignment);
    }
    public function getUserJobMonitoringDetails($jobId)
    {
      // code...
      $joDetails = DB::select("SELECT * FROM job_order_vw where job_order_id= '$jobId'")[0];
      $joTotals = DB::select("SELECT * FROM job_order_totals_vw where job_id= '$jobId'")[0];
      $jobAssignment = DB::select("select * from job_order_assigment_vw where job_order_id = '$jobId' ")[0];
      return view('front.user.services.job.details' , compact('joDetails' , 'joTotals' , 'jobAssignment'));
    }
    public function getWarrantyListByStatus($status , $id)
    {
      // code...
      if($status == 'active'){
        $warrantList = DB::select("select * from service_warranty_vw where warranty_status = '0' and is_voided = '0' and client_id = '$id'");
      }
      if($status == 'history'){
        $warrantList = DB::select("select * from service_warranty_vw where client_id = '$id'");
      }
      return json_encode($warrantList);
    }
    public function getWarrantyIndex()
    {
      // code...
      return view('front.user.services.warranty.list' );
    }
}
