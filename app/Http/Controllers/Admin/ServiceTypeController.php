<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\ServiceType;
class ServiceTypeController extends Controller
{
    //
    public function createOrEditServiceType(Request $request)
    {
      // code...
      $return = "";
      if(!isset($request->id)){
        $data =[
          'type_name' => $request->type_name,
          'description' => $request->description,
          'status' => '1'
        ];
        $return = ServiceType::create($data);
      }else {
        // code...
        $data =[
          'type_name' => $request->type_name,
          'description' => $request->description,
        ];
          $return = ServiceType::where('id' ,$request->id)->update($data);
      }
      return $return;
    }
    public function changeServiceTypeStatus($serviceTypeId , $status)
    {
      // code...
      $return =  ServiceType::where('id' ,$serviceTypeId)->update(['status' =>$status]);
      return   $return;
    }
    public function getAllType()
    {
      // code...
      return json_encode(ServiceType::all());
    }
    public function getAllTypeActive()
    {
      // code...
      return json_encode(ServiceType::where('status' , '1')->get());
    }
}
