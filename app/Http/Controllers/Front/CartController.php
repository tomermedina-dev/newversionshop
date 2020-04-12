<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Front\Cart;
use App\Models\Admin\UserAddress;
class CartController extends Controller
{
    //
    public function addorUpdateItemToCart(Request $request)
    {
      // code...
      $return = "";
      $data =[
        'user_id' => $request->user_id ,
        'product_id' => $request->product_id ,
        'quantity' => $request->quantity ,
      ];
      $return = Cart::create($data);
      return $return;
    }
    public function deleteItemCart($cartId)
    {
      // code...
      return Cart::where('id' , $cartId)->delete();
    }
    public function getCartItems($userId)
    {
      // code...
      $cart = DB::select("select * from cart_items_vw where user_id = $userId");
      return json_encode($cart);
    }
    public function getCartTotals($userId)
    {
      // code...
      $cartTotals = DB::select("select * from cart_totals_vw	 where user_id = $userId");
      if($cartTotals){
        return json_encode($cartTotals[0]);
      }else {
        return 0;
      }
    }
    public  static function getCartCount($userId)
    {
      // code...
      $cartCount = DB::select("select items_count from cart_totals_vw	 where user_id = $userId");
      if($cartCount){
        return ['items_count' => $cartCount[0]->items_count];
      }else {
        return ['items_count' => 0];
      }
    }
    public function updateCartQuantity($cartId,$quantity)
    {
      // code...
      $cartUpdate = Cart::where('id' , $cartId)->update(['quantity' => $quantity]);
      return json_encode($cartUpdate);
    }

}
