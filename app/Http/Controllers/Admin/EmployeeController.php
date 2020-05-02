<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\UserEmployee;
class EmployeeController extends Controller
{
    //
    public function getEmployeeByStatus($status)
    {
      // code...
      $employees = UserEmployee::where('status' , $status)->get();
      return json_encode($employees);
    }
}
