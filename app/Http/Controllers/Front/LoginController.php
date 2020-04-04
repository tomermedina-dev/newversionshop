<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin\User;

use Session;

class LoginController extends Controller
{
    //
    public function validateAccount(Request $request)
    {
      // code.
      $userDetails = User::where('username' , $request->username)->first();

      if($userDetails){
        if (Hash::check($request->password, $userDetails->password)){
            // The passwords match...
            Session::put('userId' , str_pad( $userDetails->id, 10, '0', STR_PAD_LEFT));
            Session::put('role' , 'client');
            return 1;
        }else{
          return "Invalid password";
        }
      }else{
        return "Username / Account not found.";
      }
    }

}
