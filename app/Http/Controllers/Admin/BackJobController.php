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
class BackJobController extends Controller
{
    //
    public function getBackJobCheckListIndex($jobOrderId ,$warrantyId)
    {
      // code...
      $jobDetails  =   DB::select("SELECT * FROM job_order_vw where job_order_id = '$jobOrderId'")[0];
      return view('admin.pages.checklist.backjob' , compact('jobOrderId' , 'warrantyId' , 'jobDetails'));
    }
}
