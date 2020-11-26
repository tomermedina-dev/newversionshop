<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Service;
use App\Models\Admin\Image;
use DB ;
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
          'booking_price' => $request->booking_price ,
          'status' =>   '1'
        ];
        $return = Service::create($data);
        $img  =  Image::create(['type'=>'service' , 'ref_id' => str_pad( $return->id, 10, '0', STR_PAD_LEFT)  , 'image_name' =>str_replace('"', "", $request->images) ]);

      }else{
        $data = [
          'type_id' => $request->type_id ,
          'name' => $request->name ,
          'description' => $request->description ,
          'booking_price' => $request->booking_price ,
          'price' => $request->price
        ];
        $return = Service::where('id' , $request->serviceId)->update($data);
        if(isset($request->images)){
          $img  =  Image::create(['type'=>'service' , 'ref_id' => str_pad( $request->serviceId , 10, '0', STR_PAD_LEFT)  , 'image_name' =>str_replace('"', "", $request->images) ]);
        }

      }
      Image::where('image_name' , 'undefined')->delete();
      return $return;
    }

    public function changeServiceStatus($serviceId , $status)
    {
      // code...
      $return =  Service::where('id' ,$serviceId)->update(['status' =>$status]);
      return   $return;
    }
    public function getAllServicesByType($type)
    {
      // code...
      if ($type == 'all'){
          return json_encode(DB::select("select * from services_vw where status = '1' "));
      }else {
        // code...
        return json_encode(DB::select("select * from services_vw where service_categ like '%$type%' and status = '1' "));
      }

    }
    public function getAllServices()
    {
      // code...
      return json_encode(DB::select('select * from services_vw '));
    }
    public function getAllServicesByStatus($status)
    {
      // code...
        return json_encode(DB::select("select * from services_vw where status = '$status' "));
    }
    public function getServiceBySearch($value)
    {
      // code...
      $service = DB::select("select * from services_vw where status = '1' and name like '%$value%' order by id");
      return json_encode($service);
    }

}
