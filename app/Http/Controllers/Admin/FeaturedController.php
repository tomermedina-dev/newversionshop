<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Featured;
use App\Models\Admin\Image;
use DB;
class FeaturedController extends Controller
{
    //
    public function create(Request $request)
    {
      // code...
      $data = [
        'type' => $request->type ,
        'title' => $request->title ,
        'description' => $request->description
      ];
      $featured = Featured::create($data);
      Image::create(['type'=>'featured' , 'ref_id' => str_pad( $featured->id, 10, '0', STR_PAD_LEFT)  , 'image_name' =>str_replace('"', "", $request->image) ]);

      return json_encode($featured);
    }
    public function getAllFeatured()
    {
      // code...
      return json_encode(DB::select("select * from featured_vw order by created_at desc"));

    }
    public function changeFeaturedStatus($id , $status)
    {
      // code...
      return json_encode(Featured::where('id' , $id)->update(['status'=>$status]));
    }
    public function deleteFeatured($id)
    {
      // code...
      return json_encode(Featured::where('id' , $id)->delete());
    }
    public function getAllFeaturedByType($type)
    {
      // code...
      return json_encode(DB::select("select * from featured_vw where type ='$type' order by created_at desc"));

    }
}
