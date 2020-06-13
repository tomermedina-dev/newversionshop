@extends('front.layout.main')

@section('content')

<link rel="stylesheet" href="{{ asset('front/css/pages/cart.css') }}">
<title>New Version Shop - Cart</title>
<script type="text/javascript">
  var page = "{{$page}}";
</script>
<div class="container">
  <div class="nv-cart-content">
    <div class="row">
      <div v-cloak  class="nv-cart-details col-lg-9">

        <!-- <div class=" nv-cart-actions nv-default-box-shadow d-flex justify-content-between align-items-center">
          <div class="">

            <div class="nv-solid-checkbox">
              <input type="checkbox" id="selectAll">
              <label for="selectAll"><i class="far fa-square"></i>&nbsp;&nbsp;&nbsp;SELECT ALL (3 ITEMS)</label>
            </div>


          </div>
          <a class="nv-delete-button" href="#">
            <i class="far fa-trash-alt"></i>&nbsp;&nbsp;&nbsp;DELETE
          </a>
        </div> -->
        <ul class="nv-cart-products list-group nv-default-box-shadow">
          <li class="list-group-item nv-cart-items nv-font-bc">IN-CART PRODUCTS </li>
          <div v-if="cartList.length == 0" class="container">
            <h3 class="center">Empty cart</h3>
          </div>
          @include('front.cart.cart-list')
        </ul>

        <!-- <div class="nv-cart-products nv-default-box-shadow">
          <div class="card">
            <div class="card-header">
              Quote
            </div>
            <div class="card-body">
              <blockquote class="blockquote mb-0">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
              </blockquote>
            </div>
          </div>
        </div> -->
      </div>


      <div v-if="cartTotals.items_count > 0" class="col-lg-3">
        <div class="card nv-summary-group nv-default-box-shadow">
          <div class="card-header">
            <div class="">
              DEFAULT DELIVERY LOCATION
            </div>
            <div class="nv-font-bc d-flex align-items-center" id="default-address">

            </div>
          </div>
          <div    class="card-body">
            <div class="nv-summary-header nv-font-bc">
              ORDER SUMMARY
            </div>
            <div class="nv-summary-list d-flex justify-content-between align-items-center">
              <div v-cloak  class="nv-key">Sub Total (@{{cartTotals == 0 ? 0 : cartTotals.items_count}} Items)</div>
              <div v-cloak  class="nv-value">₱ @{{cartTotals == 0 ? 0 : numberWithCommas(cartTotals.total_amount)}}</div>
            </div>
            <!-- <div class="nv-summary-list d-flex justify-content-between align-items-center">
              <div class="nv-key">Shipping Fee</div>
              <div class="nv-value">P120.00</div>
            </div> -->
            <div class="nv-summary-list d-flex justify-content-between align-items-center">
              <div class="nv-total-key nv-font-bc">Total</div>
              <div class="">
                <div  v-cloak  class="nv-total-value nv-font-bc">₱ @{{cartTotals == 0 ? 0 : numberWithCommas(cartTotals.total_amount)}}</div>
                <div class="nv-vat">VAT Included, where applicable</div>
              </div>
            </div>
            <a href="/cart/checkout/{{$checkOutUrl}}"  style="width:100%;" class="btn btn-lg nv-btn-txt-white nv-font-bc " type="button" name="button">PROCEED TO CHECKOUT</a>

          </div>
        </div>
      </div>
    </div>
    <!-- front.includes.suggested-products -->
  </div>

</div>

<script type="text/javascript">
  $(document).ready(function () {
    $('#selectAll').click(function(e1){
      document.querySelectorAll('.nv-cart-content .nv-cart-details .nv-cart-products .nv-cart-items .nv-solid-checkbox input').forEach((e2) => {
        e2.checked = e1.target.checked;
      });

    });
  });
</script>
<style media="screen">
  .nv-footer {
    margin-top: 12.3% !important;
  }
</style>
<script src="{{ asset('front\js\customs.js') }}" charset="utf-8"></script>
<script src="{{ asset('front\js\cart.js') }}" ></script>
@endsection
