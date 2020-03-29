@extends('front.layout.main')

@section('content')

<link rel="stylesheet" href="{{ asset('front/css/pages/cart.css') }}">

<div class="nv-cart-content">
  <div class="row">
    <div class="nv-cart-details col-lg-9">

      <div class=" nv-cart-actions nv-default-box-shadow d-flex justify-content-between align-items-center">
        <div class="">

          <div class="nv-solid-checkbox">
            <input type="checkbox" id="selectAll">
            <label for="selectAll"><i class="far fa-square"></i>&nbsp;&nbsp;&nbsp;SELECT ALL (3 ITEMS)</label>
          </div>


        </div>
        <a class="nv-delete-button" href="#">
          <i class="far fa-trash-alt"></i>&nbsp;&nbsp;&nbsp;DELETE
        </a>
      </div>
      <ul class="nv-cart-products list-group nv-default-box-shadow">
        <li class="list-group-item nv-cart-items nv-font-bc">IN-CART PRODUCTS</li>
        <li class="list-group-item nv-cart-items d-flex  align-items-start">
          <!-- <div class="row"> -->
            <!-- <div class="col-lg-5 d-flex"> -->
              <div class="nv-solid-checkbox">
                <input type="checkbox" id="item1">
                <label for="item1"><i class="far fa-square"></i></label>
              </div>
              <div class="nv-thumbnail">
                <div class="nv-img-container">
                  <img src="{{ asset('images/logo_transpa.png')}}" alt="">
                </div>
              </div>
              <div class="nv-info">
                <div class="nv-product-header">
                  <div class="nv-details">
                    <div class="row">
                      <div class="col-lg-7 col-md-7">
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
                            Loptop
                          </div>,
                          <div class="nv-category">
                            ASUS
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-5 col-md-5">
                        <div class="nv-price nv-font-bc d-lg-flex d-md-flex justify-content-end">
                          P2,500.00
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                      <div class="nv-quantity-group d-flex justify-content-between">
                        <i class="nv-free fas fa-truck"></i>
                        <div class="nv-quantity d-flex align-items-center">
                          <div class="nv-label nv-font-bc">
                            QUANTITY&nbsp;&nbsp;
                          </div>
                          <div class="nv-quantity-input-group d-flex align-items-center">
                            <a href="#">
                              <i class="fas fa-minus-square"></i>&nbsp;&nbsp;
                            </a>
                            <div class="nv-actual-quantity nv-font-bc">
                              0
                            </div>
                            <a href="#">
                              &nbsp;&nbsp;<i class="fas fa-plus-square"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                      <div class="nv-actions d-flex justify-content-end align-items-center">
                        <i class="far fa-trash-alt"></i>
                        <div class="nv-heart-checkbox">
                          <input type="checkbox" id="favorite2">
                          <label for="favorite2"><i class="far fa-heart"></i></label>
                        </div>
                      </div>
                    </div>

                  </div>


                </div>
              </div>
            <!-- </div> -->
          <!-- </div> -->

        </li>


        <li class="list-group-item nv-cart-items d-flex  align-items-start">
          <!-- <div class="row"> -->
            <!-- <div class="col-lg-5 d-flex"> -->
              <div class="nv-solid-checkbox">
                <input type="checkbox" id="item2">
                <label for="item2"><i class="far fa-square"></i></label>
              </div>
              <div class="nv-thumbnail">
                <div class="nv-img-container">
                  <img src="{{ asset('images/logo_transpa.png')}}" alt="">
                </div>
              </div>
              <div class="nv-info">
                <div class="nv-product-header">
                  <div class="nv-details">
                    <div class="row">
                      <div class="col-lg-7 col-md-7">
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
                            Loptop
                          </div>,
                          <div class="nv-category">
                            ASUS
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-5 col-md-5">
                        <div class="nv-price nv-font-bc d-lg-flex d-md-flex justify-content-end">
                          P1,850.00
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                      <div class="nv-quantity-group d-flex justify-content-between">
                        <i class="nv-free fas fa-truck"></i>
                        <div class="nv-quantity d-flex align-items-center">
                          <div class="nv-label nv-font-bc">
                            QUANTITY&nbsp;&nbsp;
                          </div>
                          <div class="nv-quantity-input-group d-flex align-items-center">
                            <a href="#">
                              <i class="fas fa-minus-square"></i>&nbsp;&nbsp;
                            </a>
                            <div class="nv-actual-quantity nv-font-bc">
                              0
                            </div>
                            <a href="#">
                              &nbsp;&nbsp;<i class="fas fa-plus-square"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                      <div class="nv-actions d-flex justify-content-end align-items-center">
                        <i class="far fa-trash-alt"></i>
                        <div class="nv-heart-checkbox">
                          <input type="checkbox" id="favorite2">
                          <label for="favorite2"><i class="far fa-heart"></i></label>
                        </div>
                      </div>
                    </div>

                  </div>


                </div>
              </div>
            <!-- </div> -->
          <!-- </div> -->

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
          <div class="">
            LOCATION
          </div>
          <div class="nv-font-bc d-flex align-items-center">
            <i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;&nbsp;Taguig, Taguig City, Fort Bonifacio
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
          <button class="btn nv-btn-mustard nv-font-bc" type="button" name="button">PROCEED TO CHECKOUT</button>

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


<script type="text/javascript">
  $(document).ready(function () {
    $('#selectAll').click(function(e1){
      document.querySelectorAll('.nv-cart-content .nv-cart-details .nv-cart-products .nv-cart-items .nv-solid-checkbox input').forEach((e2) => {
        e2.checked = e1.target.checked;
      });

    });
  });
</script>

@endsection
