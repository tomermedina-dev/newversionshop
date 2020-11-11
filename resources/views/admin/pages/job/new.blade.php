@extends('admin.layout.main')

@section('content')

<link rel="stylesheet" href="{{ asset('admin/css/pages/job-order.css') }}">
<script type="text/javascript">
  var client_id = "{{$checklist->client_id}}";
  var client_name = "{{$checklist->client_name}}";
  var checklist_id = "{{$checklist->id}}";
</script>
<div class="nv-jo-content" id="nv-jo-content">

    <h3 class="nv-header nv-font-bc">
      JOB ORDER
    </h3>
    <div class="">
      <h3>Checklist ID : {{str_pad($checklist->id,10,'0',STR_PAD_LEFT)}}</h3>
      <h3>Client Name : {{$checklist->client_name}}</h3>

    </div>
  <div class="nv-table-container mb-3">
    <table class="nv-table table table-striped ">
      <thead>
        <tr>
          <td class="nv-font-bc" scope="col">Labor Description</td>
          <td class="nv-font-bc" scope="col">Parts Description</td>
          <td class="nv-font-bc" scope="col">Quantity</td>
          <td class="nv-font-bc" scope="col">Unit Price</td>
          <td class="nv-font-bc" scope="col">
            Amount
            <br>
            <small style="display:none;">(Service Fee + (Part * Quantity))</small>
          </td>
          <td></td>
        </tr>
      </thead>
      <tbody id="labor-list"  >
        <tr id="job_0">

          <td class="nv-font-bc" scope="col">
            <div class="form-group">
              <select  v-on:change='setAmount()' name="labor[]"   class="custom-select" id="service-list">
                <option value="0*0"> Please select service </option>
                <option  v-for="service in serviceList"  :value="service.id + '*' + service.price " :value="service.id" >@{{service.name}}   (Fee : ₱ @{{numberWithCommas(service.price)}})</option>
              </select>
            </div>
          </td>
          <td class="nv-font-bc" scope="col">
            <div class="form-group">
              <select   v-on:change='setUnitPrice()'  name="product[]" class="custom-select" id="product-list">
                <option value="0*0"> Please select product / part </option>
                <option  v-for="product in productList"   :value="product.id + '*' + product.price ">@{{product.name}}  (Price : ₱ @{{numberWithCommas(product.price)}})</option>
              </select>
            </div>
          </td>
          <td class="nv-font-bc" scope="col">
            <input disabled  onkeyup="return isNumber(event)" v-on:keyup='setAmount()' type="text" name="quantity[]"  value="0" >
          </td>
          <td class="nv-font-bc" scope="col">
            <input disabled  type="text" name="unit_price[]"  value="0"  >
          </td>
          <td class="nv-font-bc" scope="col">
            <input disabled    type="text" name="amount[]" value="0" >
          </td>
          <td></td>
        </tr>

      </tbody>
      <tbody id="labor-list-manual"  >
      </tbody>
    </table>
    <div class="m-1">

      <button v-on:click="newLabor" type="button"  class="btn btn-sm nv-btn-txt-dark">
        <i class="fas fa-plus-circle"></i> NEW LABOR
      </button>
      <button v-on:click="newLabor('manual')" type="button"  class="btn btn-sm nv-btn-txt-dark">
        <i class="fas fa-plus-circle"></i> NEW PART (Manual Input)
      </button>
      <br>
      <button v-on:click="submitJobOrder" type="button"  class="mt-5 btn btn-sm nv-btn-txt-dark nv-font-bc">
        <i class="fas fa-save"></i> SAVE
      </button>
    </div>
  </div>

  <div class="row" style="display:none">
    <div class="col-lg-4">
      <div class="input-group nv-input-group-custom mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text nv-font-c">
            <i class="fas fa-box-open"></i>&nbsp;&nbsp;SUBTOTAL</span>
        </div>
        <input type="text" class="form-control">
      </div>
    </div>
    <div class="col-lg-8">

    </div>
    <div class="col-lg-4">
      <div class="input-group nv-input-group-custom mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text nv-font-c">
            <i class="fas fa-box-open"></i>&nbsp;&nbsp;OTHERS</span>
        </div>
        <input v-model="notes" type="text" class="form-control">
      </div>
    </div>
    <div class="col-lg-4">

    </div>
    <div class="col-lg-4">
      <div class="input-group nv-input-group-custom mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text nv-font-c">
            <i class="fas fa-box-open"></i>&nbsp;&nbsp;TOTAL</span>
        </div>
        <input type="text" class="form-control">
      </div>

    </div>
  </div>

</div>
<script src="{{ asset('admin\js\job.order.create.js') }}" ></script>
@endsection
