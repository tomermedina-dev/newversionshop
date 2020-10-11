<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\AdminUsers;
use Illuminate\Support\Facades\Hash;
class AdminUserController extends Controller
{
    //
    public function creteNewOrEditUser(Request $request)
    {
      // code...
      if(!isset($request->id)){
        $credentials = [
          'first_name' => $request->first_name ,
          'last_name' => $request->last_name ,
          'username' =>  $request->username,
          'password' =>  Hash::make($request->password),
          'email' => $request->email ,
          'status' => '1'
        ];
        $return = json_encode(AdminUsers::create($credentials));
      }else {
        // code...
        $credentials = [
          'first_name' => $request->first_name ,
          'last_name' => $request->last_name ,
          'username' =>  $request->username,
          'email' => $request->email ,
        ];
        $return = AdminUsers::where('id' ,$request->id )->update($credentials);
      }

      return $return;
    }

    public function getAdminUserList()
    {
      // code...
      return json_encode(AdminUsers::all());
    }
    public function changeStatus($id , $status)
    {
      // code...
      $return =  AdminUsers::where('id' ,$id)->update(['status' =>$status]);
      return   $return;
    }
}
