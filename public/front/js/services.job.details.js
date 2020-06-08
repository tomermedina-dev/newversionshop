var jobOrderHistory = new Vue ({
  el : "#nv-jo-list-details" ,
  data : {
    jobOrderList : [] ,
    employeeId  : '' ,
    slotId : '' ,
    notes : '' ,
    employeeList : [] ,
    slotList : [] ,
    assignedEmployee : [] ,
    totalAmount : totals ,
    evaluation_notes : '' ,
    is_approved : 0 ,
    start : '' ,
    end : '' ,
    warrantyDate : '' ,
    warrantyDetails : []
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
    getJobWarranty : function(){
      const t  = this;
      axios.
      get('/admin/job/warranty/'+this.pad(joID)).
      then(function (response) {
        t.warrantyDetails = response.data;
      }).catch(function(error) {
        swalWentWrong(error);
      });

    } ,
    pad : function(value) {
      return pad(parseInt(value) , 10);
    } ,
  } ,
  mounted (){
    this.loadJobOrderItems();
    this.getJobWarranty();
    
  }
});
