@extends('admin.layout.main')

@section('content')
<script type="text/javascript">
  var joID = "{{$joDetails->job_order_id}}";
  var totals = numberWithCommas("{{$joTotals->totals}}") ;
  var joNotes = "{{$joDetails->notes}}";
  var address  = "{{$clientAddress->address_details}}";
  var email  = "{{$clientDetails->email}}";
  var phone = "{{$clientDetails->contact_num}}" ;
  var clientId = "{{$joDetails->client_id}}" ;
  var clientName = "{{$joDetails->client_name}}";
</script>
<link rel="stylesheet" href="{{ asset('admin/css/pages/invoicing.css') }}">
<div class="nv-invoice-content container" id="nv-invoice-new">

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
            {{str_pad( $joDetails->job_order_id , 10, '0', STR_PAD_LEFT)  }}
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
          {{$joDetails->client_name}}
        </div>
      </div>

      <div class="mb-3">
        <div class="nv-label-2 nv-font-bc">
          Address :
          <input v-model="address" type="text" class="form-control">
        </div>
        <div class="nv-label-2 nv-font-bc">
          Email   :
            <input v-model="email" type="text" class="form-control">
        </div>
        <div class="nv-label-2 nv-font-bc">
          Phone   :
          <input v-model="phone" type="text" class="form-control">
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
              {{str_pad( $joDetails->job_order_id , 10, '0', STR_PAD_LEFT)  }}
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
  </div>
  <div class="row">
    <div class="col-lg-6 col-md-12">
      <div class="input-group nv-input-group-custom mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text nv-font-c">
            <i class="fas fa-box-open"></i>&nbsp;&nbsp;SUBTOTAL</span>
        </div>
        <input v-model="subTotal" type="text" class="form-control">
      </div>
      <div class="input-group nv-input-group-custom mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text nv-font-c">
            <i class="fas fa-box-open"></i>&nbsp;&nbsp;OTHERS</span>
        </div>
        <input v-model="notes" type="text" class="form-control">
      </div>
    </div>
    <div class="col-lg-6 col-md-12">
      <div class="input-group nv-input-group-custom mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text nv-font-c">
            <i class="fas fa-box-open"></i>&nbsp;&nbsp;TOTAL</span>
        </div>
        <input v-model="totalAmount" type="text" class="form-control">
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
    <button v-on:click="submitInvoice" type="button"  class="btn btn-md nv-btn-txt-dark nv-font-bc">
      <i class="fas fa-save"></i>&nbsp;SAVE
    </button>
    <div style="display:none;">
      <button type="button"  class="btn btn-md nv-btn-txt-dark nv-font-bc">
        <i class="fas fa-print"></i>&nbsp;PRINT
      </button>
      <br><br>
      <button type="button"  class="btn btn-md nv-btn-txt-dark nv-font-bc">
        <i class="fas fa-save"></i>&nbsp;<i class="fas fa-print"></i>&nbsp;SAVE AND PRINT
      </button>
    </div>
  </div>
</div>
<script src="{{ asset('admin\js\invoice.create.js') }}" ></script>
@endsection
