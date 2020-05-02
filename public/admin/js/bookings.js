var bookedServices = new Vue({
  el : "#nv-bss-content" ,
  data : {
    bookedServicesList : []
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
    }
  }
});
bookedServices.loadBookedServices();
