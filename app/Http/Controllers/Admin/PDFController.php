<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\CheckList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function generateChecklistHistoryPDF() {
        $checklists = CheckList::all();
//str_pad( $checklist->id, 10, '0', STR_PAD_LEFT)
        return PDF::loadView('admin.pdf.check_list_history', ['checklists' => $checklists])
            ->setPaper('legal', 'portrait')
            ->download('CHECKLIST HISTORY ' . Carbon::now()->toDateString() . '.pdf');
    }

    public function generateInvoiceHistoryPDF() {
        $invoices = DB::select("select * from invoices_vw");

        return PDF::loadView('admin.pdf.invoices_history', ['invoices' => $invoices])
            ->setPaper('legal', 'portrait')
            ->download('INVOICE HISTORY ' . Carbon::now()->toDateString() . '.pdf');
    }
}
