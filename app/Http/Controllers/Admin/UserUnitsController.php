<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\UserUnit;
class UserUnitsController extends Controller
{
    //
      public static function createNewUserUnit($userId , $carBrand , $model ,$vin , $plateNumber)
    {
      // code...
       $credentials = [
         'user_id' => $userId ,
         'car_brand' => $carBrand ,
         'model' => $model ,
         'vin' => $vin ,
         'plate_number' => $plateNumber ,
       ];

       $newUserUnit = UserUnit::create($credentials);

       return json_encode($newUserUnit);
    }
}
