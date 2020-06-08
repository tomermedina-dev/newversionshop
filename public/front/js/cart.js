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
    shippingNotes : "" ,
    deliveryMethod : "Shipping" ,
    popDeliveryMethod : this.deliveryMethod
  },
  methods : {
    changeDeliveryMethod : function () {
      if(this.deliveryMethod == 'Shipping'){
        $('.shipping-location').show();
        $('.pickup-location').hide();
      }else {
        $('.shipping-location').hide();
        $('.pickup-location').show();
        axios.
        get('/admin/address/default/pickup').
        then(function (response) {
          responseData = response.data;
          $("#default-pickup-location").text(response.data.value);
        }).catch(function(error) {
          swalWentWrong();
        });
      }
    },
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
    addToWishList : function  (productId) {
      addToWishList(userId , productId);
    },
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
    reviewCheckOut: function() {
      const t = this;
      var checkErr ;
      if(!t.shippingEmail.trim()){
        swalError("Please enter email address.");
        checkErr = 1;
      }
      if(!t.shippingContact.trim()){
        swalError("Please enter contact number.");
        checkErr = 1;
      }
      if(this.deliveryMethod == 'Shipping'){
        if(!t.shippingAddress.trim()){
          swalError("Please enter shipping address.");
          checkErr = 1;
        }
      }


      if(checkErr != 1){
      Swal.fire({
        html: `
        <div class="nv-checkout-content nv-cart-content">
        <div class="card nv-summary-group nv-default-box-shadow">
          <div class="card-header">
            <div class="nv-summary-header nv-font-bc">
              Customer Details
            </div>
            <!-- <div class="">
              LOCATION
            </div> -->
            <div class="nv-billing-list form-group">
              <label for="address" class="float-left">Delivery Method</label>
              <br><br>
              <div class="input-group-prepend">
                <span class=" nv-input-icon-plain-checkout" style="padding-right:8px;"><i class="fas fa-truck-loading"></i></span>
                <input disabled    type="text" class="form-control nv-input-custom-checkout" id="pop-delivery-method"  >
              </div>
            </div>
            <div class="nv-billing-list form-group shipping-location-pop">
              <!-- <label for="address">Address</label> -->
              <div class="input-group-prepend">
                <span class=" nv-input-icon-plain-checkout" style="padding-right:14px;"><i class="fas fa-map-marker-alt"></i></span>
                <input disabled    type="text" class="form-control nv-input-custom-checkout" id="pop-address"  >
              </div>
            </div>
            <div class="pop-default-pickup-location" style="display:none">
              <span>Pick-Up location</span>
              <p style="font-size:1.5em;" id="pop-default-pickup-location"></p>
            </div>

            <div class="nv-billing-list form-group">
              <!-- <label for="contact">Address</label> -->
              <div class="input-group-prepend">
                <span class=" nv-input-icon-plain-checkout"   ><i class="fas fa-phone-alt"></i></span>
                <input disabled   type="text" class="form-control nv-input-custom-checkout" id="pop-contact"  >
              </div>
            </div>

            <div class="nv-billing-list form-group">
              <!-- <label for="email">Email Address</label> -->
              <div class="input-group-prepend">
                <span class=" nv-input-icon-plain-checkout"   ><i class="fas fa-envelope"></i></span>
                <input disabled   type="text" class="form-control nv-input-custom-checkout" id="pop-email" placeholder="Enter your email address">
              </div>
            </div>
            <div class="nv-billing-list form-group">
              <label class="float-left" for="address">Note / Other details</label>
              <br><br>
              <div class="input-group-prepend" id="container-pop-notes">
                <span class=" nv-input-icon-plain-checkout" style="padding-right:14px;"  ><i class="fas fa-clipboard"></i></span>
                <input disabled  type="text" class="form-control nv-input-custom-checkout" id="pop-notes" placeholder="Enter notes or other details">
              </div>
            </div>
          </div>
          <div class="card-body float-left" >
            <div class="nv-summary-header nv-font-bc  float-left">
              ORDER SUMMARY
            </div>
            <br><br>
            <div class="nv-summary-list d-flex justify-content-between align-items-center">
              <div class="nv-total-key nv-font-bc">Total</div>

              <div class="float-left">
                <div class="nv-total-value nv-font-bc float-lef" id="pop-total">₱ 0.00</div>
                <div class="nv-vat">VAT Included, where applicable</div>
              </div>
            </div>
            <button onclick="sumbitCheckout()" class="w-75 btn nv-btn-mustard nv-font-bc float-left" type="button" name="button">PLACE ORDER NOW</button>

            <button onclick="swal.close()" class="w-25 btn  nv-btn-txt-white nv-font-bc float-right" type="button" name="button">CANCEL</button>

          </div>
        </div>
        </div>`,
        showCancelButton: false,
        showConfirmButton : false
      });
      }
      $("#pop-total").html("₱ " + numberWithCommas(t.cartTotals.total_amount));
      $("#pop-delivery-method").val(t.deliveryMethod);
      $("#pop-address").val(t.shippingAddress);
      $("#pop-contact").val(t.shippingContact);
      $("#pop-email").val(t.shippingEmail);
      $("#pop-notes").val(t.shippingNotes);
      var shipNotes =  t.shippingNotes.trim();
      if(!shipNotes){
        $("#container-pop-notes").append("<p style='padding:2%'> None </p>");
        $("#pop-notes").hide();
      }
      if(this.deliveryMethod != 'Shipping'){
        $('.shipping-location-pop').hide();
      }else {
        $('.pop-default-pickup-location').show();
        $("#pop-default-pickup-location").text($("#default-pickup-location").text());
      }
    } ,
    sumbitCheckout: function() {

      const t = this;

        swalLoading("Placing orders.. Please wait..")
        var formShippingDetails = new FormData();
        formShippingDetails.append('user_id' , userId);
        if(this.deliveryMethod == 'Shipping'){
          formShippingDetails.append('address' , t.shippingAddress);
        }else {
          formShippingDetails.append('address' , $("#default-pickup-location").text());
        }
        formShippingDetails.append('contact' , t.shippingContact);
        formShippingDetails.append('email' , t.shippingEmail);
        formShippingDetails.append('delivery_method' , t.deliveryMethod);
        var shipNotes =  t.shippingNotes.trim();
        formShippingDetails.append('notes' , !shipNotes ? ' ' : t.shippingNotes );

        axios.
        post('/cart/checkout/new' ,formShippingDetails).
        then(function(response) {
          // swalSuccess("Orders has been placed.")

          window.location.href = "/order/confirmed/"+pad(response.data.id, 10);
          // Swal.fire({
          //
          //   text: "Orders has been placed.",
          //   icon: 'success',
          //   showCancelButton: false,
          //   confirmButtonColor: '#3085d6',
          //   allowEscapeKey : false ,
          //   allowOutsideClick : false ,
          //   confirmButtonText: 'OK'
          // }).then((result) => {
          //   if (result.value) {
          //     // window.location.href = '/user/orders/recent';
          //   }
          // })
        }).catch(function(error) {
          swalWentWrong();
        }).finally(function(response) {});

    } ,
    setUserDetails : function() {
      const t = this;
      axios.
      get('/user/profile/details/'+userId).
      then(function (response) {
        var responseData = response.data;
        t.shippingContact = responseData.contact_num;
        t.shippingEmail = responseData.email;
      }).catch(function(error) {
        console.log(error);
        swalWentWrong();
      });

      axios.
      get('/user/address/default/'+userId).
      then(function (response) {
        responseData = response.data;
        if(responseData != 0){
          t.shippingAddress = response.data.address_details;
        }

      }).catch(function(error) {
        swalWentWrong();
      });
    } ,

  } ,
  mounted (){
    this.loadCartList();
    this.loadTotals();
    this.loadDefaultAddress(userId);
    this.setUserDetails();
  }
});

function sumbitCheckout() {
  cartItems.sumbitCheckout();
}
