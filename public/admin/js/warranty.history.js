var warrantyActive = new Vue({
  el : "#nv-sw-history" ,
  data : {
    warrantyList : []
  } ,
  methods : {
    loadActiveWarranty : function () {
      const t  = this;
      axios.
      get('/admin/job/warranty/list/history').
      then(function (response) {
        t.warrantyList = response.data;
      }).catch(function(error) {
        swalWentWrong(error);
      });
    } ,
    pad : function (value) {
      return pad(value , 10);
    }
  } ,
  mounted (){
    this.loadActiveWarranty();
  }
})
