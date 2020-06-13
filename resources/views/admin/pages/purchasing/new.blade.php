@extends('admin.layout.main')

@section('content')

<link rel="stylesheet" href="{{ asset('admin/css/pages/job-order.css') }}">
<div class="nv-jo-content" id="nv-po-content">
  <h3 class="nv-header nv-font-bc">
    New Purchase
  </h3>
  <div class="row">
    <div class="col-sm-4">

      <div class="input-group nv-input-group-custom mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text nv-font-c">
            <i class="fas fa-box-open"></i>&nbsp;&nbsp;Invoice # </span>
        </div>
        <input type="text" class="form-control" v-model="invoice">
      </div>

      <div class="input-group nv-input-group-custom mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text nv-font-c">
            <i class="fas fa-box-open"></i>&nbsp;&nbsp;Supplier  </span>
        </div>
        <input type="text" class="form-control" v-model="supplier">
      </div>

    </div>
    <div class="col-sm-4">
      <div class="input-group nv-input-group-custom mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text nv-font-c">
            <i class="fas fa-box-open"></i>&nbsp;&nbsp;Purchase Date  </span>
        </div>
        <input data-date-format="MM/DD/YYYY" v-model="purchaseDate" class="nv-input-custom form-control datepicker" id="purchase_date" type="text" >
      </div>

      <div class="input-group nv-input-group-custom mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text nv-font-c">
            <i class="fas fa-box-open"></i>&nbsp;&nbsp;Total Amount  </span>
        </div>
        <input type="text" class="form-control" v-model="totalAmount">
      </div>

    </div>
    <div class="col-sm-8">
      <div class="input-group nv-input-group-custom mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text nv-font-c">
            <i class="fas fa-box-open"></i>&nbsp;&nbsp;Notes  </span>
        </div>
        <input type="text" class="form-control" v-model="notes">
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
          <td></td>
        </tr>
      </thead>
      <tbody id="labor-list"  >
        <tr id="job_0">

          <td class="nv-font-bc" scope="col">
              <input class="w-100"   type="text" name="item[]"   >
          </td>
          <td class="nv-font-bc" scope="col">
              <input   class="w-100"     type="text" name="description[]"    >
          </td>
          <td class="nv-font-bc" scope="col">
            <input    onkeyup="return isNumber(event)"   type="text" name="quantity[]"  value="0" >
          </td>
          <td class="nv-font-bc" scope="col">
            <input    type="text" name="unit_price[]"   >
          </td>

        </tr>

      </tbody>

    </table>
    <div class="m-1">

      <button v-on:click="newLabor" type="button"  class="btn btn-sm nv-btn-txt-dark">
        <i class="fas fa-plus-circle"></i> NEW ITEM
      </button>
      <button v-on:click="submitPO" type="button"  class="btn btn-sm nv-btn-txt-dark nv-font-bc">
        <i class="fas fa-save"></i> SAVE
      </button>
    </div>
  </div>



</div>
<script src="{{ asset('admin\js\purchasing.create.js') }}" ></script>
@endsection
