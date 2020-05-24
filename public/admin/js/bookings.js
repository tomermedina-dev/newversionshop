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
    } ,
    exportTableToExcel : function () {
      var data = [];
      axios.
      get('/admin/services/booking/all/new/data-only').then(function(response) {
        data = response.data;
        exportJSONtoExcel(data , 'booked-services')
      }).catch(function(error) {
        swalWentWrong();
      });

   }
  } ,
  mounted (){
    this.loadBookedServices();
  }
});
