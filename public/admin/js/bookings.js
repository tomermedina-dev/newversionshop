var bookedServices = new Vue({
  el : "#nv-bss-content" ,
  data : {
    bookedServicesList : [] ,
    index : 0 ,
    booking : ''
  } ,
  methods : {
    loadBookedServices : function(){
      const t = this;
      axios.
      get('/admin/services/booking/all/new').then(function(response) {
        t.bookedServicesList = response.data;
        console.log(t.bookedServicesList);
      }).catch(function(error) {
        swalWentWrong();
      });
    } ,
    pad : function(value) {
      return pad(value , 10);
    } ,
    requestResponse : function(serviceId , response) {
      const t = this;
      var status;
      if(response == 'reject'){
        status = 'X';
      }else{
        status = '1';
      }
      swalLoading("Submitting response please wait..")
      axios.get('/admin/services/booking/request-change-date/'+serviceId+'/'+status).
      then(function(response) {
        t.loadBookedServices();
        swalSuccess("Approval response has been saved.");
      }).catch(function (error) {
        swalWentWrong(error);
      })
    }
  } ,
  mounted (){
    this.loadBookedServices();
  }
});
