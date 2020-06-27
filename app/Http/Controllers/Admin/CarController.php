<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Car;
use App\Models\Admin\Image;
use DB;
class CarController extends Controller
{
    //
    public function createOrEditCar(Request $request)
    {
      $return = "";
      if(!isset($request->carId)){
        $data = [
          'car_manufacturer' => $request->car_manufacturer ,
          'car_model' => $request->car_model,
          'color' => $request->color,
          'price' => $request->price,
          'description' => $request->description,
          'details' => $request->details ,
          'status' => '1',
        ];
        $return = Car::create($data);

        if(isset($request->images)){
          $img_arr = explode(",",$request->images);
          foreach($img_arr as $imgs) {
            $img  =   Image::create(['type'=>'car' , 'ref_id' => str_pad( $return->id, 10, '0', STR_PAD_LEFT)  , 'image_name' =>str_replace('"', "", $imgs) ]);

          }
        }
      }else{
        $data = [
          'car_manufacturer' => $request->car_manufacturer ,
          'car_model' => $request->car_model,
          'color' => $request->color,
          'price' => $request->price,
          'details' => $request->details ,
          'description' => $request->description
        ];

        $return = Car::where('id' ,$request->carId)->update($data);

        if(isset($request->images)){
          $img_arr = explode(",",$request->images);
          foreach($img_arr as $imgs) {
            $img  =   Image::create(['type'=>'car' , 'ref_id' => str_pad( $request->carId, 10, '0', STR_PAD_LEFT)  , 'image_name' =>str_replace('"', "", $imgs) ]);

          }
        }
      }
        return $return;
    }
    public function changeCarStatus($carId , $status)
    {
      // code...
      $return =  Car::where('id' ,$carId)->update(['status' =>$status]);
      return   $return;
    }
    public function getAllCar()
    {
      // code...
      $car = DB::select("select * from car_vw");
      return json_encode($car);
    }
    public function getAllCarsByStatus($status)
    {
      // code...
      $car = DB::select("select * from car_vw where status ='$status' ");
      return json_encode($car);
    }
    function getEditIndex($id) {
      // code...
      $carDetails =  Car::where('id' ,$id)->first();
      $carImages = Image::where('type' , 'car')->where('ref_id' ,$id )->get();
      return view('admin.pages.car.edit' , compact('carDetails' , 'carImages'));
    }
    public function getCarDetailsIndex($id)
    {
      // code...
      $carDetails =  Car::where('id' ,$id)->first();
      $carImages = Image::where('type' , 'car')->where('ref_id' , str_pad( $id, 10, '0', STR_PAD_LEFT) )->get();
      return view('front.cars.details', compact('carDetails' , 'carImages'));
    }
}
