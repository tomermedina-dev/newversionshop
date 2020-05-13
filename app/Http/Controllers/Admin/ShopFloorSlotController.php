<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\ShopFloorSlots;
class ShopFloorSlotController extends Controller
{
    //
    public function getSlotByStatus($status)
    {
      // code...
      $slot = ShopFloorSlots::where('status' , $status)->get();
      return json_encode($slot);
    }
}
