<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Admin\Promo;
class PromoController extends Controller
{
    //
    public function getNewPromoIndex($productId)
    {
      // code...
      $productDetails = DB::select("select * from product_vw where id ='$productId'")[0];
      return view('admin.pages.promo.new' , compact('productDetails'));
    }
    public function createNewPromo(Request $request)
    {
      // code...
      $data = [
        'product_id' => $request->product_id,
        'percentage' =>  $request->percentage,
        'start_date' => $request->start ,
        'end_date' => $request->end ,
        'description' => $request->description,
      ];
      return json_encode(Promo::create($data));
    }
    public function getPromoList()
    {
      // code...
      return json_encode(DB::select("select * from promos_vw"));
    }
    public function removePromo($promoId)
    {
      // code...
      return json_encode(Promo::where('id' , $promoId)->delete());
    }
}
