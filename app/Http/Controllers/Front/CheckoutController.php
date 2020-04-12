<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Order ;
use App\Models\Admin\OrderItem ;
use App\Models\Front\Cart;
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
        'notes' => $request->notes
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
}
