var invoice = new Vue ({
  el : "#nv-invoice-new" ,
  data : {
    jobOrderList : [] ,
    assignedEmployee : [] ,
    totalAmount : totals ,
    subTotal : totals ,
    notes : joNotes ,
    address : address ,
    email : email,
    phone : phone
  } ,
  methods : {
    computeTotal : function (amount) {
      this.totalAmount = this.totalAmount + parseInt(amount);
    } ,
    loadJobOrderItems : function(){
      const t  = this;
      axios.
      get('/admin/job/list/items/'+this.pad(joID)).
      then(function (response) {
        t.jobOrderList = response.data;
      }).catch(function(error) {
        swalWentWrong(error);
      });

    },
    pad : function(value) {
      return pad(value , 10);
    } ,
    submitInvoice : function() {
      const t = this;
      var err;
      var formInvoice  = new FormData();
      formInvoice.append('job_order_id' , t.pad(joID) );
      formInvoice.append('client_id' , clientId );
      formInvoice.append('client_name' ,clientName );
      formInvoice.append('address' ,  t.address);
      formInvoice.append('email' , t.email);
      formInvoice.append('phone' ,  t.phone);
      formInvoice.append('notes' , t.notes );

      // if(!t.address.trim()){
      //   swalWarning("Please enter client address.");
      //   err = 1;
      // }
      // if(!t.email.trim()){
      //   swalWarning("Please enter client email.");
      //   err = 1;
      // }
      // if(!t.phone.trim()){
      //   swalWarning("Please enter client phone number.");
      //   err = 1;
      // }
      if(err != 1){
        swalLoading("Creating invoice.. Please wait..")
        axios.
        post('/admin/invoice/new' , formInvoice).
        then(function (response) {
          swalSuccess("Invoice has been saved.");
          window.setTimeout(window.location.href='/admin/page/invoice.history', 2500);
        }).catch(function(error) {
          swalWentWrong(error)
        });
      }
    }
  } ,
  mounted (){
    this.loadJobOrderItems();

  }
});
