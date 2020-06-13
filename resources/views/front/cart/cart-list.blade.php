
<li  v-cloak  v-for="items in cartList" class="list-group-item nv-cart-items d-flex  align-items-start">
  <!-- <div class="row"> -->
    <!-- <div class="col-lg-5 d-flex"> -->
      <!-- <div class="nv-solid-checkbox">
        <input type="checkbox" id="item1">
        <label for="item1"><i class="far fa-square"></i></label>
      </div> -->
      <div class="nv-thumbnail">
        <div class="nv-img-container">
          <img :src="getProductImagesPath(items.product_image)" alt="">
        </div>
      </div>
      <div class="nv-info">
        <div class="nv-product-header">
          <div class="nv-details">
            <div class="row">
              <div class="col-lg-7 col-md-7">
                <div  v-on:click="visitProduct(items.product_id , items.name)" class="pointer nv-name nv-font-bc">
                  @{{items.name}}
                </div>
                <div class="nv-categories d-flex">
                  <div class="nv-label nv-font-bc">
                    Category:
                  </div>
                  <div class="nv-category">
                    @{{items.product_categ}}
                  </div>

                </div>
                <div class="nv-brands d-flex">
                  <div class="nv-brand nv-font-bc">
                    @{{items.brand}}
                  </div>
                </div>
              </div>
              <div class="col-lg-5 col-md-5">
                <div v-if="items.promo" >
                  <div   class="nv-price nv-font-bc d-lg-flex d-md-flex justify-content-end">
                    ₱@{{numberWithCommas(items.price)}}
                  </div>
                  <small class="float-right">
                    <del>  ₱ @{{items.old_price}} </del> &emsp;- @{{items.promo.replace('.' , '')}}%
                  </small>
                </div>

                <div v-else  class="nv-price nv-font-bc d-lg-flex d-md-flex justify-content-end" >
                    ₱@{{numberWithCommas(items.price)}}
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
                    <a  v-on:click="changeQuantity('deduct' , 'cart_item_'+items.cart_id ,items.cart_id)">
                      <i class="fas fa-minus-square"></i>&nbsp;&nbsp;
                    </a>
                    <div :id="'cart_item_'+items.cart_id" class="nv-actual-quantity nv-font-bc">
                      @{{items.cart_quantity}}
                    </div>
                    <a  v-on:click="changeQuantity('add' , 'cart_item_'+items.cart_id ,items.cart_id)" >
                      &nbsp;&nbsp;<i class="fas fa-plus-square"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-md-12">
              <div class="nv-actions d-flex justify-content-end align-items-center">
                <i style="cursor:pointer;" v-on:click="deleteItemCart(items.cart_id)" class="far fa-trash-alt"></i>
                <div class="nv-heart-checkbox">
                  <input v-on:click="addToWishList(items.product_id)" type="checkbox" id="favorite2">
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
