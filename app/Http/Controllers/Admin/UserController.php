<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\User;

use App\Http\Controllers\Admin\UserAddressController;
use App\Http\Controllers\Admin\UserActivationController;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\UserUnitsController;
use Session;
class UserController extends Controller
{
    //
    public function creteNewOrEditUser(Request $request)
    {
      // code...
      $return = "";
      if(!isset($request->id)){
        $credentials = [
          'first_name' => $request->first_name ,
          'last_name' => $request->last_name ,
          'username' =>  $request->username,
          'password' =>  Hash::make($request->password),
          'contact_num' => $request-> contact,
          'email' => $request->email ,
          'status' => '1'
        ];
        $return = User::create($credentials);
        $userId = str_pad( $return->id, 10, '0', STR_PAD_LEFT) ;
        if(isset($request->carModel)){
          // $unitDetails = [
          //   'user_id' => $userId ,
          //   'car_brand' => $request->carBrand ,
          //   'model' => $request->carModel ,
          //   'vin' =>   $request->carVin ,
          //   'plate_number' => $request->carVin
          // ];
          UserUnitsController::createNewUserUnit($userId , $request->carBrand , $request->carModel  ,$request->carVin , $request->carPlate);
        }

        // UserAddressController::createAddress( $userId, $request->address);
        UserActivationController::generateUserActivation($userId);
        Session::put('userId' , $userId);
        Session::put('role' , 'client');
      }else {
        // code...
        $credentials = [
          'first_name' => $request->first_name ,
          'last_name' => $request->last_name ,
          'username' =>  $request->username,
          'contact_num' => $request->contact_num,
          'email' => $request->email ,
        ];
        $return = User::where('id' ,$request->id )->update($credentials);
      }

       return json_encode($return);
    }

    public function updateUserStatus($id,$status)
    {
      // code...
      $credentials =[
        'status' => $status
      ];
      $return = User::where('id' ,$credentials )->update($credentials);
      return json_encode($return);
    }
    public function validateEmail(Request $request)
    {
      // code.

      $user = User::where('email' , $request->email)->first();
      if($user){
        return 1;
      }else{
        return 0;
      }

    }
    public function forgotPassword(Request $request)
    {
      // code...
      $return = array();
      $userDetails = User::where('email' , $request->email)->first();
      if($userDetails){
        // Send email
        // self::generateUserActivation($userDetails->id);
        $code = EmailController::sendForgotPassword($request->email);
        Session::put('forgotEmail' ,$request->email);
        Session::put('forgotCode' ,$code);
        return Hash::make($code);

      }else{
        return 0;
        $return['error'] = 'Email not found';
      }
      // return $return;
    }
    public function validateUsername(Request $request)
    {
      // code...
      $user = User::where('username' , $request->username)->first();
      if($user){
        return 1;
      }else{
        return 0;
      }
    }
    public function resetPasswordIndex($email , $code)
    {
      // code...
      $status = '';
      $userDetails = User::where('email' ,$email)->first();
      if($userDetails){
        if (Hash::check(Session::get('forgotCode'), $code)){
          $status='valid';
        }else{
          return redirect('/');
        }
      }
      if($status == 'valid'){
        return view('front.user.forgot-password');
      }
    }
    public function resetPassword(Request $request)
    {
      // code...

      if(Session::get('forgotCode') == $request->code){
        $update =  User::where('email' ,Session::get('forgotEmail'))->update(['password'=>Hash::make($request->password)]);
        session()->forget('userId');
        session()->forget('role');
        session()->forget('forgotEmail');
        session()->forget('forgotCode');
        session()->flush();
        return $update;
      }else{
        return '0';
      }
    }
    public function logout()
    {
      // code...
      session()->forget('userId');
      session()->forget('role');
      session()->flush();
      return redirect('/');
    }
}
