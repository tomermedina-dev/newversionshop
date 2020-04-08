@extends('front.layout.main')

@section('content')

<link rel="stylesheet" href="{{ asset('front/css/pages/product-details.css') }}">

<div class="nv-details-content">

<div class="nv-product-details row">
  <div class="col-lg-5">
    <div class="nv-gallery ">
      <div class="nv-selected nv-default-box-shadow mb-2">
        <img src="{{ asset('images/logo_transpa.png')}}" alt="">
      </div>
      <div class="nv-lists d-flex align-items-center">
        <div class="nv-controls">
          <i class="fas fa-angle-left"></i>
        </div>
        <div class="nv-indicators row">

          <div class="col-3">
            <div class="nv-thumbnails">
              <div class="nv-img-container nv-default-box-shadow">
                <img src="{{ asset('images/logo_transpa.png')}}" alt="">
              </div>

            </div>
          </div>

          <div class="col-3">
            <div class="nv-thumbnails">
              <div class="nv-img-container nv-default-box-shadow">
                <img src="{{ asset('images/logo_transpa.png')}}" alt="">
              </div>

            </div>
          </div>

          <div class="col-3">
            <div class="nv-thumbnails">
              <div class="nv-img-container nv-default-box-shadow">
                <img src="{{ asset('images/logo_transpa.png')}}" alt="">
              </div>

            </div>
          </div>

          <div class="col-3">
            <div class="nv-thumbnails">
              <div class="nv-img-container nv-default-box-shadow">
                <img src="{{ asset('images/logo_transpa.png')}}" alt="">
              </div>

            </div>
          </div>

        </div>
        <div class="nv-controls">
          <i class="fas fa-angle-right"></i>
        </div>
      </div>
    </div>



  </div>
  <div class="col-lg-7">
    <div class="nv-labels">
      <div class="nv-details-header d-flex justify-content-between align-items-start">
        <div class="nv-name nv-font-bc">
          PRODUCT NAME
        </div>
        <div class="nv-brands d-flex align-items-center">

          <div class="nv-brand nv-font-bc">
            BRAND 1
          </div>

          <div class="nv-brand nv-font-bc">
            BRAND 2
          </div>

          <div class="nv-heart-checkbox">
            <input type="checkbox" id="favorite1">
            <label for="favorite1"><i class="far fa-heart"></i></label>
          </div>

        </div>
      </div>
      <div class="nv-ratings d-flex align-items-center mb-2" data-ratings="1.75"></div>
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


      <div class="nv-price nv-font-bc">
        P 2,500.00
      </div>
      <div class="nv-quantity d-flex align-items-center">
        <div class="nv-label nv-font-bc">
          QUANTITY
        </div>
        <div class="nv-quantity-input-group d-flex align-items-center">
          <a href="#">
            <i class="fas fa-minus-square"></i>
          </a>
          <div class="nv-actual-quantity nv-font-bc">
            0
          </div>
          <a href="#">
            <i class="fas fa-plus-square"></i>
          </a>
        </div>
      </div>
      <div class="nv-line"></div>
      <div class="nv-product-description">
        <div class="nv-header nv-font-bc">
          PRODUCT DESCRIPTION:
        </div>
        <div class="nv-description">
            &nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </div>
      </div>

    </div>

  </div>



</div>

<div class="nv-specification">
  <div class="nv-header nv-font-bc">
    Specification of Product Name
  </div>
  <div class="row">
    <div class="col-lg-3">
      <div class="nv-label">
        Model
      </div>
      <div class="nv-value">
        Car Model 1
      </div>
    </div>
    <div class="col-lg-3">
      <div class="nv-label">
        Warranty Period
      </div>
      <div class="nv-value">
        5 months
      </div>
    </div>
    <div class="col-lg-3">
      <div class="nv-label">
        Warranty Type
      </div>
      <div class="nv-value">
        Local Supplier Warranty
      </div>
    </div>
    <div class="col-lg-3">
      <div class="nv-label">
        SKU
      </div>
      <div class="nv-value">
        1234567_PH_0987654
      </div>
    </div>
  </div>
</div>

<div class="nv-line"></div>

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
      // console.log($('.nv-ratings').data("ratings"));
      var ratings = $('.nv-ratings').data("ratings");
      for (var i = 1.00; i <= 5; i++) {


        if(ratings>=i){
          $('.nv-ratings').append('<i class="fas fa-star"></i>');
        }else{
          if(ratings% 1 != 0 && ratings>=(i-1)){
            $('.nv-ratings').append('<i class="fas fa-star-half-alt"></i>');
          }else{
            $('.nv-ratings').append('<i class="far fa-star"></i>');
          }

        }
      }

        $('.nv-ratings').append("<div class='nv-percentage'>"+ratings*(100/5)+'%</div>');
    });
</script>

@endsection
