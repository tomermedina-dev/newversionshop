<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB ;
use App\Models\Admin\ServiceWarranty;
class WarrantyController extends Controller
{
    //
    public function getWarrantyListByStatus($status)
    {
      // code...
      if($status == 'active'){
        $warrantList = DB::select("select * from service_warranty_vw where warranty_status = '0' and is_voided = '0'");
      }
      if($status == 'history'){
        $warrantList = DB::select("select * from service_warranty_vw ");
      }
      return json_encode($warrantList);
    }
    public function voidWarranty(Request $request)
    {
      // code...
      $update = ServiceWarranty::where('id' , $request->id)->update(['is_voided' => '1' , 'void_reason' => $request->void_reason]);
      return json_encode($update);
    }
}
