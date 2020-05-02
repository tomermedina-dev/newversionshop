@extends('front.layout.main')

@section('content')
<title>New Version Shop - Wishlist</title>
<div class="container">
<link rel="stylesheet" href="{{ asset('front/css/pages/wishlist.css') }}">
  <div class="nv-profile-content">
    <div class="row">

      <div class="col-lg-3 ">
        @include('front.includes.account-sidenav')
      </div>
      <div class="col-lg-9">
       <div class="nv-wishlist-content" id="nv-wishlist-content">
          <div class="row">
             <div class="nv-wishlist-details col-lg-12">
                <ul class="nv-wishlist-products list-group nv-default-box-shadow">
                   <li class="list-group-item nv-wishlist-items nv-font-bc">Wishlist </li>
                   <!---->
                   <div v-if="wishlistItems.length == 0" class="container">
                     <h3 class="center">Empty wishlist</h3>
                   </div>
                   <li v-for="items in wishlistItems" class="list-group-item nv-wishlist-items d-flex  align-items-start">
                      <div class="nv-thumbnail">
                         <div v-cloak class="nv-img-container"><img :src="getProductImagesPath(items.product_image)" alt=""></div>
                      </div>
                      <div class="nv-info">
                         <div class="nv-product-header">
                            <div class="nv-details">
                               <div class="row">
                                  <div class="col-lg-7 col-md-7">
                                     <div v-cloak class="pointer nv-name nv-font-bc">
                                        @{{items.name}}
                                     </div>
                                     <div class="nv-categories d-flex">
                                        <div class="nv-label nv-font-bc">
                                           Category:
                                        </div>
                                        <div v-cloak class="nv-category">
                                             @{{items.product_categ}}
                                        </div>
                                     </div>
                                     <div class="nv-brands d-flex">
                                        <div v-cloak class="nv-brand nv-font-bc">
                                           @{{items.brand}}
                                        </div>
                                     </div>
                                  </div>
                                  <div class="col-lg-5 col-md-5">
                                     <div v-cloak class="nv-price nv-font-bc d-lg-flex d-md-flex justify-content-end">
                                          ₱@{{numberWithCommas(items.price)}}
                                     </div>
                                  </div>
                               </div>
                               <br>
                               <div class="container">
                                 <button style="width:50%" v-on:click="addUpdateToCart('' , items.product_id ,1)" type="button"   class="btn btn-sm nv-btn-txt-white nv-font-bc"  >
                                   <i class="fas fa-cart-plus text-white"></i>&nbsp;
                                   ADD TO CART
                                  </button>
                                  <br><br>
                                  <button style="width:50%" v-on:click="removeFromWishlist(items.wishlist_id)" type="button"   class="btn btn-sm nv-btn-txt-white nv-font-bc" >
                                    <i class="fas fa-trash-alt text-white" style="cursor: pointer;"></i>&nbsp;
                                    REMOVE
                                  </button>
                               </div>

                            </div>
                         </div>
                      </div>
                   </li>
                </ul>
             </div>

          </div>

       </div>
    </div>
    </div>
  </div>
</div>

</div>

<script src="{{ asset('front\js\customs.js') }}" charset="utf-8"></script>
<script src="{{ asset('front\js\wishlist.js') }}" ></script>
@endsection
