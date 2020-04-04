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
      return '6LeucJ0UAAAAABwS_ucAQsf4i2YqEYWhXr4pFVBg' ;
    }else{
      return '6LdF3JoUAAAAAEPm-cs3kzNgfzSdrg5Cfu4MQVpK' ;
    }
  }
  public static function setEmailSenderConfig()
  {
    // code...
    if(env('APP_ENV') == 'live'){
      return 'admin@occasionpros.com' ;
    }else{
      return 'tomercatahanmedina@gmail.com' ;
    }
  }
}
