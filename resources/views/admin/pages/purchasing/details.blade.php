@extends('admin.layout.main')

@section('content')

<link rel="stylesheet" href="{{ asset('admin/css/pages/job-order.css') }}">
<div class="nv-jo-content" id="nv-po-content">
  <h3 class="nv-header nv-font-bc">
    PO Details
  </h3>
  <div class="row">
    <div class="col-sm-4">

      <div class="input-group nv-input-group-custom mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text nv-font-c">
            <i class="fas fa-box-open"></i>&nbsp;&nbsp;Invoice # </span>
        </div>
        <input disabled type="text" class="form-control"  value="{{$poDetails->invoice_id}}" >
      </div>

      <div class="input-group nv-input-group-custom mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text nv-font-c">
            <i class="fas fa-box-open"></i>&nbsp;&nbsp;Supplier  </span>
        </div>
        <input disabled type="text" class="form-control" value="{{$poDetails->supplier}}">
      </div>

    </div>
    <div class="col-sm-4">
      <div class="input-group nv-input-group-custom mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text nv-font-c">
            <i class="fas fa-box-open"></i>&nbsp;&nbsp;Purchase Date  </span>
        </div>
        <input disabled class="nv-input-custom form-control datepicker" value="{{$poDetails->purchase_date}}" id="purchase_date" type="text" >
      </div>

      <div class="input-group nv-input-group-custom mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text nv-font-c">
            <i class="fas fa-box-open"></i>&nbsp;&nbsp;Total Amount  </span>
        </div>
        <input type="text" class="form-control" value="{{$poDetails->total_amount}}"  disabled>
      </div>

    </div>
    <div class="col-sm-8">
      <div class="input-group nv-input-group-custom mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text nv-font-c">
            <i class="fas fa-box-open"></i>&nbsp;&nbsp;Notes  </span>
        </div>
        <input type="text" class="form-control"  value="{{$poDetails->notes}}" disabled>
      </div>



    </div>
  </div>

  <div class="nv-table-container mb-3">
    <table class="nv-table table table-striped ">
      <thead>
        <tr>
          <td class="nv-font-bc" scope="col">Item</td>
          <td class="nv-font-bc" scope="col">Item Description</td>
          <td class="nv-font-bc" scope="col">Quantity</td>
          <td class="nv-font-bc" scope="col">Unit Price</td>

        </tr>
      </thead>
      <tbody id="labor-list"  >
        @foreach($poItems as $item)
        <tr id="job_0">

          <td class="nv-font-bc" scope="col">
              <input class="w-100"   value="{{$item->item}}" type="text" disabled >
          </td>
          <td class="nv-font-bc" scope="col">
              <input   class="w-100"    value="{{$item->description}}" type="text" disabled >
          </td>
          <td class="nv-font-bc" scope="col">
            <input  value="{{$item->quantity}}"   type="text" name="quantity[]"disabled>
          </td>
          <td class="nv-font-bc" scope="col">
            <input value="{{$item->unit_price}}"    type="text" name="unit_price[]" disabled  >
          </td>

        </tr>
        @endforeach
      </tbody>

    </table>

  </div>



</div>
<script src="{{ asset('admin\js\purchasing.create.js') }}" ></script>
@endsection
