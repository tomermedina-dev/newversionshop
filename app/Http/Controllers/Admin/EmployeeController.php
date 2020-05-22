<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\UserEmployee;
use Illuminate\Support\Facades\Hash;
use Session;
class EmployeeController extends Controller
{
    //
    public function getEmployeeByStatus($status)
    {
      // code...
      $employees = UserEmployee::where('status' , $status)->get();
      return json_encode($employees);
    }
    public function getRegisterIndex()
    {
      // code...
      return view('admin.pages.register');
    }
    public function registerEmployee(Request $request)
    {
      // code...
      $credentials = [
        'first_name' => $request->first_name ,
        'last_name' => $request->last_name ,
        'username' =>  $request->username,
        'password' =>  Hash::make($request->password),
        'contact_num' => $request-> contact,
        'address' => $request->address ,
        'email' => $request->email ,
        'status' => '1'
      ];
      $employee = UserEmployee::create($credentials);
      $userId = str_pad( $employee->id, 10, '0', STR_PAD_LEFT) ;
      Session::put('userId' , $userId);
      Session::put('role' , 'employee');
      return json_encode($employee);
    }
}
