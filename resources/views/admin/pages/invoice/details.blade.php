@extends('admin.layout.main')

@section('content')
<link rel="stylesheet" href="{{ asset('admin/css/pages/invoicing.css') }}">
<script type="text/javascript">
  var joID = "{{$invoiceDetails->job_order_id}}";
</script>
<div class="nv-invoice-content container" id="nv-invoice-details">

  <div class="row">

    <div class="col-lg-6 col-md-12 d-flex d-sm-flex d-md-flex d-lg-none">
      <div class="">
        <div class="nv-invoice nv-font-bc">
          INVOICE
        </div>

        <div class="d-flex justify-content-between">
          <div class="">
            INVOICE ID
          </div>
          <div class="">
            {{str_pad( $invoiceDetails->job_order_id , 10, '0', STR_PAD_LEFT)  }}
          </div>
        </div>
      </div>

    </div>

    <div class="col-lg-6 col-md-12">
      <div class="nv-label-1 mb-3">
        <div class="nv-font-bc">
          INVOICE TO
        </div>
        <div class="nv-name nv-font-bc">
          {{$invoiceDetails->client_name}}
        </div>
      </div>

      <div class="mb-3">
        <div class="nv-label-2 nv-font-bc">
          Address :  {{$invoiceDetails->address}}
        </div>
        <div class="nv-label-2 nv-font-bc">
          Email   : {{$invoiceDetails->email}}

        </div>
        <div class="nv-label-2 nv-font-bc">
          Phone   : {{$invoiceDetails->phone}}
        </div>
      </div>
    </div>

    <div class="col-lg-6 col-md-6 justify-content-end d-none d-lg-flex d-xl-flex">
      <div class="">
        <div class="nv-invoice nv-font-bc">
          INVOICE
        </div>

        <div class="d-flex justify-content-between">
          <div class="">
            INVOICE ID
          </div>
          <div class="">
              {{str_pad( $invoiceDetails->job_order_id , 10, '0', STR_PAD_LEFT)  }}
          </div>
        </div>
      </div>

    </div>



  </div>

  <div class="nv-table-container mb-3">
    <table class="nv-table table table-striped ">
      <thead>
        <tr>
          <td class="nv-font-bc" scope="col">Labor</td>
          <td class="nv-font-bc" scope="col">Labor Fee</td>
          <td class="nv-font-bc" scope="col">Part</td>
          <td class="nv-font-bc" scope="col">Quantity</td>
          <td class="nv-font-bc" scope="col">Unit Price</td>
        </tr>
      </thead>
      <tbody id="table-jo-history-list">
        <tr v-for="jo in jobOrderList">
          <td class="nv-font-bc" scope="col">@{{jo.service_name}}</td>
          <td class="nv-font-bc" scope="col">₱ @{{jo.service_fee}}</td>
          <td class="nv-font-bc" scope="col">@{{jo.product_name}}</td>
          <td class="nv-font-bc" scope="col">@{{jo.quantity}}</td>
          <td class="nv-font-bc"  scope="col">₱ @{{jo.unit_price}}</td>
        </tr>

      </tbody>
    </table>
    <?php $deduction = 0 ; ?>
    @if($joDetails->client_type == 'Booking')
      <div class="m-2">
        <!-- <p>Booking Fee : {{$joDetails->booking_price}} -->
          @if($joDetails->booking_payment_status == '1')
            <!-- (Paid) -->
            <?php
              $deduction = $joDetails->booking_price;
             ?>
          @else
            <!-- (Unpaid) -->
          @endif
        <!-- </p> -->
      </div>
    @endif
  </div>
  <div class="row">
    <div class="col-lg-6 col-md-12">
      <div class="input-group nv-input-group-custom mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text nv-font-c">
            <i class="fas fa-box-open"></i>&nbsp;&nbsp;SUBTOTAL</span>
        </div>
        <input disabled type="text" class="form-control" value="{{$joTotals->totals - $deduction}}">
      </div>
      <div class="input-group nv-input-group-custom mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text nv-font-c">
            <i class="fas fa-box-open"></i>&nbsp;&nbsp;OTHERS</span>
        </div>
        <input disabled value="{{$invoiceDetails->notes}}" type="text" class="form-control">
      </div>
    </div>
    <div class="col-lg-6 col-md-12">
      <div class="input-group nv-input-group-custom mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text nv-font-c">
            <i class="fas fa-box-open"></i>&nbsp;&nbsp;TOTAL</span>
        </div>
        <input disabled value="{{$joTotals->totals - $deduction}}" type="text" class="form-control">
      </div>
    </div>
  </div>

  <div class="row d-none d-lg-flex">
    <div class="col-lg-6">
    </div>
    <div class="text-danger col-lg-6  d-flex justfy-content-end" style="width:50%;">
        "A FEE OF 500 PESOS STORAGE FEE WILL BE CHARGE TO THE CUSTOMER AFTER A SPAN OF 3 DAYS UPON COMPLETION AND NOTIFICATION TO THE OWNER. AN ADDITIONAL FEE OF 350 PESOS PER DAY AS ON GOING CHARGE FOR UNCLAIMED CARS AFTER ALLOTED TIME"
    </div>
  </div>

  <div class="row d-flex d-sm-flex d-md-flex d-lg-none">
    <div class="text-danger col-12  d-flex justfy-content-end" style="width:50%;">
        "A FEE OF 500 PESOS STORAGE FEE WILL BE CHARGE TO THE CUSTOMER AFTER A SPAN OF 3 DAYS UPON COMPLETION AND NOTIFICATION TO THE OWNER. AN ADDITIONAL FEE OF 350 PESOS PER DAY AS ON GOING CHARGE FOR UNCLAIMED CARS AFTER ALLOTED TIME"
    </div>
  </div>

  <div class="">
    <a href="{{ route('admin.pdf.invoice_details', ['invoiceId' => $invoiceDetails->id]) }}" type="button"  class="btn btn-md nv-btn-txt-dark nv-font-bc">
      <i class="fas fa-print"></i>&nbsp;PRINT
    </a>
    <br><br>

  </div>
</div>
<script src="{{ asset('admin\js\invoice.details.js') }}" ></script>
@endsection
