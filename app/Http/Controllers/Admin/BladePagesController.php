<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BladePagesController extends Controller
{
    //
    public function getAdminBladeIndex($pageName)
    {
      // code...
      if (session('role') == 'client' && !session()->has('role')){
        if($pageName != 'login'){
          return redirect('/admin/page/login');
        }else {
          // code...
          return view('admin.pages.'.$pageName);
        }

      }else{
        if( session('role') == 'admin' &&  $pageName == 'login' ){
          return redirect('/admin/home');
        }else{
          return view('admin.pages.'.$pageName);
        }

      }
    }

    public function getAdminHomeIndex()
    {
      // code...
      if (session('role') != 'admin' || !session()->has('role')){
        return redirect('/admin/page/login');
      }else{
         return view('admin.layout.main');
       }
    }

}
