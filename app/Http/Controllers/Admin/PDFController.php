<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\BookingSchedule;
use App\Models\Admin\CheckList;
use App\Models\Admin\Invoice;
use App\Models\Admin\JobOrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\Hash;
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

    public function generateInvoiceDetails($invoiceId) {
        $invoiceDetails = Invoice::where('id' , $invoiceId)->first();
        $joTotals = DB::select("SELECT * FROM job_order_totals_vw where job_id= '$invoiceDetails->job_order_id'")[0];

        $jobItems = JobOrderItem::where('job_id' , $invoiceDetails->job_order_id)->get();

        return PDF::loadView('admin.pdf.invoice_details', ['invoiceDetails' => $invoiceDetails, 'joTotals' => $joTotals, 'jobItems' => $jobItems])
            ->setPaper('legal', 'portrait')
            ->download('INVOICE DETAILS ' . str_pad( $invoiceId, 10, '0', STR_PAD_LEFT) . '.pdf');
    }
    public function generateCheckListModule($bookingId) {
        // $details  = DB::select("select * from bookings_vw where id = '$bookingId'")[0];
        $details = CheckList::where('id' , $bookingId)->first();
        //return  \GuzzleHttp\json_encode($details);

        return PDF::loadView('admin.pdf.checklist_module', ['details' => $details])
            ->setPaper('legal', 'portrait')
            ->download('VEHICLE CHECK LIST ' . str_pad( $details->id, 10, '0', STR_PAD_LEFT) . '.pdf');
    }

    public function generateJobMonitoring() {
        $jobAssignment = DB::select("select * from job_order_assigment_vw where status = '0' and end is null ");

//        return $jobAssignment;
        return PDF::loadView('admin.pdf.monitoring', ['jobAssignments' => $jobAssignment])
            ->setPaper('legal', 'portrait')
            ->download('JOB MONITORING ' . Carbon::now()->toDateString() . '.pdf');
    }

    public function generateJobHistory() {
        $jobAssignment = DB::select("select * from job_order_assigment_vw ");

//        return $jobAssignment;
        return PDF::loadView('admin.pdf.job_history', ['jobAssignments' => $jobAssignment])
            ->setPaper('legal', 'portrait')
            ->download('JOB ORDERS HISTORY ' . Carbon::now()->toDateString() . '.pdf');
    }

    public function generateBookedServices() {
        $bookingHistory = array();
        $bookingData = array();
        $booking = DB::select("select * from bookings_vw where status = 0 order by created_at desc");
        foreach ($booking as $key=>$value  ) {
            $bookingData['bookingData'] = $value;
            $bookingId = str_pad($value->id, 10, '0', STR_PAD_LEFT);
            $sched = BookingSchedule::where('booking_id' ,$bookingId )->where('is_approve' , '0')->where('is_request' ,'1')->get();
            $bookingData['schedules'] = json_encode($sched) ;
            array_push($bookingHistory,$bookingData);
        }

        //return json_encode($bookingHistory);
        return PDF::loadView('admin.pdf.booking_services', ['bookingHistories' => json_decode(json_encode($bookingHistory))])
            ->setPaper('legal', 'portrait')
            ->download('BOOKED SERVICES ' . Carbon::now()->toDateString() . '.pdf');
    }
    public function generateInvoiceDetailsClient($id ,$invoiceId)
    {
      // code...

      if (Hash::check($id , $invoiceId)){
        $invoiceDetails = Invoice::where('id' , $id)->first();

        $joTotals = DB::select("SELECT * FROM job_order_totals_vw where job_id= '$invoiceDetails->job_order_id'")[0];

        $jobItems = JobOrderItem::where('job_id' , $invoiceDetails->job_order_id)->get();

        return PDF::loadView('admin.pdf.invoice_details', ['invoiceDetails' => $invoiceDetails, 'joTotals' => $joTotals, 'jobItems' => $jobItems])
            ->setPaper('legal', 'portrait')
            ->download('INVOICE DETAILS ' . str_pad( $id, 10, '0', STR_PAD_LEFT) . '.pdf');
      }else{
         return "<h1>Invalid Invoice details</h1>";
      }

    }
}
