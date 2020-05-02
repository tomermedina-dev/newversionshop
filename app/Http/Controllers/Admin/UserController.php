<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\User;

use App\Http\Controllers\Admin\UserAddressController;
use App\Http\Controllers\Admin\UserActivationController;
use Illuminate\Support\Facades\Hash;
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
        UserAddressController::createAddress( $userId, $request->address);
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

        return 1;

      }else{
        return 0;
        $return['error'] = 'Email not found';
      }
      // return $return;
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
