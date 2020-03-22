<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use QrCode;
class QRGeneratorController extends Controller
{
    //
    public function generateQRByValue($valueToGenerate)
    {
      return view ('admin.qr.qr-generator' , compact('valueToGenerate'));
    }
    public function generateQRImage($valueToGenerate)
    {
      QrCode::size(100)
                ->format('png')
                ->generate($valueToGenerate, public_path('uploads/images/qr/'.$valueToGenerate.'png'));

      return view('welcome');
    }
}
