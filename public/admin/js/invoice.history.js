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
    },
    setPartial : function (invoiceId , jobId) {
      Swal.fire({
        showConfirmButton: false,
        allowEscapeKey : false ,
        allowOutsideClick : false ,
        showCloseButton : true ,
        html: `
        <div class="p-2">
           <h3 class="nv-font-bc"> Partial Payment</h3>
           <br>
          <div class="form-group">
            <label class="float-left">Amount</label>
            <input  onkeypress="return isNumber(event)"    class="nv-input-custom form-control" id="payment-amount" type="text" >
          </div>
          <div class="form-group">
            <label class="float-left">Notes</label>
            <input class="nv-input-custom form-control" id="payment-desc" type="text" >
          </div>
          <button  onclick="invoiceHistory.savePartial('`+invoiceId+`' , '`+jobId+`')"    type="button" class="float-left btn nv-btn-txt-white nv-font-bc" >
            SAVE
          </button>
          <br>
          <div class="nv-error-msg">
          </div>
        </div>
        `
      })
    },
    savePartial : function  (invoiceId , jobId) {
      const t = this;

      var amount = $("#payment-amount").val();
      var description = $("#payment-desc").val();
      var data = {
        'invoice_id' : invoiceId ,
        'amount' : amount ,
        'remarks' : 'partial' ,
        'notes' : description  ,
        'jobId' : jobId
      };
      if(amount){
        swalLoading("Please wait..")
        axios.
        post('/admin/invoice/payment/set' , data).
        then(function (response) {
          swalSuccess("Payment has been saved.");
          t.loadJobList();
        }).catch(function(error) {
          swalWentWrong(error);
        });
      }else {
        $(".nv-error-msg").append('<br><div class="swal2-validation-message" id="swal2-validation-message" style="display: flex;">Please enter amount.</div>');
      }


    }
  } ,
  mounted () {
    this.loadJobList();
  }
})
