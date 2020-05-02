<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\CheckList;
use App\Models\Admin\JobOrder;
use App\Models\Admin\JobOrderItem;
use App\Models\Admin\Product;
use App\Models\Admin\Service;
use App\Models\Admin\JobOrderAssignment;
use DB ;
class JobOrderController extends Controller
{
    //
    public function getJobOrderIndex($checklistId)
    {
      // code...
      $checklist = CheckList::where('id' , $checklistId)->first();
      return view('admin.pages.job.new' , compact('checklist'));
    }

    public function createJobOrder(Request $request)
    {
      // code...
      $labor = explode(',' , $request->labor);

      $product =  explode(',' ,$request->product);
      $quantity =  explode(',' ,$request->quantity);
      $unit_price = explode(',' , $request->unit_price);
      $amout =  explode(',' ,$request->amount);

      $client_id = $request->client_id;
      $client_name = $request->client_name;
      $checklist_id = $request->checklist_id;
      $notes = $request->notes;
      $jobDetails = [
        'client_id' =>  $client_id,
        'client_name' => $client_name,
        'checklist_id' => $checklist_id,
        'notes' => $notes
      ];
      $jobOrder = JobOrder::create($jobDetails);
      for($x = 0; $x < count($labor); $x++) {

        if($labor[$x] != 0000000000){
          $serviceDetatils = Service::where('id' , $labor[$x])->first();
          $serviceName = $serviceDetatils->name;
          $serviceDescription  = $serviceDetatils->description ;
          $serviceFee = $serviceDetatils->price;
        }else{
          $serviceName = '';
          $serviceDescription = '';
          $serviceFee = '';
        }

        if($product[$x] != 0000000000){
          $productDetails = Product::where('id' , $product[$x])->first();
          $productName = $productDetails->name;
          $productDescription = $productDetails->description;
        }else{
          $productName = '';
          $productDescription = '';
        }

        $jobItem = [
          'job_id' => str_pad( $jobOrder->id , 10, '0', STR_PAD_LEFT)  ,
          'service_id' => $labor[$x],
          'service_name' => $serviceName ,
          'service_description' => $serviceDescription,
          'product_id'  => $product[$x],
          'product_name'  => $productName ,
          'product_description' => $productDescription ,
          'quantity' => $quantity[$x],
          'unit_price' => $unit_price[$x] ,
          'service_fee' => $serviceFee
        ] ;
        JobOrderItem::create($jobItem);
      }
      return json_encode($jobOrder);
    }
    public function getJobOrders($filter)
    {
      // code...
      if($filter == 'all'){
        $jobs = DB::select("SELECT * FROM job_order_vw order by job_order_date DESC");
      }
      if($filter == 'new'){
        $jobs = DB::select("SELECT * FROM job_order_vw where job_order_status = '0' order by job_order_date DESC");
      }
      if($filter == 'unassigned'){
        $jobs = DB::select("SELECT * FROM job_order_vw where job_order_status = '0' and job_monitoring_id is null order by job_order_date DESC");
      }
      return json_encode($jobs);
    }
    public static function getJobOrderItems($id)
    {
      // code...
      $jobItems = JobOrderItem::where('job_id' , $id)->get();
      return json_encode($jobItems);
    }
    public function getJobOrderDetailsIndex($id)
    {
      // code...
      $joDetails = DB::select("SELECT * FROM job_order_vw where job_order_id= '$id'")[0];
      $joTotals = DB::select("SELECT * FROM job_order_totals_vw where job_id= '$id'")[0];
      return view('admin.pages.job.details' , compact('joDetails' , 'joTotals'));
    }
    public function assignJob(Request $request)
    {
      // code...
      $details = [
        'job_order_id' => $request->job_order_id,
        'employee_id' => $request->employee_id,
        'notes' => $request->notes ,
        'status' => '0'
      ];
      $jobAssignment = JobOrderAssignment::create($details);
      return json_encode($jobAssignment);
    }
    public function getAssignedEmployee($joId)
    {
      // code...
      $jobAssignment = JobOrderAssignment::where('job_order_id' ,$joId )->first();
      if($jobAssignment){
        $jobAssignment = DB::select("select * from job_order_assigment_vw where job_order_id = '$joId' ")[0];
      }else {
        $jobAssignment = "";
      }
      return json_encode($jobAssignment);
    }
    public function getJobsinMonitoring()
    {
      // code...
      $jobAssignment = DB::select("select * from job_order_assigment_vw where status = '0' and end is null ");
      return json_encode($jobAssignment);
    }
}