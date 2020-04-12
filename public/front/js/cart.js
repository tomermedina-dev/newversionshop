$("#nav-cart").addClass("active");
var cartItems = new Vue({
  el : ".nv-cart-content" ,
  data : {
    cartList : [] ,
    cartTotals : [] ,
    defaultAddress : "" ,
    currentPage : page ,
    shippingAddress : "" ,
    shippingContact : "" ,
    shippingEmail : "" ,
    shippingNotes : ""
  },
  methods : {
    loadCartList: function() {
      const t = this;
      axios.
      get('/cart/list/'+userId).
      then(function(response) {
        t.cartList = response.data;
        getCartCount();

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
    } ,
    loadDefaultAddress : function(userId) {
      // console.log(getDefaultAddress(userId));
      const t = this;

      getDefaultAddress(userId);

    } ,
    sumbitCheckout: function() {
      var checkErr ;
      const t = this;

      if(!t.shippingAddress.trim()){
        swalError("Please enter shipping address.");
        checkErr = 1;
      }
      if(!t.shippingContact.trim()){
        swalError("Please enter contact number.");
        checkErr = 1;
      }
      if(!t.shippingEmail.trim()){
        swalError("Please enter email address.");
        checkErr = 1;
      }
      if(checkErr != 1){
        swalLoading("Placing orders.. Please wait..")
        var formShippingDetails = new FormData();
        formShippingDetails.append('user_id' , userId);
        formShippingDetails.append('address' , t.shippingAddress);
        formShippingDetails.append('contact' , t.shippingContact);
        formShippingDetails.append('email' , t.shippingEmail);
        var shipNotes =  t.shippingNotes.trim();
        formShippingDetails.append('notes' , !shipNotes ? ' ' : t.shippingNotes );
        axios.
        post('/cart/checkout/new' ,formShippingDetails).
        then(function(response) {
          // swalSuccess("Orders has been placed.")

          Swal.fire({

            text: "Orders has been placed.",
            icon: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',

            confirmButtonText: 'OK'
          }).then((result) => {
            if (result.value) {
              window.location.href = '/user/recent-orders';
            }
          })
        }).catch(function(error) {
          swalWentWrong();
        }).finally(function(response) {});
      }
    }
  }
});
cartItems.loadCartList();
cartItems.loadTotals();
cartItems.loadDefaultAddress(userId);
