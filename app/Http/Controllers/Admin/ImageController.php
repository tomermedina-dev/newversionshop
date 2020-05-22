<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use App\Models\Admin\Image;
class ImageController extends Controller
{
    //
    public function uploadImage(Request $request , $type)
    {
    // code...
      $image = $request->file('file');
      $imageName = $image->getClientOriginalName();
      $image->move(public_path('/uploads/images/'.$type.'/'),$imageName);
      return json_encode($imageName);
    }

    public function deletetImage(Request $request , $type)
    {
      // code...

      if(isset($request->id)){
        $filename =  $request->img;

        $decor_image = Image::where('id' ,$request->id )->where('image_name' ,$filename)->delete();
      }else {
        $filename =  $request->get('filename');
      }

      //ImageUpload::where('filename',$filename)->delete();
      $path=public_path('/uploads/images/'.$type.'/').$filename;
      //  $path=public_path().'/uploads/pro/media'.$filename;
      if(File::exists($path)){
      $file = File::delete($path);
          return json_encode($filename);
      }

    }
    public function getProductImages($productId)
    {
      // code...
      $images = Image::where('type' , 'product')->where('ref_id' ,$productId )->get();
      return json_encode($images);
    }
    public function getCarImages($carId)
    {
      // code...
      $images = Image::where('type' , 'car')->where('ref_id' ,$carId )->get();
      return json_encode($images);
    }
}
