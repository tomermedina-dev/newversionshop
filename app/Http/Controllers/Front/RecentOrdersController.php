<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Order ;
use App\Models\Admin\OrderItem ;
use DB;
class RecentOrdersController extends Controller
{
    //
    public function getUserRecentOrdersIndex()
    {
      // code...
      return view('front.user.order.recent-orders');
    }
    public function getUserOrderHistory()
    {
      // code...
      $userId =  session('userId');
      $orderHistory = array();
      $orderData = array();
      $orders = DB::select("select * from orders_vw where user_id = '$userId' order by id desc   ");
      foreach ($orders as $order  ) {
        // code...
        $orderId = str_pad( $order->id, 10, '0', STR_PAD_LEFT) ;
        $orderData['order_id'] = $orderId;
        $orderData['address'] = $order->address;
        $orderData['contact'] = $order->contact;
        $orderData['email'] = $order->email;
        $orderData['notes'] = $order->notes;
        $orderData['delivery_method'] = $order->delivery_method;
        $orderData['is_claimed'] = $order->is_claimed;
        $orderData['is_delivered'] = $order->is_delivered;
        $orderData['order_date'] = $order->created_at;
        $ordersItems = DB::select("select * from order_items_vw where order_id = '$orderId'");
        $orderData['order_items'] = $ordersItems;
        $ordersTotals = DB::select("select * from order_totals_vw where order_id = '$orderId'")[0];
        $orderData['items_count'] = $ordersTotals->items_count;
        $orderData['total_amount'] = $ordersTotals->total_amount;
        array_push($orderHistory,$orderData);
      }
      // return json_encode($orderHistory);
      return view('front.user.order.history' , compact('orderHistory' ));
    }
}
