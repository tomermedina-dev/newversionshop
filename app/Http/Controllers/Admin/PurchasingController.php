<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\PurchaseOrder;
use App\Models\Admin\PurchaseOrderItem;
class PurchasingController extends Controller
{
    //
    public function createNewPO(Request $request)
    {
      // code...

      $item = explode(',' , $request->item);
      $description = explode(',' , $request->description);
      $quantity =  explode(',' ,$request->quantity);
      $unit_price = explode(',' , $request->unit_price);
      $poDetails = [
        'invoice_id' => $request->invoice_id ,
        'total_amount' => $request->total_amount ,
        'supplier' => $request->supplier ,
        'notes' => $request->notes ,
        'purchase_date' => $request->notes ,
      ];
      $po = PurchaseOrder::create($poDetails);
      if($request->item != ''){
        for($x = 0; $x < count($item); $x++) {
          $poItem = [
            'purchase_id' => str_pad( $po->id , 10, '0', STR_PAD_LEFT) ,
            'item' => $item[$x] ,
            'description' => $description[$x] ,
            'quantity' => $quantity[$x]  ,
            'unit_price' => $unit_price[$x]
          ];
          PurchaseOrderItem::create($poItem);
        }
      }

      return json_encode($po);
    }
    public function getPO()
    {
      // code...
      return json_encode(PurchaseOrder::all());
    }
    public function getPODetailsIndex($id)
    {
      // code...
      $poDetails = PurchaseOrder::where('id' ,$id)->first();
      $poItems = PurchaseOrderItem::where('purchase_id' , $id)->get();
      return view('admin.pages.purchasing.details' , compact('poDetails' , 'poItems'));
    }
}
