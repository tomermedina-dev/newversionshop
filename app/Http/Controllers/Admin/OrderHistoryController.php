<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\OrderHistory;
class OrderHistoryController extends Controller
{
    //
    public function createNewOrderHistory(Request $request)
    {
      // code...
      $data = [
        'user_id' => $request->user_id ,
        'product_id' => $request->product_id ,
        'quantity' => $request->quantity ,
        'notes' => $request->notes ,
        'date_ordered' => $request-> date_ordered
      ];
      $return = OrderHistory::create($data);
      return $return;
    }
    public function getAllOrderHistory()
    {
      // code...
      return OrderHistory::all();
    }
}
