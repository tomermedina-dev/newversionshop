var jobOrderHistory = new Vue ({
  el : "#nv-jo-list-history" ,
  data : {
    jobOrderList : []
  } ,
  methods : {
    loadJobOrders : function(){
      const t  = this;
      axios.
      get('/admin/job/assignment/list/history').
      then(function (response) {
        t.jobOrderList = response.data;
      }).catch(function(error) {
        swalWentWrong(error);
      });

    } ,
    pad : function(value) {
      return pad(value , 10);
    } ,
    exportTableToExcel : function() {
      exportJSONtoExcel(this.jobOrderList , 'job-orders-history')
    }
  } ,
  mounted (){
    this.loadJobOrders();
  }
});
