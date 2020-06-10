<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Session;
use App\Http\Controllers\Front\CartController;
use App\Models\Admin\Service;
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
    public function getCarIndex()
    {
      // code...
      return view('front.cars.index');
    }
    public function getAboutIndex()
    {
      // code...
      return view('front.pages.about');
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
    public function getProductDetailsIndex($productId , $productSlug)
    {
      // code...
         return view('front.product.product-details' , compact('productId'));
    }
	 public function getProductCartIndex()
    {
      // code...
      $page = 'cart';
      if (session()->has('userId')){
        $checkOutUrl = Crypt::encryptString(Session::get('userId'));
        return view('front.cart.cart' ,compact('checkOutUrl' ,'page'));
      }else{
        return view('front.cart.cart');
      }

    }


    public function getUserProfileIndex()
    {
      // code...
      if (!session()->has('userId')){
        return redirect('/');
      }else{
        return view('front.user.profile.profile');
      }
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
    public function getCheckoutIndex($id)
    {
      // code...
      $page = 'checkout';
      if(!Session::get('userId')){
        return redirect('/cart');
      }else{
        $cartCount = CartController::getCartCount(Session::get('userId'));
        $cartCount =  $cartCount['items_count'];
        if($cartCount == 0){
          return redirect('/cart');
        }else {
          // code...
          return view('front.checkout.checkout' ,compact('page'));
        }

      }

    }
    public function getWishlistIndex()
    {
      // code...
      return view('front.user.profile.profile-wishlist');
    }
    public function getServicesIndex()
    {
      // code...
      return view('front.services.services');
    }
    public function getBookingFormIndex($id , $slug)
    {
      // code...
      if (!session()->has('userId')){
        return redirect('/');
      }else{
        $serviceDetails = Service::where('id' , $id)->first();
        return view('front.services.booking-form' ,compact('serviceDetails'));
      }
    }
    public function getMailLayoutForgot()
    {
      // code...
      $code = "1234598";
      return view('admin.email.mail-forgot-password' , compact('code'));
    }
    public function getEmailCodeLayout()
    {
      // code...
      $code = "1234598";
      return view('admin.email.validation' , compact('code'));
    }
    public function getConfirmedBookingLayout()
    {
      // code...
      $client_name = "Tomer Medina";
      $service_code = '0000000006';
      $email = 'tomercatahanmedina@gmail.com';
      $contact = '093585894571';
      $address = ' Services Notes' ;
      $notes = 'Services Notes';
      $model = 'Model 1';
      $date = '06/30/2020';
      $time = ' 01:00 PM';
        $price = '1000';
      return view('admin.email.confirmed-booking'  , compact('client_name' , 'service_code' , 'email' , 'contact' , 'address' , 'notes' , 'model' , 'date' , 'time' , 'price'));
    }
    public function getRejectedBookingLayout()
    {
      // code...
      $client_name = "Tomer Medina";
      $service_code = '0000000006';
      $email = 'tomercatahanmedina@gmail.com';
      $contact = '093585894571';
      $address = ' Services Notes' ;
      $notes = 'Services Notes';
      $model = 'Model 1';
      $date = '06/30/2020';
      $time = ' 01:00 PM';
        $price = '1000';
      return view('admin.email.rejected-booking'  , compact('client_name' , 'service_code' , 'email' , 'contact' , 'address' , 'notes' , 'model' , 'date' , 'time' , 'price'));
    }
    public function getConfirmedOrderLayout()
    {
      // code...
      $client_name = "Tomer Medina";
      $order_number = '0000000006';
      $email = 'tomercatahanmedina@gmail.com';
      $contact = '093585894571';
      $address = ' Address' ;
      $notes = 'Services Notes';
      $delivery_method = 'Pick-Up';

      return view('admin.email.confirmed-order'  , compact('client_name' , 'order_number' , 'email' , 'contact' , 'address' , 'delivery_method' ,'notes' ,   ));
    }

}
