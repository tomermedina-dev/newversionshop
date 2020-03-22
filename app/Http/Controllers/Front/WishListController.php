<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Front\WishList;
class WishListController extends Controller
{
    //
    public function addItemToWishList(Request $request)
    {
      // code...
      $return = "";
      $data =[
        'user_id' => $request->user_id ,
        'product_id' => $request->product_id ,
      ];
      $return = WishList::create($data);
      return $return;
    }
    public function deleteItemWishList($wishListId)
    {
      // code...
      return WishList::where('id' , $wishListId)->delete();
    }
}
