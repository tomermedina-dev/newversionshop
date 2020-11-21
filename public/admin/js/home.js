new Vue({
  el : "#nv-home-admin" ,
  data : {
    month : new Date().getMonth() ,
    year : new Date().getFullYear(),
    jo_total_sales :0
  } ,
  methods : {
    loadJoTotalSales : function () {
      const t = this;
      axios.get('/admin/job/total/sales/'+t.month+'/'+t.year ).
      then(function(response) {
        $("#jo_total_sales").text('₱ ' + numberWithCommas(response.data)) ;
      }).catch(function(error) {
        swalWentWrong(error);
      });
    }
  } ,
  mounted () {
    this.loadJoTotalSales();
  }
});
