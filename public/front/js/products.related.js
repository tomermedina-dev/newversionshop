new Vue({
  el : '#nv-related-product' ,
  data :{
    relatedList : []
  } ,
  methods :{
    loadRelated : function () {
      const  t = this;
      axios.
      get('/products/related/'+productCateg).
      then(function(response) {
        t.relatedList = response.data;
      }).catch(function(error) {
        swalWentWrong(error);
      })
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
    addToWishList : function  (productId) {
      addToWishList(userId , productId);
    }
  },
  mounted (){
    this.loadRelated();
  }
})
