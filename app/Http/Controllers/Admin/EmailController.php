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
}
