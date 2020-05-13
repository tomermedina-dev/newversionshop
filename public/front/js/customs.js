function isNumber(evt) {
    var sp_val = $("#service_price").val();
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46) {
        return false;
    }
    if (charCode === 46 && sp_val.split('.').length === 2) {
        return false;
    }
    return true;
}

function validateEmailFormat(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  console.log(email);
  return re.test(email);
}

function pad(str, max) {
    str = str.toString();
    return str.length < max ? pad("0" + str, max) : str;
}

function tableSearch(inputId , tableId) {
  // Declare variables
  var value = $("#"+inputId).val().toLowerCase();
  $("#"+tableId+" tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
  });
}

function getProductImagesPath(img) {
  return window.location.origin + "/uploads/images/products/"+img;
}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function noResultMessage() {
  $("#noResult").empty();
  $("#noResult").append("<h2>No result(s) found.</h2>");
}


function addOrUpdateToCart (cartId, productId , quantity) {
  // var url ="";
  // if(!quantity){
  //   url = 'products'
  // }else{
  //
  // }
  if(userId == 0){
    Swal.fire({
      html : `<div class='container'>
                <div class="d-flex justify-content-center">
                  <div class="nv-dot-dark"  ></div>
                  <div class="nv-dot-mustard" style="margin-left:-25px;" ></div>
                </div>
                <h3> Please login your account to continue. </h3>
                <div class="">
                  <div class="nv-line-divider d-flex justify-content-center" ></div>
                  <div class=" d-flex justify-content-center">
                    <div class="nv-mustard-divider" style="width:50px; margin-top:-3.5px;"></div>
                  </div>
                </div>

                <br>
                <a href="/login" class="btn btn-lg nv-btn-txt-white" style="width:100%"> Log in now </a>
                <br>
                or
                <br>
                <a href="/register" class="btn btn-lg nv-btn-txt-white" style="width:100%"> Create an account </a>
              </div>` ,
    showConfirmButton : false
    });
  }else{
    var formCartDetails = new FormData();
    formCartDetails.append('user_id' , userId);
    formCartDetails.append('product_id' , productId);
    formCartDetails.append('quantity' , quantity);
    if(cartId){
      formCartDetails.append('cartId' , cartId);
    }
    swalLoading("Adding to cart. Please wait..")
    axios.
    post('/cart/new' , formCartDetails).
    then(function(response) {
      swalSuccess("Product has been added to cart");

      Swal.fire({

        text: "Item has been added to cart",
        icon: 'success',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonText : "Continue shopping" ,
        confirmButtonText: 'Go to Cart'
      }).then((result) => {
        if (result.value) {
          window.location.href = '/cart';
        }
      })
    }).catch(function(error) {
      swalWentWrong();
    }).finally(function functionName() {

    });
    getCartCount();
  }

}
function deleteItemCart(cartId) {
  axios.
  get("/cart/delete/"+cartId).
  then(function (response) {
    swalSuccess("Product has been removed.");
  }).catch(function(error) {
    swalWentWrong();
  }).finally(function () {

  });
  getCartCount();
}
function updateCartQuantity(cartId ,quantity) {
  axios.
  get("/cart/update/quantity/"+cartId+"/"+quantity).
  then(function (response) {
    // swalSuccess("Product has been removed.");
  }).catch(function(error) {
    swalWentWrong();
  }).finally(function () {

  });
}
function getCartCount() {
  if(userId == 0){
    $("#cart-count").text('0');
  }else {
    axios.
    get('/cart/count/'+userId).
    then(function (response) {
      $("#cart-count").text(response.data.items_count);
    }).catch(function(error) {
      swalWentWrong();
    }).finally(function() {});
  }
}
getCartCount();

function getDefaultAddress(userId) {

  axios.
  get('/user/address/default/'+userId).
  then(function (response) {
    responseData = response.data;
    if(responseData != 0){
      $("#default-address").append('<i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;&nbsp;' + response.data.address_details);
    }else{
      $("#default-address").text('None' );
    }

  }).catch(function(error) {
    swalWentWrong();
  });

}
function setUserFullName() {
  if(userFullName != ''){
    $('.nv-greetings').append('Hello, ' , userFullName);
  }
}

function addToWishList(userId , productId){
  if(userId == 0){
    Swal.fire({
      html : `<div class='container'>
                <div class="d-flex justify-content-center">
                  <div class="nv-dot-dark"  ></div>
                  <div class="nv-dot-mustard" style="margin-left:-25px;" ></div>
                </div>
                <h3> Please login your account to continue. </h3>
                <div class="">
                  <div class="nv-line-divider d-flex justify-content-center" ></div>
                  <div class=" d-flex justify-content-center">
                    <div class="nv-mustard-divider" style="width:50px; margin-top:-3.5px;"></div>
                  </div>
                </div>

                <br>
                <a href="/login" class="btn btn-lg nv-btn-txt-white" style="width:100%"> Log in now </a>
                <br>
                or
                <br>
                <a href="/register" class="btn btn-lg nv-btn-txt-white" style="width:100%"> Create an account </a>
              </div>` ,
    showConfirmButton : false
    });
  }else{
    var formWishDetails = new FormData();
    formWishDetails.append('user_id' , userId);
    formWishDetails.append('product_id' , pad(productId , 10));


    swalLoading("Adding to wishlist. Please wait..")
    axios.
    post('/user/wishlist/new' , formWishDetails).
    then(function(response) {
      swalSuccess("Product has been added to your wishlist.");
    }).catch(function(error) {
      swalWentWrong();
    }).finally(function functionName() {

    });

  }
}

function getQRImage(value) {
  axios.
  get('/admin/qr/generate/'+value).
  then(function (response) {
    $("#qr-details-img").html(response.data);
  }).catch(function(error) {
    swalWentWrong(error);
  });
}
