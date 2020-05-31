<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;

use Illuminate\Http\Request;
use App\Models\Admin\CheckList;
use DB ;
class CheckListController extends Controller
{
    //
    public function createOrEditCheckList(Request $request)
    {
      // code...
        $data = [
          'client_id' => $request->client_id ,
          'client_name' => $request->client_name ,
          'order_number' => $request->order_number ,
          'contact' => $request->contact ,
          'order_received' => $request->order_received ,
          'order_dt_time' => $request->order_dt_time ,
          'order_dt_promised' => $request->order_dt_promised ,
          'order_actual_dt' => $request->order_actual_dt ,
          'notes' => $request->notes ,
          'type' => $request->type ,
          'odometer_reading' => $request->odometer_reading ,
          'fuel_level' => $request->fuel_level ,
          'make_model' => $request->make_model ,
          'personal_items' => $request->personal_items ,
          'checkbox_items' => $request->checkbox_items ,
        ];
        $return = CheckList::create($data);
        return $return;
    }
    public function getChecklistIndex($bookingId)
    {
      // code...
      $details  = DB::select("select * from bookings_vw where id = '$bookingId'")[0];
      return view('admin.pages.checklist.new' , compact('details'));
    }
    public function getChecklistAll()
    {
      // code...
      $checklist = CheckList::all();
      return json_encode($checklist);
    }
    public function getChecklistDetailsIndex($checklistId)
    {
      // code...
      $details = CheckList::where('id' , $checklistId)->first();
      return view('admin.pages.checklist.details' , compact('details'));
    }

    public function printChecklistDetails($checklistId) {
        $details = CheckList::where('id' , $checklistId)->first();

        return PDF::loadView('admin.pages.checklist.print.details', ['details' => $details])
            ->setPaper('legal', 'portrait')
            ->download('VEHICLE CHECK LIST DETAILS ' . str_pad( $details->id, 10, '0', STR_PAD_LEFT) . '.pdf');
    }
}
