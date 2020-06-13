@extends('admin.layout.main')

@section('content')
<link rel="stylesheet" href="{{ asset('admin/css/pages/promo-and-sales.css') }}">
<script type="text/javascript">
  var productId = "{{$productDetails->id}}";
</script>
<div class="nv-ps-content" id="nv-ps-content">

  <div class="row">
    <div class="col-lg-6 col-md-6">
      <h3 class="nv-header nv-font-bc">
        NEW PROMO
      </h3>

      <div class="text-left  ">
         <h4 >Product ID : {{  str_pad( $productDetails->id, 10, '0', STR_PAD_LEFT) }} </h4>
         <h4 >Product : {{$productDetails->name}} </h4>
         <br>
        <div class="form-group">
          <label class="float-left">Discount (%)</label>
          <input  onkeypress="return isNumber(event)"  v-model="percentage" class="nv-input-custom form-control" id="percentage" type="text" >
        </div>
        <div class="form-group">
          <label>Promo Start Date</label>
          <input    data-date-format="mm/dd/yyyy"  class="nv-input-custom form-control datepicker" id="promo_date_start" type="text" >
        </div>
        <div class="form-group">
          <label>Warranty End Date</label>
          <input   data-date-format="mm/dd/yyyy"   class="nv-input-custom form-control datepicker" id="promo_date_end" type="text" >
        </div>
        <div class="form-group">
          <label class="float-left">Details / Description</label>
          <input    class="nv-input-custom form-control" v-model="description" id="description" type="text" >
        </div>
        <button  v-on:click="savePromo"    type="button" class="float-left btn nv-btn-txt-white nv-font-bc" >
          SAVE PROMO
        </button>

      </div>

    </div>
  </div>

</div>

<script src="{{ asset('admin/js/promo.create.js') }}" ></script>
@endsection
