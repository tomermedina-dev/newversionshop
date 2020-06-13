@extends('front.layout.main')

@section('content')
<script src="{{ asset('front\js\customs.js') }}" charset="utf-8"></script>
<script type="text/javascript">
  var productId = "{{$productId}}";
  productId = pad(productId , 10);
</script>
<link rel="stylesheet" href="{{ asset('front/css/pages/product-details.css') }}">
<title>New Version Shop - Product Details</title>
<div class="container">
  <div class="nv-details-content" id="nv-product-details" v-cloak>

  <div class="nv-product-details row" >
    <div class="col-lg-5">
      <div class="nv-gallery ">
        <div class="nv-selected nv-default-box-shadow mb-2" id="nv-selected-img-product">

        </div>
        <div class="nv-lists d-flex align-items-center">
          <div class="nv-controls">
            <i class="fas fa-angle-left"></i>
          </div>
          <div class="nv-indicators row">

            <div v-for="image in imageList" class="col-3">
              <div class="nv-thumbnails">
                <div class="nv-img-container nv-default-box-shadow">
                  <img v-on:click="setSelectedImage(image.image_name)" :src='getProductImagesPath(image.image_name)'  alt="">
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
            @{{productDetails.name}}
          </div>
          <div class="nv-brands d-flex align-items-center">

            <div class="nv-brand nv-font-bc">
                @{{productDetails.brand}}
            </div>



            <div class="nv-heart-checkbox">
              <input v-on:click="addToWishList(productDetails.id)" type="checkbox" id="favorite1">
              <label for="favorite1"><i class="far fa-heart"></i></label>
            </div>

          </div>
        </div>
        <!-- <div class="nv-ratings d-flex align-items-center mb-2" data-ratings="1.75"></div> -->
        <div class="nv-categories d-flex">
          <div class="nv-label nv-font-bc">
            Category:
          </div>
          <div class="nv-category">
              <span id="nv-category">@{{productDetails.product_categ}}</span>
          </div>
        </div>

        <div v-if="productDetails.promo">
          <div class="nv-price nv-font-bc">
            ₱ @{{productDetails.price}}
            <small style="font-size: 30%;">
              <del>  ₱ @{{productDetails.old_price}} </del> &emsp;- @{{productDetails.promo.replace('.' , '')}}%
            </small>
          </div>

        </div>
        <div v-else >
          <div class="nv-price nv-font-bc">
            ₱ @{{productDetails.price}}
          </div>
        </div>


        <div class="nv-line"></div>
        <div class="nv-product-description">
          <div class="nv-header nv-font-bc">
            PRODUCT DESCRIPTION:
          </div>
          <div class="nv-description">

          </div>
        </div>
        <br>
        <div class="container">
          <div class="nv-quantity d-flex align-items-center">
            <div class="nv-label nv-font-bc">
              QUANTITY
            </div>
            <div class="nv-quantity-input-group d-flex align-items-center">
              <a href="#" v-on:click="changeQuantity('deduct')">
                <i class="fas fa-minus-square"></i>
              </a>
              <div class="nv-actual-quantity nv-font-bc">
                @{{quantity}}
              </div>
              <a href="#" v-on:click="changeQuantity('add')">
                <i class="fas fa-plus-square"></i>
              </a>
            </div>
          </div>
          <button v-on:click="addUpdateToCart('' , productDetails.id ,1)" type="button" style="width:100%;" class="btn btn-lg nv-btn-txt-white nv-font-bc" data-toggle="modal" data-target="#addItemModal">
            <i class="fas fa-cart-plus text-white"></i>&nbsp;
            ADD TO CART
            </button>
        </div>
      </div>

    </div>
  </div>

  <div class="nv-specification">
    <div class="nv-header nv-font-bc">
      Specification of  @{{productDetails.name}}
    </div>
    <div class="row">
      <div class="col-lg-3">
        <div class="nv-label">
          Car Brand
        </div>
        <div class="nv-value">
           @{{productDetails.car_brand}}
        </div>
      </div>
      <div class="col-lg-3">
        <div class="nv-label">
          Car Model
        </div>
        <div class="nv-value">
          @{{productDetails.car_model}}
        </div>
      </div>
      <!-- <div class="col-lg-3">
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
      </div> -->
    </div>
  </div>

  <div class="nv-line"></div>

  <div class="nv-related-products">
    @include('front.product.suggested')
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

<script src="{{ asset('front\js\products.details.js') }}" ></script>
@endsection
