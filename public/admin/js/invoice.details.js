var invoice = new Vue ({
  el : "#nv-invoice-details" ,
  data : {
    jobOrderList : [] 
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
    }
  } ,
  mounted (){
    this.loadJobOrderItems();

  }
});
