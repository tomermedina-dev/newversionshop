<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\User;


use Crypt;
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
          'password' => Crypt::encryptString($request->password),
          'contact_num' => $request-> contact_num,
          'email' => $request->email ,
          'status' => '0'
        ];
        $return = User::create($credentials);
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
}
