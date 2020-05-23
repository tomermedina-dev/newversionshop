<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    //
  public static function setCaptchaConfig()
  {
    if(env('APP_ENV') == 'live'){
      return '6Ld8PvsUAAAAAKzhfKjyaXlgl5MZODovuVjmVxpR' ;
    }else{
      return '6LdF3JoUAAAAAEPm-cs3kzNgfzSdrg5Cfu4MQVpK' ;
    }
  }
  public static function setEmailSenderConfig()
  {
    // code...
    if(env('APP_ENV') == 'live'){
      return 'newversi@aquarius.zoom.ph' ;
    }else{
      return 'dev.tomer.c.medina@gmail.com' ;
    }
  }
}
