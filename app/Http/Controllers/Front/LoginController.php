<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function getLoginIndex()
    {
      // code...
      return view('front.user.login');
    }
}
