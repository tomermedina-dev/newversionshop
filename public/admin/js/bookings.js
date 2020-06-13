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
        swalWentWrong(error);
      });

   } ,
   rejectBooking : function (bookingId) {
     bookingId = this.pad(bookingId);
      Swal.fire({
        showConfirmButton: false,
        allowEscapeKey : false ,
        allowOutsideClick : false ,
        showCloseButton : true ,
        html: `
        <div class="p-2">
           <h3 class="nv-font-bc"> Reject Booking </h3>
           <h4 class="float-left" >Booking ID : `+bookingId+` </h4>
           <br>
           <br>
          <div class="form-group">
            <label class="float-left">Reason for rejecting</label>
            <input    class="nv-input-custom form-control" id="reason" type="text" >
          </div>
          <button  onclick="bookedServices.submitReject(`+bookingId+`)"    type="button" class="float-left btn nv-btn-txt-white nv-font-bc" >
            Submit Reject
          </button>
          <br>
          <div class="nv-error-msg">
          </div>
        </div>
        `
      })
   } ,
   submitReject : function(serviceId) {
      var reason  = $("#reason").val();
      const t = this;
      if(reason){
        var data = {
          'status' : 'X' ,
          'reason' : reason ,
          'serviceId' : serviceId
        };
        swalLoading("Please wait..");
        axios.post("/admin/services/booking/edit/status" , data).
        then(function(response) {
          swalSuccess("Booking has been rejected.");
          t.loadBookedServices();
        }).catch(function(error) {
          swalWentWrong(error);
        });
      }else {
        $(".nv-error-msg").append('<br><div class="swal2-validation-message" id="swal2-validation-message" style="display: flex;">Please enter reason.</div>');

      }
   }
  } ,
  mounted (){
    this.loadBookedServices();
  }
});
