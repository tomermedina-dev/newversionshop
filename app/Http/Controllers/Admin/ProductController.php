<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Image;
use DB;
class ProductController extends Controller
{
    //
    public function createOrEditProduct(Request $request)
    {
      // code...
      $return = "";
      if(!isset($request->productId)){
        $data = [
          'type_id' =>str_pad( $request->type_id, 10, '0', STR_PAD_LEFT) ,
          'name' => $request->name,
          'brand' =>$request->brand ,
          'car_brand' => $request->car_brand,
          'car_model' => $request->car_model,
          'description' => $request->description,
          'price' => $request->price,
          'quantity' => $request->quantity,
          'status' => '1',
          'target' => $request->target
        ];

        $return = Product::create($data);

        if(isset($request->images)){
          $img_arr = explode(",",$request->images);
          foreach($img_arr as $imgs) {
            $img  =   Image::create(['type'=>'product' , 'ref_id' => str_pad( $return->id, 10, '0', STR_PAD_LEFT)  , 'image_name' =>str_replace('"', "", $imgs) ]);

          }
        }
      }else {
        // code...
        $data = [
          'type_id' => str_pad( $request->type_id, 10, '0', STR_PAD_LEFT),
          'name' => $request->name,
          'brand' =>$request->brand ,
          'car_brand' => $request->car_brand,
          'car_model' => $request->car_model,
          'description' => $request->description,
          'price' => $request->price,
          'quantity' => $request->quantity
        ];
        $return = Product::where('id' ,$request->productId)->update($data);
        if(isset($request->images)){
          $img_arr = explode(",",$request->images);
          foreach($img_arr as $imgs) {
            $img  =   Image::create(['type'=>'product' , 'ref_id' => str_pad( $request->productId, 10, '0', STR_PAD_LEFT)  , 'image_name' =>str_replace('"', "", $imgs) ]);
          }
        }
      }
      return $return;
    }
    public function changeProductStatus($productId , $status)
    {
      // code...
      $return =  Product::where('id' ,$productId)->update(['status' =>$status]);
      return   $return;
    }
    public function getAllProducts()
    {
      // code...
      $products = DB::select("select * from product_vw order by id");
      return json_encode($products);
    }
    public function getAllProductsByTarget($target)
    {
      // code...
      $products = DB::select("select * from product_vw where target ='$target' order by id");
      return json_encode($products);
    }
    public function getAllProductsByStatus($status)
    {
      // code...
      $products = DB::select("select * from product_vw where status = '$status'  order by id");
      return json_encode($products);
    }
    public function getProductByType($category)
    {
      // code...
      if($category =='all'){
        $products = DB::select("select * from product_vw where status = '1'  and type_status = '1' and target = 'online' order by id");
      }else{
        $products = DB::select("select * from product_vw where status = '1' and  product_categ = '$category' order by id");
      }

      return json_encode($products);
    }

    public function getProductBySearch($value)
    {
      // code...

      $products = DB::select("select * from product_vw where status = '1' and name like '%$value%' order by id");
      return json_encode($products);
    }

    public function getPaginatedProducts($start , $end)
    {
      // code...
      $products = DB::select("select * from product_vw order by id limit $start , $end");
      return json_encode($products);
    }
    public function getProductDetails($id)
    {
      // code...
      $products = DB::select("select * from product_vw where id = $id")[0];
      return json_encode($products);
    }

    public function getRelatedProducts($category)
    {
      // code...
      $products = DB::select("select * from product_vw where product_categ = '$category' LIMIT 4");
      return json_encode($products);
    }
}
