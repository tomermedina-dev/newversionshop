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
    } ,
    setPayment : function (invoiceId , jobId , remarks) {
      var amount = remarks == 'full' ? '' : '';
      var data = {
        'invoice_id' : invoiceId ,
        'amount' : amount ,
        'remarks' : remarks ,
        'notes' : ' ' ,
        'jobId' : jobId
      };
      const t = this;
      swalLoading("Please wait..")
      axios.
      post('/admin/invoice/payment/set' , data).
      then(function (response) {
        swalSuccess("Payment has been saved.");
        t.loadJobList();
      }).catch(function(error) {
        swalWentWrong(error);
      });
    }     
  } ,
  mounted () {
    this.loadJobList();
  }
})
