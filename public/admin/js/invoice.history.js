var invoiceHistory = new Vue({
  el : "#nv-history-list" ,
  data :{
    jobList : []
  } ,
  methods : {
    loadJobList : function () {
      const t = this;
      axios.
      get('/admin/invoice/list/all').
      then(function (response) {
        t.jobList = response.data;
      }).catch(function(error) {
        swalWentWrong(error);
      })
    } ,
    pad : function (value) {
      return pad(value , 10);
    }
  } ,
  mounted () {
    this.loadJobList();
  }
})
