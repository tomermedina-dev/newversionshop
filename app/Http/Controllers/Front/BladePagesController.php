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
      return view('front.user.register');
    }

    public function getLoginIndex()
    {
      // code...
      return view('front.user.login');
    }

    public function getValidateIndex()
    {
      // code...
        return view('front.user.validation');
    }

    public function getProductBladeIndex($pageName)
    {
      // code...
         return view('front.product.'.$pageName);
    }

}
