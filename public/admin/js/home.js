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
      var m = t.month;
      m++;
      axios.get('/admin/job/total/sales/'+m+'/'+t.year ).
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
