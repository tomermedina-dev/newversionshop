@extends('front.layout.main')

@section('content')
<div class="container">
<link rel="stylesheet" href="{{ asset('front/css/pages/checkout.css') }}">
<title>New Version Shop - Check out</title>
<script type="text/javascript">
  var page = "{{$page}}";
</script>
<div class="nv-checkout-content nv-cart-content">
  <div class="row">
    <div class="nv-checkout-details col-lg-8">

      <div class=" nv-checkout-actions nv-default-box-shadow d-flex justify-content-between align-items-center">
        <div class="">
          @{{cartTotals.items_count}} ITEM(S)
        </div>
      </div>
      <ul class="nv-checkout-products list-group nv-default-box-shadow">
        <li class="list-group-item nv-checkout-items nv-font-bc">IN-CHECKOUT PRODUCTS</li>
        @include('front.checkout.checkout-list')
      </ul>
    </div>


    <div class="col-lg-4">
      <div class="card nv-summary-group nv-default-box-shadow">
        <div class="card-header">
          <div class="nv-summary-header nv-font-bc">
            SHIPPING DETAILS
          </div>
          <!-- <div class="">
            LOCATION
          </div> -->
          <div class="nv-billing-list form-group">
            <!-- <label for="address">Address</label> -->
            <div class="input-group-prepend">
              <span class=" nv-input-icon-plain-checkout" style="padding-right:14px;"><i class="fas fa-map-marker-alt"></i></span>
              <input v-model="shippingAddress"  type="text" class="form-control nv-input-custom-checkout" id="address" placeholder="Enter your address">
            </div>
          </div>

          <div class="nv-billing-list form-group">
            <!-- <label for="contact">Address</label> -->
            <div class="input-group-prepend">
              <span class=" nv-input-icon-plain-checkout"   ><i class="fas fa-phone-alt"></i></span>
              <input  v-model="shippingContact" type="text" class="form-control nv-input-custom-checkout" id="contact" placeholder="Enter your contact number">
            </div>
          </div>

          <div class="nv-billing-list form-group">
            <!-- <label for="email">Email Address</label> -->
            <div class="input-group-prepend">
              <span class=" nv-input-icon-plain-checkout"   ><i class="fas fa-envelope"></i></span>
              <input  v-model="shippingEmail" type="text" class="form-control nv-input-custom-checkout" id="email" placeholder="Enter your email address">
            </div>
          </div>
          <div class="nv-billing-list form-group">
            <label for="address">Note / Other details</label>
            <div class="input-group-prepend">
              <span class=" nv-input-icon-plain-checkout"   ><i class="fas fa-clipboard"></i></span>
              <input v-model="shippingNotes"   type="text" class="form-control nv-input-custom-checkout" id="notes" placeholder="Enter notes or other details">
            </div>
          </div>



        </div>
        <div class="card-body">
          <div class="nv-summary-header nv-font-bc">
            ORDER SUMMARY
          </div>
          <div class="nv-summary-list d-flex justify-content-between align-items-center">
            <div v-cloak  class="nv-key">Sub Total (@{{cartTotals == 0 ? 0 : cartTotals.items_count}} Items)</div>
            <div v-cloak  class="nv-value">₱ @{{cartTotals == 0 ? 0 : numberWithCommas(cartTotals.total_amount)}}</div>
          </div>

          <div class="nv-summary-list d-flex justify-content-between align-items-center">
            <div class="nv-total-key nv-font-bc">Total</div>
            <div class="">
              <div class="nv-total-value nv-font-bc">₱ @{{cartTotals == 0 ? 0 : numberWithCommas(cartTotals.total_amount)}}</div>
              <div class="nv-vat">VAT Included, where applicable</div>
            </div>
          </div>
          <button v-on:click="sumbitCheckout" class="btn nv-btn-mustard nv-font-bc" type="button" name="button">PLACE ORDER NOW</button>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script src="{{ asset('front\js\customs.js') }}" charset="utf-8"></script>
<script src="{{ asset('front\js\cart.js') }}" ></script>
@endsection
