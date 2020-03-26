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
         return view('admin.pages.'.$pageName);
    }

    public function getAdminHomeIndex()
    {
      // code...
         return view('admin.layout.main');
    }

}
