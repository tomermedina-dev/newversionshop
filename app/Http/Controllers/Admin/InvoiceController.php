<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Admin\User;
use App\Http\Controllers\Admin\UserAddressController;
use App\Models\Admin\Invoice;
use App\Models\Admin\JobOrder;
use App\Models\Admin\InvoicePayment;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\ConfigController;
use Illuminate\Support\Facades\Hash;
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

      $id =  str_pad( $invoice->id, 10, '0', STR_PAD_LEFT);
      $hash = Hash::make($id);

      $url = ConfigController::getDomainAddress() . 'pdf/invoice_details/'.$id.'/'.$hash;
      $mail = array('client_name'=>$request->client_name , 'url' => $url , 'email' => $request->email);

      EmailController::sendInvoiceDetails($mail);

      return json_encode($invoice);
    }
    public function getAllInvoiceList()
    {
      // code...
      return json_encode(DB::select("select * from invoices_vw  "));
    }
    public function getInvoiceDetails($invoiceId)
    {
      // code...

      $invoiceDetails = Invoice::where('id' , $invoiceId)->first();
      $joTotals = DB::select("SELECT * FROM job_order_totals_vw where job_id= '$invoiceDetails->job_order_id'")[0];
      $joDetails = DB::select("SELECT * FROM job_order_vw where job_order_id= '$invoiceDetails->job_order_id'")[0];
      return view('admin.pages.invoice.details' , compact( 'invoiceDetails' , 'joTotals' , 'joDetails'));
    }
    public function setPayment(Request $request)
    {
      // code...
      $joTotals = DB::select("SELECT * FROM job_order_totals_vw where job_id= '$request->jobId'")[0];
      $data =[
        'invoice_id' => $request->invoice_id,
        'amount' => $request->remarks == 'full' ? $joTotals->totals : $request->amount,
        'remarks' => $request->remarks ,
        'notes' => $request->notes
      ];

      return json_encode(InvoicePayment::create($data));
    }
}
