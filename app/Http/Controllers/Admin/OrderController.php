<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Order ;
use App\Models\Admin\OrderItem ;
use DB ;
class OrderController extends Controller
{
    //
    public function getAllOrders()
    {
      // code...
      $orders = DB::select("select * from orders_vw order by id desc");
      return json_encode($orders);
    }
    public function changeOrderStatus(Request $request)
    {
      // code...
      $orderId = $request->order_id;
      $status = $request->status;
      $statusFor = $request->status_for;

      $updateStatus = Order::where('id' , $orderId)->update([$statusFor => $status]);
      return json_encode($updateStatus);

    }
    public function filterOrders($column , $filter)
    {
      // code...
      if($column == 'delivery_method'){
        $query = "select * from orders_vw where delivery_method ='$filter' order by id desc";
      }else{
        if($filter == 'New'){
          $query = 'select * from orders_vw where is_claimed ="N" and is_delivered ="N" order by id desc ';
        }
        if($filter == 'Claimed'){
          $query = 'select * from orders_vw where is_claimed ="Y" order by id desc ';
        }
        if($filter == 'Delivered'){
          $query = 'select * from orders_vw where is_delivered ="Y" order by id desc';
        }
      }

      $orders = DB::select($query);
      return json_encode($orders);
    }
    public function getOrderItems($orderId)
    {
      // code...
      $orders = DB::select("select * from order_items_vw where order_id = '$orderId'");
      return json_encode($orders);
    }
    public function getOrderTotals($orderId)
    {
      // code...
      $orders = DB::select("select * from order_totals_vw where order_id = '$orderId'")[0];
      return json_encode($orders);
    }
}
