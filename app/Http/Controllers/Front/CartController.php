<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Front\Cart;
class CartController extends Controller
{
    //
    public function addorUpdateItemToCart(Request $request)
    {
      // code...
      $return = "";
      if(!isset($request->cartId)){
        $data =[
          'user_id' => $request->user_id ,
          'product_id' => $request->product_id ,
          'quantity' => $request->quantity ,
        ];
        $return = Cart::create($data);
      }else {
        // code...
        $data =[
          'quantity' => $request->quantity
        ];
        $return = Cart::where('id' , $request->cartId)->update($data);
      }
      return $return;
    }
    public function deleteItemCart($cartId)
    {
      // code...
      return Cart::where('id' , $cartId)->delete();
    }
}
