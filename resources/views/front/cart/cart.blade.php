@extends('front.layout.main')

@section('content')

<link rel="stylesheet" href="{{ asset('front/css/pages/cart.css') }}">
<title>New Version Shop - Cart</title>
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
          <li class="list-group-item nv-cart-items nv-font-bc">IN-CART PRODUCTS</li>
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


      <div class="col-lg-3">
        <div class="card nv-summary-group nv-default-box-shadow">
          <div class="card-header">
            <div class="">
              LOCATION
            </div>
            <div class="nv-font-bc d-flex align-items-center">
              <i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;&nbsp;Taguig, Taguig City, Fort Bonifacio
            </div>
          </div>
          <div  class="card-body">
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
                <div class="nv-total-value nv-font-bc">₱ @{{cartTotals == 0 ? 0 : numberWithCommas(cartTotals.total_amount)}}</div>
                <div class="nv-vat">VAT Included, where applicable</div>
              </div>
            </div>
            <button style="width:100%;" class="btn btn-lg nv-btn-txt-white nv-font-bc " type="button" name="button">PROCEED TO CHECKOUT</button>

          </div>
        </div>
      </div>
    </div>



    <div class="nv-related-products">
      <div class="nv-header nv-font-bc">
        You might also like
      </div>

      <div class="row">
        <div class="col-lg-3">
          <div class="card nv-product-card nv-default-box-shadow">
            <div class="nv-img-container">
              <div class="nv-product-actions d-flex justify-content-center align-items-center">
                <a href="#"><i class="fas fa-cart-plus"></i></a>
                <div class="nv-heart-checkbox">
                  <input type="checkbox" id="favorite2">
                  <label for="favorite2"><i class="far fa-heart"></i></label>
                </div>

              </div>
              <img src="" >
            </div>
            <div class="card-body d-flex justify-content-between align-items-center">
              <div class="">
                <div class="nv-name nv-font-bc">
                  Product 1
                </div>
                <div class="nv-category">
                  Category 1
                </div>
              </div>
              <div class="nv-price nv-font-bc">
                P 250.00
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card nv-product-card nv-default-box-shadow">
            <div class="nv-img-container">
              <div class="nv-product-actions d-flex justify-content-center align-items-center">
                <a href="#"><i class="fas fa-cart-plus"></i></a>
                <div class="nv-heart-checkbox">
                  <input type="checkbox" id="favorite3">
                  <label for="favorite3"><i class="far fa-heart"></i></label>
                </div>

              </div>
              <img src="" >
            </div>
            <div class="card-body d-flex justify-content-between align-items-center">
              <div class="">
                <div class="nv-name nv-font-bc">
                  Product 1
                </div>
                <div class="nv-category">
                  Category 1
                </div>
              </div>
              <div class="nv-price nv-font-bc">
                P 250.00
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card nv-product-card nv-default-box-shadow">
            <div class="nv-img-container">
              <div class="nv-product-actions d-flex justify-content-center align-items-center">
                <a href="#"><i class="fas fa-cart-plus"></i></a>
                <div class="nv-heart-checkbox">
                  <input type="checkbox" id="favorite4">
                  <label for="favorite4"><i class="far fa-heart"></i></label>
                </div>

              </div>
              <img src="" >
            </div>
            <div class="card-body d-flex justify-content-between align-items-center">
              <div class="">
                <div class="nv-name nv-font-bc">
                  Product 1
                </div>
                <div class="nv-category">
                  Category 1
                </div>
              </div>
              <div class="nv-price nv-font-bc">
                P 250.00
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card nv-product-card nv-default-box-shadow">
            <div class="nv-img-container">
              <div class="nv-product-actions d-flex justify-content-center align-items-center">
                <a href="#"><i class="fas fa-cart-plus"></i></a>
                <div class="nv-heart-checkbox">
                  <input type="checkbox" id="favorite5">
                  <label for="favorite5"><i class="far fa-heart"></i></label>
                </div>

              </div>
              <img src="" >
            </div>
            <div class="card-body d-flex justify-content-between align-items-center">
              <div class="">
                <div class="nv-name nv-font-bc">
                  Product 1
                </div>
                <div class="nv-category">
                  Category 1
                </div>
              </div>
              <div class="nv-price nv-font-bc">
                P 250.00
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
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
<script src="{{ asset('front\js\customs.js') }}" charset="utf-8"></script>
<script src="{{ asset('front\js\cart.js') }}" ></script>
@endsection
