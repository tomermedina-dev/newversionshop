<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\User;
use App\Models\Admin\UserAddress;
use App\Models\Admin\UserUnit;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Admin\UserUnitsController;
use App\Models\Admin\Order ;
use App\Models\Admin\OrderItem ;
class ProfileController extends Controller
{
    //
    public function getUserProfileDetails($userId)
    {
      // code...
      $userDetails = User::where('id' , $userId)->select('id' ,'first_name' ,
       'last_name' , 'username' ,'contact_num' ,'email' , 'status')->first();
      return json_encode($userDetails);
    }
    public function getUserAddressDetails($userId)
    {
      // code...
      $userAddress = UserAddress::where('user_id' , $userId)->get();
      return json_encode($userAddress);
    }
    public function getUserUnitDetails($userId)
    {
      // code...
      $userUnits = UserUnit::where('user_id' , $userId)->get();
      return json_encode($userUnits);
    }
    public function updateProfile(Request $request)
    {
      // code...
      if($request->action =="update-personal"){
        $credentials = [
          'first_name' => $request->first_name ,
          'last_name' => $request->last_name ,
          'username' =>  $request->username,
          'contact_num' => $request->contact_num,

        ];
      }
      if($request->action =="update-email"){
        $credentials = [
          'email' => $request->email ,
        ];
      }
      if($request->action =="update-password"){
        $credentials = [
          'password' => Hash::make($request->new_password) ,
        ];
      }
      if($request->action =="update-address"){
        $credentials = [
          'address_details' => $request->address,
          'notes' => $request->notes,
        ];
        $return = UserAddress::where('user_id' ,$request->id )->update($credentials);
        if($return == 0){
          $credentials['user_id'] = $request->id ;
          $return = UserAddress::create($credentials);
        }
        return $return;
      }
      $return = User::where('id' ,$request->id )->update($credentials);
      return $return;
    }
    public function validateUsername(Request $request)
    {
      // code...
      $username = User::where('username' , $request->username)->first();

      if($username){
        return 1;
      }else {
        return 0;
      }

    }
    public function validateOldPassword(Request $request)
    {
      // code...
      $userDetails = User::where('id' , $request->id)->first();
      if (Hash::check($request->old_password, $userDetails->password)){
        return 1;
      }else{
        return 0;
      }
    }
    public function createNewUserUnit(Request $request)
    {
      // code...
      return UserUnitsController::createNewUserUnit($request->user_id , $request->car_brand , $request->model ,$request->vin , $request->plate_number);
    }
    public function deleteUserUnit($unitId)
    {
      // code...
      return UserUnit::where('id' , $unitId)->delete();
    }
    public function getRecentOrdersList($userId)
    {
      // code...
      $orders = Order::where('user_id' , $userId)->where('is_shipped' , 'N');
      return $userId;
    }

}
