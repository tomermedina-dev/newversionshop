<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
class ProductController extends Controller
{
    //
    public function createOrEditProduct(Request $request)
    {
      // code...
      $return = "";
      if(!isset($request->productId)){
        $data = [
          'type_id' => $request->type_id,
          'name' => $request->name,
          'brand' =>$request->brand ,
          'car_brand' => $request->car_brand,
          'car_model' => $request->car_model,
          'description' => $request->description,
          'price' => $request->price,
          'quantity' => $request->quantity,
          'status' => '1',
        ];
        $return = Product::create($data);
      }else {
        // code...
        $data = [
          'type_id' => $request->type_id,
          'name' => $request->name,
          'brand' =>$request->brand ,
          'car_brand' => $request->car_brand,
          'car_model' => $request->car_model,
          'description' => $request->description,
          'price' => $request->price,
          'quantity' => $request->quantity
        ];
        $return = Product::where('id' ,$request->productId)->update($data);
      }
      return $return;
    }
    public function changeProductStatus($productId , $status)
    {
      // code...
      $return =  Product::where('id' ,$productId)->update(['status' =>$status]);
      return   $return;
    }
}
