new Vue({
  el : "#nv-bss-content-rejected" ,
  data : {
    bookedServicesList : [] ,
    index : 0 ,
    booking : ''
  } ,
  methods : {
    loadBookedServices : function(){
      const t = this;
      axios.
      get('/admin/services/booking/all/rejected').then(function(response) {
        t.bookedServicesList = response.data;

      }).catch(function(error) {
        swalWentWrong();
      });
    } ,
    pad : function(value) {
      return pad(value , 10);
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
