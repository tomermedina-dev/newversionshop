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
use App\Models\Admin\ServiceWarranty;
use DB ;
use App\Models\Admin\JobEvaluation;
use App\Models\Admin\ShopFloorSlots;
use App\Models\Admin\JobTimeHistory;
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
        $jobs = DB::select("SELECT * FROM job_order_vw where job_order_status = '0' and (job_monitoring_id is NULL or job_monitoring_id = '') order by job_order_date DESC");
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
        'slot_id' => $request->slot_id,
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
    public function getAssignmentList($filter)
    {
      // code...
      if($filter == 'monitoring'){
        $jobAssignment = DB::select("select * from job_order_assigment_vw where status = '0' and end is null ");
      }
      if($filter == 'completed'){
        $jobAssignment = DB::select("select * from job_order_assigment_vw where end is not null and is_approved = '0' and is_invoiced = '0' and status = '0' ");
      }
      if($filter == 'history'){
        $jobAssignment = DB::select("select * from job_order_assigment_vw ");
      }
      if($filter == 'release'){
        $jobAssignment = DB::select("select * from job_order_assigment_vw where is_invoiced = '1' and is_released != '1' ");
      }
      return json_encode($jobAssignment);
    }
    public function getEmployeeAssignedJobs($filter , $id)
    {
      // code...
      if($filter == 'monitoring'){
          $jobAssignment = DB::select("select * from job_order_assigment_vw where status = '0' and end is null and employee_id = '$id' ");
      }
      if($filter == 'history'){
          $jobAssignment = DB::select("select * from job_order_assigment_vw where end is not null and  employee_id = '$id' ");
      }

      return json_encode($jobAssignment);
    }
    public function evaluateJob(Request $request)
    {
      // code...
      $details = [
        'job_order_id' => $request->job_order_id,
        'evaluation_notes' => $request->evaluation_notes ,
        'employee_id' => $request->employee_id
      ];
      $evaluate = JobEvaluation::create($details);
      JobOrder::where('id' , $request->job_order_id)->update(['status' =>'1' , 'is_released' => '1']);
      JobOrderAssignment::where('job_order_id'  , $request->job_order_id)->update(['status' => '1' , 'is_approved' => '1' ]);
      $warranty=[
          'job_order_id' => $request->job_order_id,
          'warranty_start' => $request->warranty_start,
          'warranty_end' => $request->warranty_end,
          'status' => '0'
      ];
      ServiceWarranty::create($warranty);
      return json_encode($evaluate);
    }
    public function getJobWarranty($joID)
    {
      // code...
      $warranty = ServiceWarranty::where("job_order_id" , $joID)->first();
      return json_encode($warranty);
    }
    public function scanJob($action , $assignmentId , $jobId , $employeeId)
    {
      // code...
      $current_time = \Carbon\Carbon::now();
      if($action == 'start') {
        $start =  json_encode(JobOrderAssignment::where('id' ,$assignmentId)->where('job_order_id' , $jobId)->where('employee_id' ,$employeeId )->update(['start' => $current_time]));
        return "Job has been started";
      }else {
        $end =  json_encode(JobOrderAssignment::where('id' ,$assignmentId)->where('job_order_id' , $jobId)->where('employee_id' ,$employeeId )->update(['end' => $current_time]));
        return "Job has been ended.";
      }
    }
    public function postScanJob(Request $request)
    {
      // code...
      $current_time = \Carbon\Carbon::now();
      if($request->action == 'start') {
        return json_encode(JobOrderAssignment::where('id' ,$request->assignmentId)->where('job_order_id' , $request->jobId)->where('employee_id' ,$request->employeeId )->update(['start' => $current_time]));
      }else {
        return json_encode(JobOrderAssignment::where('id' ,$request->assignmentId)->where('job_order_id' , $request->jobId)->where('employee_id' ,$request->employeeId )->update(['end' => $current_time]));
      }
    }
    public function setNewSlot(Request $request)
    {
      // code...
      return json_encode(JobOrderAssignment::where('job_order_id', $request->job_order_id)->update(['slot_id' => $request->slot_id]));
    }
    public function createUpdateJobTimeHistory(Request $request)
    {
      // code...
      $current_time = \Carbon\Carbon::now();
      if(isset($request->id)){
          $return = JobTimeHistory::where('id'  , $request->id )->update(['end' =>$current_time ]);
      }else {
        // code...
        $history = [
          'employee_id' => $request->employee_id ,
          'assignment_id' => $request->assignment_id ,
          'job_id' => $request->job_id ,
          'start' =>  $current_time
        ];
        $return = JobTimeHistory::create($history);
      }
      return json_encode($return);

    }
    public function getCurrentDateTimeHistory($employee_id , $assignment_id , $job_id)
    {
      // code...
      $sql = "select id FROM job_time_histories where DATE(START) = DATE(NOW()) and employee_id = '$employee_id' and assignment_id = '$assignment_id' and job_id ='$job_id'  ";
      $sqlOutChecker = "select id FROM job_time_histories where DATE(START) = DATE(NOW()) and DATE(end) = DATE(NOW()) and employee_id = '$employee_id' and assignment_id = '$assignment_id' and job_id ='$job_id'  ";
      if(json_encode(DB::select($sqlOutChecker)) != '[]'){
        return  'X';
      }
      $result =   DB::select($sql);
      if(json_encode($result) != '[]'){
        return  str_pad( $result[0]->id , 10, '0', STR_PAD_LEFT );
      }else {
        return '0';
      }
    }
    public function getAllTimeHistoryIndex($employee_id , $assignment_id , $job_id)
    {
      // code...
      $joDetails = DB::select("SELECT * FROM job_order_vw where job_order_id= '$job_id'")[0];
      $sql = "select * FROM job_time_histories_vw where  employee_id = '$employee_id' and assignment_id = '$assignment_id' and job_id ='$job_id'  ";
      $history = DB::select($sql);

      $sqlHrs = "select sum(total_work_hrs) as total_hrs FROM job_time_histories_vw where  employee_id = '$employee_id' and assignment_id = '$assignment_id' and job_id ='$job_id'  ";
      $totalHrs = DB::select($sqlHrs)[0];
      $jobAssignment = JobOrderAssignment::where('job_order_id' ,$job_id )->first();
      if($jobAssignment){
        $jobAssignment = DB::select("select * from job_order_assigment_vw where job_order_id = '$job_id' ")[0];
      }else {
        $jobAssignment = "";
      }

      return view('admin.pages.job.time-history' , compact('history' , 'joDetails' , 'jobAssignment' , 'totalHrs'));
    }

    public function getTimeOptionsIndex($employee_id , $assignment_id , $job_id)
    {
      // code...
      $joDetails = DB::select("SELECT * FROM job_order_vw where job_order_id= '$job_id'")[0];
      $joTotals = DB::select("SELECT * FROM job_order_totals_vw where job_id= '$job_id'")[0];
      return view('admin.pages.job.time-options' , compact('joDetails' , 'joTotals'));
    }
}
