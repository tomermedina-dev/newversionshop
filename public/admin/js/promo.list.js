new Vue({
  el : ".nv-ps-content" ,
  data : {
    promoList : []
  } ,
  methods : {
   loadList : function() {
     const t = this;
     axios.get('/admin/promo/list').
     then(function (response) {
       t.promoList = response.data;
     }).catch(function(error) {
       swalWentWrong(error);
     });
   } ,
   removePromo : function (promoId) {
     const t = this;
     promoId = pad(promoId , 10);
     swalLoading("Removing promo.. Please wait..")
     axios.get('/admin/promo/remove/'+promoId).
     then(function (response) {
       swalSuccess("Promo has been removed.");
        t.loadList();
     }).catch(function(error) {
       swalWentWrong(error);
     });
   }
 } ,
 mounted (){
   this.loadList();
 }
});
