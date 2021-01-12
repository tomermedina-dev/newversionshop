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
      if($filter == 'available_release'){
        $select = 'select count(*) as count from job_order_assigment_vw where is_invoiced = 1 and is_released = 0';
      }
      if($filter == 'jo_totals'){
        $select = 'select sum(totals) as count from job_order_totals_vw';
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
      $releaseCars = self::getCounts('available_release');
      $joTotals = self::getCounts('jo_totals');
      if (session('role') == 'employee'){
        return redirect('/admin/page/employee.assigned');
      }
      return view('admin.pages.home.index' , compact('orderDay' , 'bookedDay' , 'inProgress' , 'cars' , 'completed' , 'products' , 'releaseCars' , 'joTotals'));
    }
}
