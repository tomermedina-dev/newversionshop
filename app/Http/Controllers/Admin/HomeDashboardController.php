<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class HomeDashboardController extends Controller
{
    //
    public static function getCounts($filter)
    {
      // code...
      if($filter == 'order-day'){
        $select = 'select count(*) as count from orders where date(now()) = date(created_at)';
      }
      if($filter == 'booked-day'){
        $select = 'select count(*) as count from job_orders where date(now()) = date(created_at)';
      }
      if($filter == 'inprogress'){
        $select = 'select count(*) as count from job_order_assigment_vw where start is not null';
      }
      if($filter == 'cars'){
        $select = 'select count(*) as count from cars where status = 1';
      }
      if($filter == 'completed'){
        $select = 'select count(*) as count from job_orders where status = 1 and is_invoiced = 1 and is_released = 1';
      }
      if($filter == 'products'){
        $select = 'select count(*) as count from products where status = 1';
      }
      $count = DB::select($select)[0];
      return $count;
    }
    public function getHomeIndex()
    {
      // code...
      $orderDay = self::getCounts('order-day');
      $bookedDay = self::getCounts('booked-day');
      $inProgress = self::getCounts('inprogress');
      $cars = self::getCounts('cars');
      $completed = self::getCounts('completed');
      $products = self::getCounts('products');
      if (session('role') == 'employee'){
        return redirect('/admin/page/employee.assigned');
      }
      return view('admin.pages.home.index' , compact('orderDay' , 'bookedDay' , 'inProgress' , 'cars' , 'completed' , 'products'));
    }
}
