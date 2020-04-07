@extends('front.layout.main')

@section('content')
<div class="container">
<link rel="stylesheet" href="{{ asset('front/css/pages/checkout.css') }}">

<div class="nv-checkout-content">
  <div class="row">
    <div class="nv-checkout-details col-lg-9">

      <div class=" nv-checkout-actions nv-default-box-shadow d-flex justify-content-between align-items-center">
        <div class="">
          3 ITEMS
        </div>
      </div>
      <ul class="nv-checkout-products list-group nv-default-box-shadow">

        <li class="list-group-item nv-checkout-items nv-font-bc">IN-CHECKOUT PRODUCTS</li>

        <li class="list-group-item nv-checkout-items">

          <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-7 d-flex align-items-center">
                <div class="nv-thumbnail">
                  <div class="nv-img-container">
                    <img src="{{ asset('images/logo_transpa.png') }}" alt="">
                  </div>
                </div>
                <div class="nv-info-group">
                  <div class="nv-name nv-font-bc">
                    Product Name
                  </div>
                  <div class="nv-categories d-flex">
                    <div class="nv-label nv-font-bc">
                      Category:
                    </div>
                    <div class="nv-category">
                      Computer
                    </div>,
                    <div class="nv-category">
                      Laptop
                    </div>,
                    <div class="nv-category">
                      ASUS
                    </div>
                  </div>
                  <div class="nv-brands d-flex">
                    <div class="nv-brand nv-font-bc">
                      BRAND 1
                    </div>
                    <div class="nv-brand nv-font-bc">
                      BRAND 2
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 d-flex align-items-center justify-content-center">
                <div class="nv-price nv-font-bc">
                  P2,500.00

                  <a href="#" class="nv-delete-button">
                    <i class="far fa-trash-alt"></i>
                  </a>
                </div>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-1 d-flex  align-items-center justify-content-center">
                QTY: 1
              </div>
          </div>
        </li>

        <li class="list-group-item nv-checkout-items">

          <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-7 d-flex align-items-center">
                <div class="nv-thumbnail">
                  <div class="nv-img-container">
                    <img src="{{ asset('images/logo_transpa.png') }}" alt="">
                  </div>
                </div>
                <div class="nv-info-group">
                  <div class="nv-name nv-font-bc">
                    Product Name
                  </div>
                  <div class="nv-categories d-flex">
                    <div class="nv-label nv-font-bc">
                      Category:
                    </div>
                    <div class="nv-category">
                      Computer
                    </div>,
                    <div class="nv-category">
                      Laptop
                    </div>,
                    <div class="nv-category">
                      ASUS
                    </div>
                  </div>
                  <div class="nv-brands d-flex">
                    <div class="nv-brand nv-font-bc">
                      BRAND 1
                    </div>
                    <div class="nv-brand nv-font-bc">
                      BRAND 2
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-5 d-flex align-items-center justify-content-center">
                <div class="nv-price nv-font-bc">
                  P1,850.00
                </div>
              </div>
              <div class="col-lg-2 col-md-2 d-flex align-items-center justify-content-center">
                QTY: 2
              </div>
          </div>
        </li>

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
          <div class="nv-summary-header nv-font-bc">
            ORDER SUMMARY
          </div>
          <div class="">
            LOCATION
          </div>
          <div class="nv-billing-list">
            <div class="nv-font-bc d-flex align-items-center ">
              <i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;&nbsp;Darren G. Carlos
              <a href="#" class="nv-edit-button d-flex justify-content-end" style="flex-grow:1">Edit</a>
            </div>
            <div class="d-flex align-items-center">
              <i class="fas fa-map-marker-alt" style="opacity:0;"></i><div class="">
                &nbsp;&nbsp;&nbsp;</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;32nd St. Eco Tower, Fort Bonifacio, Taguig City, Metro Manila~Taguig

            </div>
          </div>

          <div class="d-flex align-items-center nv-billing-list">
            <i class="fas fa-receipt"></i>&nbsp;&nbsp;&nbsp;Bill to same address
            <a href="#" class="nv-edit-button d-flex justify-content-end" style="flex-grow:1">Edit</a>
          </div>

          <div class="d-flex align-items-center nv-billing-list">
            <i class="fas fa-phone-alt"></i>&nbsp;&nbsp;&nbsp;09174128290
            <a href="#" class="nv-edit-button d-flex justify-content-end" style="flex-grow:1">Edit</a>
          </div>

          <div class="d-flex align-items-center nv-billing-list">
            <i class="fas fa-envelope"></i>&nbsp;&nbsp;&nbsp;dgcarlos12@gmail.com
            <a href="#" class="nv-edit-button d-flex justify-content-end" style="flex-grow:1">Edit</a>
          </div>

        </div>
        <div class="card-body">
          <div class="nv-summary-header nv-font-bc">
            ORDER SUMMARY
          </div>
          <div class="nv-summary-list d-flex justify-content-between align-items-center">
            <div class="nv-key">Sub Total (3 Items)</div>
            <div class="nv-value">P9,750.00</div>
          </div>
          <div class="nv-summary-list d-flex justify-content-between align-items-center">
            <div class="nv-key">Shipping Fee</div>
            <div class="nv-value">P120.00</div>
          </div>
          <div class="nv-summary-list d-flex justify-content-between align-items-center">
            <div class="nv-total-key nv-font-bc">Total</div>
            <div class="">
              <div class="nv-total-value nv-font-bc">P9,870.00</div>
              <div class="nv-vat">VAT Included, where applicable</div>
            </div>
          </div>
          <button class="btn nv-btn-mustard nv-font-bc" type="button" name="button">PLACE ORDER NOW</button>

        </div>
      </div>
    </div>
  </div>




</div>


</div>

@endsection
