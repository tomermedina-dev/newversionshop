$("#nav-cart").addClass("active");
var cartItems = new Vue({
  el : ".nv-cart-content" ,
  data : {
    cartList : [] ,
    cartTotals : []
  },
  methods : {
    loadCartList: function() {
      const t = this;
      axios.
      get('/cart/list/'+userId).
      then(function(response) {
        t.cartList = response.data;


      }).catch(function(error) {
        swalWentWrong();
      }).finally(function(response) {

      });
    } ,
    loadTotals : function() {
      const t = this;
      axios.
      get('/cart/totals/'+userId).
      then(function(response) {
        t.cartTotals = response.data;
      }).catch(function(error) {
        swalWentWrong();
      }).finally(function(response) {

      });
    } ,
    getProductImagesPath: function(img){
      return window.location.origin + "/uploads/images/products/"+img;
    } ,
    numberWithCommas : function(x) {
      return numberWithCommas(x);
    } ,
    visitProduct: function(productId , slug) {
      window.location.href = "/products/details/"+pad(productId,10)+"/"+slug.replace(" " , "-");
    },
    addUpdateToCart : function(cartId, productId , quantity){
      addOrUpdateToCart(cartId, pad(productId ,10) , quantity);
    } ,
    deleteItemCart : function (cartId) {
      deleteItemCart(cartId);
      this.loadCartList();
      cartItems.loadTotals();
    },
    changeQuantity : function(action ,id , cartId) {
      var quantity = $("#"+id).text();
      if(action == 'deduct'){
        if (quantity != 1){
          quantity --;
          $("#"+id).text(quantity);
        }
      }else{
        quantity ++ ;
        $("#"+id).text(quantity);
      }
      updateCartQuantity(pad(cartId,10) , quantity);
      cartItems.loadTotals();
    }
  }
});
cartItems.loadCartList();
cartItems.loadTotals();
