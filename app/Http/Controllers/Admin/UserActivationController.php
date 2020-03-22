<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Admin\UserActivation;
class UserActivationController extends Controller
{
    //
    public function generateUserActivation($userId)
    {
      // code...
      $return = "";
      $userExist = UserActivation::where('user_id' , $userId)->first();
      $code = self::generateSMSCode();
      if($userExist){
        $credentials = [
          'activation_cd' => $code
        ];
         $return = UserActivation::where('user_id' , $userId)->update($credentials);
      }else{
        $credentials =
          ['user_id' => $userId ,
          'activation_cd' => $code ,
           'status' => '0'];
        $return = UserActivation::create($credentials);
      }


      return $return;
    }

    public static function generateSMSCode()
    {
      // code...
      $breaker = 0 ;
      $code = "";
      return mt_rand(100000 , 999999);
      while(0 == $breaker){
          $rdm_number = mt_rand(100000 , 999999);
          $codes = UserActivation::where('activation_cd' ,  Hash::make($rdm_number) );
          if($code){
            $breaker = 0;
          }else{
            $breaker = 1;
            $code = $rdm_number;
          }
      }
      return $code;
    }
    public function validateActivationCode($userId , $activationCode)
    {
      // code...
      $codes = UserActivation::where('user_id' ,$userId)->where('activation_cd' , $activationCode)->first();
      $return = "";
      if($codes){
        $return = 1 ;
      }else {
        $return = 0;
      }
      return $return;
    }
}
