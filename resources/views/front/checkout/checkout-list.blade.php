<li  v-cloak  v-for="items in cartList" class="list-group-item nv-checkout-items">
  <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-7 d-flex align-items-center">
        <div class="nv-thumbnail">
          <div class="nv-img-container">
            <img  :src="getProductImagesPath(items.product_image)" alt="">
          </div>
        </div>
        <div class="nv-info-group">
          <div v-on:click="visitProduct(items.product_id , items.name)" class="pointer nv-name nv-font-bc">
            @{{items.name}}
          </div>
          <div class="nv-categories d-flex">
            <div class="nv-label nv-font-bc">
              Category:
            </div>
            <div class="nv-category">
              @{{items.product_categ}}
            </div>,
          </div>
          <div class="nv-brands d-flex">
            <div class="nv-brand nv-font-bc">
              @{{items.brand}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 d-flex align-items-center justify-content-center">
        <div  v-if="items.promo">
          <div class="nv-price nv-font-bc">
            ₱@{{numberWithCommas(items.price)}}
            <br>
            <small style="font-size:50%" class="float-right">
              <del>  ₱ @{{items.old_price}} </del> &emsp;- @{{items.promo.replace('.' , '')}}%
            </small>
          </div>
        </div>
        <div v-else  class="nv-price nv-font-bc">
          ₱@{{numberWithCommas(items.price)}}
        </div>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-1 d-flex  align-items-center justify-content-center">
        QUANTITY:  @{{items.cart_quantity}}
      </div>
  </div>
</li>
