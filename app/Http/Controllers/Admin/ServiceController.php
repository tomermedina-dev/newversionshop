<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Service;
class ServiceController extends Controller
{
    //
    public function createOrEditService(Request $request)
    {
      // code...
      $return = "";
      if(!isset($request->serviceId)){
        $data = [
          'type_id' => $request->type_id ,
          'name' => $request->name ,
          'description' => $request->description ,
          'price' => $request->price ,
          'duration' => $request->duration ,
          'status' =>   '1'
        ];
        $return = Service::create($data);
      }else{
        $data = [
          'type_id' => $request->type_id ,
          'name' => $request->name ,
          'description' => $request->description ,
          'price' => $request->price ,
          'duration' => $request->duration
        ];
        $return = Service::where('id' , $request->serviceId)->update($data);
      }
      return $return;
    }

    public function changeServiceStatus($serviceId , $status)
    {
      // code...
      $return =  Service::where('id' ,$serviceId)->update(['status' =>$status]);
      return   $return;
    }
}
