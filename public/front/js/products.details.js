$("#nav-products").addClass("active");

var productDetails = new Vue({
  el : "#nv-product-details" ,
  data : {
    productName : "" ,
    brand : "" ,
    car_brand : "" ,
    car_model : "" ,
    price : "" ,
    description : "" ,
    model : "" ,
    productDetails : [] ,
    imageList : [] ,
    quantity : 1
  } ,
  methods : {
    loadDetails : function() {
      const t = this;
      axios.
      get("/products/details/"+productId)
      .then(function(response) {
        t.productDetails = response.data;

      }).catch(function(error) {
        swalWentWrong();
      }).finally(function(response) {

      });
    } ,
    loadImages : function (){
      const t = this;
      axios.
      get('/admin/products/image/'+productId)
      .then(function(response) {
        t.imageList = response.data;
        // console.log(JSON.stringify(t.imageList));
        $("#nv-selected-img-product").append(`<img src="`+getProductImagesPath(t.imageList[0].image_name)+`" alt="">`);
      }).catch(function(error) {
        swalWentWrong();
      }).finally(function(response) { });

      //
    } ,
    getProductImagesPath: function(img){
      return window.location.origin + "/uploads/images/products/"+img;
    } ,
    setSelectedImage : function(img){
        $("#nv-selected-img-product").empty();
        $("#nv-selected-img-product").append(`<img src="`+getProductImagesPath(img)+`" alt="">`);
    } ,
    addUpdateToCart : function(cartId, productId , quantity){
      if(this.quantity == 0){
        swalWarning("Quantity must be one or more.")
      }else {
        addOrUpdateToCart(cartId, pad(productId ,10) , this.quantity);
      }

    } ,
    changeQuantity : function(action) {
      if(action == 'deduct'){
        if(this.quantity!=1){
          this.quantity -- ;
        }
      }else{
        this.quantity ++;
      }
    } ,
    addToWishList : function  (productId) {
      addToWishList(userId , productId);
    }
  } ,
  mounted (){
    this.loadDetails();
    this.loadImages();
  }
});

new Vue({
  el : ".nv-related-products" ,
  data : {

  },
  methods : {

  } 

})
