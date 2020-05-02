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
      return $pdf->stream('invoice.pdf');
      // return $pdf->download('invoice.pdf');
    }
    public function generateChecklistPDF()
    {
      // code...
      return view('admin.pdf.checklist');
      $data = ['invoice_number' =>'123456789'];
      $pdf = PDF::loadView('admin.pdf.checklist', ['data'=>$data]);
      return $pdf->download('checklist.pdf');
    }
}
