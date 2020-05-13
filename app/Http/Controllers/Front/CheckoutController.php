<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Order ;
use App\Models\Admin\OrderItem ;
use App\Models\Front\Cart;
use DB;
class CheckoutController extends Controller
{
    //
    public function createOrders(Request $request)
    {
      // code...
      $data = [
        'user_id' => $request->user_id ,
        'address' => $request->address ,
        'contact' => $request->contact ,
        'email' => $request->email ,
        'notes' => $request->notes ,
        'delivery_method' => $request->delivery_method
      ];

      $order = Order::create($data);
      self::createOrderItems($request->user_id , str_pad(  $order->id, 10, '0', STR_PAD_LEFT));
      return $order ;
    }
    public static function createOrderItems($userId , $orderId)
    {
      // code...
      $cartItems = Cart::where('user_id' , $userId)->get();

      foreach ($cartItems as $items) {
        // code...
        $data = [
          'order_id' => $orderId ,
          'product_id' => $items->product_id ,
          'quantity' => $items->quantity,
          'discount' =>  $items->discount
        ] ;
        OrderItem::create($data);
      }
      $deleteCart = Cart::where('user_id' , $userId)->delete();
    }
    public function getConfirmedOrderIndex($orderId)
    {
      // code...
      $orderDetails = DB::select("select * from orders_vw where id = '$orderId'")[0];
      return view('front.checkout.confirmed-order' , compact('orderDetails'));
    }
    public function getConfirmedServiceIndex($serviceId)
    {
      // code...
      $serviceDetails = DB::select("select * from bookings_vw where id = '$serviceId'")[0];
      return view('front.checkout.confirmed-service' , compact('serviceDetails'));
    }
}
