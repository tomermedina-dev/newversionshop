<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Configuration;
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
      return 'info@newversion.co' ;
    }else{
      return 'dev.tomer.c.medina@gmail.com' ;
    }
  }
  public function getDefaultPickup()
  {
    // code...
    $address = Configuration::where('key' , 'DEFAULT_PICKUP_LOCATION')->first();
    return json_encode($address);
  }
  public static function getDomainAddress()
  {
    // code...

    if(env('APP_ENV') == 'live'){
      if(env('DB_ENV') == 'production')){
        return 'http://newversion.co/' ;
      }else{
        return 'http://development.newversion.co/' ;
      }
    }else{
      return 'http://localhost:8000/';
    }
  }
}
