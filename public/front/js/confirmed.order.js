$("#nav-cart").addClass("active");
var cartItems = new Vue({
  el : ".nv-confirmed-content" ,
  data : {
    orderList : [] ,
    orderTotal : [] ,
  },
  methods : {
    loadCartList: function() {
      const t = this;
      axios.
      get('/order/list/'+pad(orderId,10)).
      then(function(response) {
        t.orderList = response.data;
      }).catch(function(error) {
        swalWentWrong();
      }).finally(function(response) {

      });
    } ,
    loadTotals : function() {
      const t = this;
      axios.
      get('/order/total/'+pad(orderId,10)).
      then(function(response) {
        t.orderTotal = response.data;
      }).catch(function(error) {
        swalWentWrong();
      }).finally(function(response) {

      });
    } ,
    numberWithCommas : function(x) {
      return numberWithCommas(x);
    } ,
    getProductImagesPath: function(img){
      return window.location.origin + "/uploads/images/products/"+img;
    }
  } ,
  mounted () {
    this.loadCartList();
    this.loadTotals();
  }
});
