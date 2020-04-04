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
    public function getForgotIndex()
    {
      // code...
        return view('front.user.forgot-password');
    }
    public function redirectToProducts()
    {
      // code...
       return redirect('/products/all');
    }
    public function getProductBladeIndex($categ)
    {
      // code...

         return view('front.product.products' , compact('categ'));
    }
    public function getProductDetailsIndex()
    {
      // code...
         return view('front.product.product-details');
    }
	public function getProductCartIndex()
    {
      // code...
         return view('front.product.cart.cart');
    }
    public function getProductCheckoutIndex()
    {
      // code...
         return view('front.product.checkout');
    }

    public function getUserProfileIndex()
    {
      // code...
      return view('front.user.profile');
    }

    public function getUserRecentOrdersIndex()
    {
      // code...
      return view('front.user.recent-orders');
    }

    public function getUserReturnsIndex()
    {
      // code...
      return view('front.user.returns');
    }

    public function getUserCancellationsIndex()
    {
      // code...
      return view('front.user.cancellations');
    }

    public function getMailLayoutForgot()
    {
      // code...
      $name = "Tomer Medina";
      $id = "0000000001";
      return view('admin.email.mail-forgot-password' , compact('name'  ,'id'));
    }
}
