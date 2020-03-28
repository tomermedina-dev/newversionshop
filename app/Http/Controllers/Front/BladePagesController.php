<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BladePagesController extends Controller
{
    //
    public function getRegistrationIndex()
    {
      // code...
      if (session()->has('userId')){
        return redirect('/');
      }else{
        return view('front.user.register');
      }

    }

    public function getLoginIndex()
    {
      // code...
      if (session()->has('userId')){
        return redirect('/');
      }else{
        return view('front.user.login');
      }
    }
    public function getHomeIndex()
    {
      // code...
      return view('front.pages.home');
    }
    public function getValidateIndex()
    {
      // code...
        return view('front.user.validation');
    }

    public function getProductBladeIndex()
    {
      // code...
         return view('front.product.products');
    }
    public function getProductDetailsIndex()
    {
      // code...
         return view('front.product.product-details');
    }
}
