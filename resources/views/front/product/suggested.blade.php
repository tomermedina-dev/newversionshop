<div class="nv-header nv-font-bc">
  You might also like
</div>

<div class="row" id="nv-related-product">
  <div  style="cursor:pointer"  v-for='product in relatedList' class="col-lg-3">
    <div class="card nv-product-card nv-default-box-shadow">
      <div class="nv-img-container">
        <div class="nv-product-actions d-flex justify-content-center align-items-center">
          <a href="#" v-on:click="addUpdateToCart('' , product.id , 1)"><i class="fas fa-cart-plus"></i></a>
          <div  class="nv-heart-checkbox " >
            <input v-on:click="addToWishList(product.id)" type="checkbox" id="favorite1">
            <label for="favorite1"><i class="far fa-heart"></i></label>
          </div>

        </div>
        <img v-on:click="visitProduct(product.id , product.name)" :src='getProductImagesPath(product.product_image)' >
      </div>
      <div class="card-body d-flex justify-content-between align-items-center">
        <div  >
          <div v-on:click="visitProduct(product.id , product.name)"  class="nv-name nv-font-bc">
            @{{product.name}}
          </div>
          <div class="nv-category">
            @{{product.product_categ}}
          </div>
        </div>
        <div class="text-right" v-if="product.promo">
          <div class="nv-price nv-font-bc">
            ₱  @{{numberWithCommas(product.price)}}
          </div>

          <small class="text-white">
            <del class="text-white">₱ @{{numberWithCommas(product.old_price)}} </del> - @{{product.promo.replace('.' , '')}} %
          </small>
        </div>
        <div v-else>
          <div class="nv-price nv-font-bc">
            ₱  @{{numberWithCommas(product.price)}}
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<script src="{{ asset('front\js\products.related.js') }}" ></script>
