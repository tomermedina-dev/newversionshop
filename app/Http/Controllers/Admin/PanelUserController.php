<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Configuration;
use App\Models\Admin\PanelUser;
use Session;
use App\Models\Admin\UserEmployee;
use Illuminate\Support\Facades\Hash;
class PanelUserController extends Controller
{
    //
    public function validateAccount(Request $request)
    {
      // code.
      $isAdmin = Configuration::where('key' , 'ADMIN_USERNAME')->where('value' ,$request->username )->first();

      if($isAdmin){
        $isAdminPass = Configuration::where('key' , 'ADMIN_PASSWORD')->where('value' ,$request->password )->first();
        if($isAdminPass){
          // Session::put('userId' , str_pad( $userDetails->id, 10, '0', STR_PAD_LEFT));
          session()->forget('role');
          session()->flush();
          Session::put('role' , 'admin');
          Session::put('isAdmin' , 'true');
          return 1;
        }else{
          return "Invalid admin password";
        }
      }else{
        $userDetails = UserEmployee::where('username' , $request->username)->first();

        if($userDetails){
          if (Hash::check($request->password, $userDetails->password)){
              // The passwords match...
              session()->forget('role');
              session()->flush();
              Session::put('userId' , str_pad( $userDetails->id, 10, '0', STR_PAD_LEFT));
              Session::put('role' , 'employee');
              Session::put('isAdmin' , 'false');
              return 1;
          }else{
            return "Invalid password";
          }
        }else{
          return "Username / Account not found.";
        }
      }


    }
}
