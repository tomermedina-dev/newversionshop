<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\ConfigController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Models\Admin\User;
use App\Http\Controllers\Admin\UserActivationController;
class EmailController extends Controller
{
    //
    public static function sendForgotPassword($email)
    {
      // code...

      $mail = $email;
      $code = UserActivationController::generateSMSCode();
      $data = array('code'=>$code);
      $mail = Mail::send('admin.email.mail-forgot-password', $data, function($message) use ($mail)  {
          $message->to($mail, ' ')->subject
             ('New Version Shop | Reset Password Code');
          $message->from(ConfigController::setEmailSenderConfig(),'New Version Shop');
       });
       return $code;
    }
    public function sendValidationCode($email)
    {
      // code...
      $mail = $email;
      $code = UserActivationController::generateSMSCode();
      $data = array('code'=>$code);
      $mail = Mail::send('admin.email.validation', $data, function($message) use ($mail)  {
          $message->to($mail, ' ')->subject
             ('New Version Shop | Validation Code');
          $message->from(ConfigController::setEmailSenderConfig(),'New Version Shop');
       });
       return $code;
    }
    public  static function sendConfirmedOrder($info)
    {
      // code...
      $mail =  $info['email'] ;

      $data = array('client_name'=>$info['client_name'] , 'order_number' => $info['order_number'] , 'email' => $info['email'] , 'contact' => $info['contact'], 'address'=> $info['address'] ,
       'notes'=> $info['notes'] , 'delivery_method'=> $info['delivery_method'] , 'total' => $info['total'] , 'items' => $info['items']);
      $mail = Mail::send('admin.email.confirmed-order', $data, function($message) use ($mail)  {
          $message->to($mail, ' ')->subject
             ('New Version Shop | Order Confirmation');
          $message->from(ConfigController::setEmailSenderConfig(),'New Version Shop');
       });
    }
    public  static function sendConfirmedService($info)
    {
      // code...
      $mail =  $info['email'] ;

      $data = array('client_name'=>$info['client_name'] , 'service_code' => $info['service_code'] , 'email' => $info['email'] , 'contact' => $info['contact'], 'address'=> $info['address'] ,
       'notes'=> $info['notes'] , 'model'=> $info['model'] , 'date'=> $info['date'] , 'time'=> $info['time'] ,
        'price' => $info['price'] , 'service_title' => $info['service_title'], 'description' => $info['description']);
      $mail = Mail::send('admin.email.confirmed-booking', $data, function($message) use ($mail)  {
          $message->to($mail, ' ')->subject
             ('New Version Shop | Booking Confirmation');
          $message->from(ConfigController::setEmailSenderConfig(),'New Version Shop');
       });
    }
    public  static function sendRejectedService($info)
    {
      // code...
      $mail =  $info['email'] ;

      $data = array('client_name'=>$info['client_name'] , 'service_code' => $info['service_code'] , 'email' => $info['email'] , 'contact' => $info['contact'], 'address'=> $info['address'] ,
       'notes'=> $info['notes'] , 'model'=> $info['model'] , 'date'=> $info['date'] , 'time'=> $info['time'] , 'price' => $info['price']);
      $mail = Mail::send('admin.email.rejected-booking', $data, function($message) use ($mail)  {
          $message->to($mail, ' ')->subject
             ('New Version Shop | Booking Rejected');
          $message->from(ConfigController::setEmailSenderConfig(),'New Version Shop');
       });
    }
    public  static function sendAcceptedService($info)
    {
      // code...
      $mail =  $info['email'] ;

      $data = array('client_name'=>$info['client_name'] , 'service_code' => $info['service_code'] , 'email' => $info['email'] , 'contact' => $info['contact'], 'address'=> $info['address'] ,
       'notes'=> $info['notes'] , 'model'=> $info['model'] , 'date'=> $info['date'] , 'time'=> $info['time'] , 'price' => $info['price']);
      $mail = Mail::send('admin.email.accepted-booking', $data, function($message) use ($mail)  {
          $message->to($mail, ' ')->subject
             ('New Version Shop | Booking Confirmed');
          $message->from(ConfigController::setEmailSenderConfig(),'New Version Shop');
       });
    }
    public  static function sendInvoiceDetails($info)
    {
      // code...
      $mail =  $info['email'] ;

      $data = array('client_name'=>$info['client_name'] , 'url' => $info['url']);
      $mail = Mail::send('admin.email.invoice-details', $data, function($message) use ($mail)  {
          $message->to($mail, ' ')->subject
             ('New Version Shop | Invoice Details');
          $message->from(ConfigController::setEmailSenderConfig(),'New Version Shop');
       });
    }
}
