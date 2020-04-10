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
  }).catch(function(error) {
    swalWentWrong();
  }).finally(function functionName() {

  });
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
