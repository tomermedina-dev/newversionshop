var wishlistItems = new Vue({
  el : "#nv-wishlist-content" ,
  data : {
    wishlistItems : []
  } ,
  methods : {
    loadWishlist : function () {
      const t = this;
      axios.
      get('/user/wishlist/list/'+userId).
      then(function(response) {
        t.wishlistItems = response.data;
      }).catch(function(error) {
        swalWentWrong();
      }).finally(function(response) {});
    } ,
    numberWithCommas : function(x) {
      return numberWithCommas(x);
    },
    removeFromWishlist : function (wishListId) {
      axios.
      get('/user/wishlist/delete/'+pad(wishListId)).
      then(function(response) {
        wishlistItems.loadWishlist();
        swalSuccess("Product has beem removed.")
      }).catch(function(error) {
        swalWentWrong();
      }).finally(function(response) {});
    },
    getProductImagesPath: function(img){
      return window.location.origin + "/uploads/images/products/"+img;
    },
    addUpdateToCart : function(cartId, productId , quantity){
      addOrUpdateToCart(cartId, pad(productId ,10) , quantity);
    }
  }
});

wishlistItems.loadWishlist();
