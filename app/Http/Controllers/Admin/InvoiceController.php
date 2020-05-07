<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Admin\User;
use App\Http\Controllers\Admin\UserAddressController;
use App\Models\Admin\Invoice;
use App\Models\Admin\JobOrder;
class InvoiceController extends Controller
{
    //
    public function getInvoiceIndex($jobId)
    {
      // code...
      $joDetails = DB::select("SELECT * FROM job_order_vw where job_order_id= '$jobId'")[0];
      $joTotals = DB::select("SELECT * FROM job_order_totals_vw where job_id= '$jobId'")[0];
      $clientDetails = User::where('id' ,$joDetails->client_id )->first();
      $clientAddress = UserAddressController::getDefaultAddress($joDetails->client_id);
      return view('admin.pages.invoice.new' , compact('joDetails' , 'joTotals' , 'clientDetails' , 'clientAddress'));
    }
    public function createInvoice(Request $request)
    {
      // code...
      $invoiceDetails = [
        'job_order_id' => $request->job_order_id,
        'client_id' => $request->client_id ,
        'client_name' => $request->client_name,
        'address' => $request->address,
        'email' => $request->email,
        'phone' => $request->phone,
        'notes' => $request->notes
      ];
      $invoice = Invoice::create($invoiceDetails);
      JobOrder::where('id' , $request->job_order_id)->update([ 'is_invoiced' => '1']);
      return json_encode($invoice);
    }
    public function getAllInvoiceList()
    {
      // code...
      return json_encode(Invoice::all());
    }
    public function getInvoiceDetails($invoiceId)
    {
      // code...
      $invoiceDetails = Invoice::where('id' , $invoiceId)->first();
      $joTotals = DB::select("SELECT * FROM job_order_totals_vw where job_id= '$invoiceDetails->job_order_id'")[0];
      return view('admin.pages.invoice.details' , compact( 'invoiceDetails' , 'joTotals'));
    }
}
