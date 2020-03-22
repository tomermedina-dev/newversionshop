<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\ProductType;
class ProductTypeController extends Controller
{
    //
    public function createOrEditProductType(Request $request)
    {
      // code...
      $return = "";
      if(!isset($request->productTypeId)){
        $data =[
          'type_name' => $request->type_name,
          'description' => $request->description,
          'status' => '1'
        ];
        $return = ProductType::create($data);
      }else {
        // code...
        $data =[
          'type_name' => $request->type_name,
          'description' => $request->description,
        ];
          $return = ProductType::where('id' ,$request->productTypeId)->update($data);
      }
      return $return;
    }
    public function changeProductTypeStatus($productTypeId , $status)
    {
      // code...
      $return =  ProductType::where('id' ,$productTypeId)->update(['status' =>$status]);
      return   $return;
    }
}
