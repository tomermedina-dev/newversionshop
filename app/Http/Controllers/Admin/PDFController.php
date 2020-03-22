<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
class PDFController extends Controller
{
    //
    public function generateInvoicePDF()
    {
      // code...
      $data = ['invoice_number' =>'123456789'];
      $pdf = PDF::loadView('admin.pdf.invoice', ['data'=>$data]);
      return $pdf->download('invoice.pdf');
    }
}
