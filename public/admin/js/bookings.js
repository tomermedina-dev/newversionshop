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
      get('/admin/services/booking/all/new-confirmed').then(function(response) {
        $( "#calendar_master .fc-day.fc-widget-content.fc-future" ).html('');
        t.bookedServicesList = response.data;
        t.bookedServicesList.forEach(function(e){
               $( "#calendar_master .fc-day.fc-widget-content.fc-future,#calendar_master .fc-day.fc-widget-content" ).each(function( index ) {

                 var calendar_date = $( this ).attr('data-date');
                 if (t.formatDate(e.bookingData.service_date_new)==calendar_date) {
                   $( this ).html(`
                  <a class='badge badge-warning text-left'>
                   <div class='markers'>`
                      +`Booking ID : `+
                      t.pad(e.bookingData.id)
                      +`<br>`+
                      e.bookingData.first_name +' ' + e.bookingData.last_name
                      +`<br>`+
                      e.bookingData.service_time_new
                   +`</div>
                   </a>`);
                 }

               });

             });
      }).catch(function(error) {
        swalWentWrong();
      });
    } ,
    formatDate : function (date) {
      var today = new Date(date);
      var dd = String(today.getDate()).padStart(2, '0');
      var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
      var yyyy = today.getFullYear();

      today = yyyy + '-' + mm + '-' + dd   ;
      return today;
    },
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
   setPaymentPaid : function(bookingId) {
      bookingId = this.pad(bookingId);
      const t = this;
      var data = {
        'serviceId' : bookingId
      };
      axios.post("/admin/services/booking/edit/payment" , data).
      then(function(response) {
        swalSuccess("Booking fee has been paid.");
        t.loadBookedServices();
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
   } ,
   changeStatus : function (status , id) {
     const t = this;
     var setStatus ;
     if (status == 0){
       setStatus = 1;
     }else{
       setStatus = 0 ;
     }
     var data = {
       'status' : setStatus ,
       'serviceId' : pad(id , 10)
     };
     swalLoading("Please wait..")
     axios.
     post("/admin/services/booking/edit/status" , data)
     .then(function(response) {
       swalSuccess("Booking has been confirmed.")
         t.loadBookedServices();
     }).catch(function(error) {
       swalWentWrong();
     }).finally(function(response) { });
   } ,
   showContainer : function (type) {
     if(type=='calendar'){
       $("#nv-booking-table").hide();
       $("#nv-booking-table-print").hide();
       $("#nv-booking-table-search").hide();
       $("#nv-booking-calendar").show();
     }else {
       $("#nv-booking-calendar").hide();
       $("#nv-booking-table").show();
       $("#nv-booking-table-print").show();
       $("#nv-booking-table-search").show();
     }
   }
  } ,
  mounted (){
    this.loadBookedServices();
  }
});
$('#calendar_master').fullCalendar({height  : 900});

$('.fc-prev-button').click(function(){
   bookedServices.loadBookedServices();
});

$('.fc-next-button').click(function(){
   bookedServices.loadBookedServices();
});
