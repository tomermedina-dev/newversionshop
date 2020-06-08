<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Order ;
use App\Models\Admin\OrderItem ;
use App\Models\Front\Cart;
use App\Http\Controllers\Admin\EmailController;
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
      $total = DB::select("select total_amount from order_totals_vw where order_id = '$orderId'")[0];
      $mail = array('client_name'=>$orderDetails->first_name . ' ' . $orderDetails->last_name , 'order_number' =>  $orderId , 'email' =>  $orderDetails->email , 'contact' =>  $orderDetails->contact, 'address'=> $orderDetails->address ,
       'notes'=>  $orderDetails->notes, 'delivery_method'=>  $orderDetails->delivery_method , 'total' => $total->total_amount);

      EmailController::sendConfirmedOrder($mail);
      return view('front.checkout.confirmed-order' , compact('orderDetails'));
    }
    public function getConfirmedServiceIndex($serviceId)
    {
      // code...
      $serviceDetails = DB::select("select * from bookings_vw where id = '$serviceId'")[0];
      $mail = array('client_name'=> $serviceDetails->first_name . ' ' . $serviceDetails->last_name, 'service_code' => $serviceDetails->id , 'email' => $serviceDetails->email , 'contact' =>$serviceDetails->contact, 'address'=> $serviceDetails->address,
       'notes'=> $serviceDetails->notes , 'model'=> $serviceDetails->model , 'date'=> $serviceDetails->service_date_new , 'time'=>  $serviceDetails->service_time_new , 'price' => $serviceDetails->price);
       EmailController::sendConfirmedService($mail);
      return view('front.checkout.confirmed-service' , compact('serviceDetails'));
    }
}
