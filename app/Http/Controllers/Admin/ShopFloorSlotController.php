<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\ShopFloorSlots;
use DB ;
class ShopFloorSlotController extends Controller
{
    //
    public function getSlotByStatus($status)
    {
      // code...
      if($status == '2'){
          $slot = DB::select("select * from vehicle_slot_available_vw where status ='1'");
      }else {
        // code...
        $slot = DB::select("select * from vehicle_slot_vw where status ='$status'");
      }

      return json_encode($slot);
    }
    public function updateSlot(Request $request)
    {
      // code...
      $update = ShopFloorSlots::where('id' , $request->id)->update([
        'slot_name'=>$request->slot_name , 'description'=>$request->description , 'color_code'=>$request->color_code
      ]);
      return json_encode($update);
    }
}
