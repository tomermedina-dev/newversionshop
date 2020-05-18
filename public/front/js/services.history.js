var submitRequest = new Vue({
  el : "#nv-services-list" ,
  data : {
    currentDate : ''
  } ,
  methods : {
    changeSchedule : function(serviceId) {
      serviceId = this.pad(serviceId);
       Swal.fire({
         showConfirmButton: false,
         allowEscapeKey : false ,
         allowOutsideClick : false ,
         showCloseButton : true ,
         html: `
         <style>
          .datepicker.dropdown-menu{
            z-index:9999999 !important;
          }
        </style>
         <div class="p-2">
            <h3 class="nv-font-bc">Request re-schedule </h3>
            <h4 class="float-left" >Service ID : `+serviceId+` </h4>
            <br>
            <br>
           <div class="form-group">
             <label class="float-left">Service Date</label>
             <input data-date-format="mm/dd/yyyy"   class="nv-input-custom form-control datepicker" id="new_service_date" type="text" >
           </div>
           <div class="form-group">
             <label class="float-left">Time</label>
             <select    class="nv-input-custom form-control" id="new_service_time"  >
               <option value="08:00  AM">08:00  AM</option>
               <option value="09:00  AM">09:00  AM</option>
               <option value="10:00 AM">10:00 AM</option>
               <option value="11:00 AM">11:00 AM</option>
               <option value="01:00  PM">01:00  PM</option>
               <option value="02:00  PM">02:00  PM</option>
               <option value="03:00  PM">03:00  PM</option>
               <option value="04:00  PM">04:00  PM</option>
             </select>
           </div>
           <div class="form-group">
             <label class="float-left">Reason</label>
             <input    class="nv-input-custom form-control" id="reason" type="text" >
           </div>
           <button  onclick="submitRequest.submitRequest( `+serviceId+` )"    type="button" class="float-left btn nv-btn-txt-white nv-font-bc" >
             Submit Request re-schedule
           </button>
           <br>
           <div class="nv-error-msg">
           </div>
         </div>
         `
       })
       this.initDate();
    } ,
    submitRequest : function (serviceId) {
      var date = $("#new_service_date").val();
      var time = $("#new_service_time").val();
      var reason = $("#reason").val();
      var err;
      $(".nv-error-msg").empty();
      if(!date){
        $(".nv-error-msg").append('<br><div class="swal2-validation-message" id="swal2-validation-message" style="display: flex;">Please enter date.</div>');
        err = 1;
      }
      if(!time){
        $(".nv-error-msg").append('<br><div class="swal2-validation-message" id="swal2-validation-message" style="display: flex;">Please enter time.</div>');
        err = 1;
      }
      if(!reason){
        $(".nv-error-msg").append('<br><div class="swal2-validation-message" id="swal2-validation-message" style="display: flex;">Please enter reason.</div>');
        err = 1;
      }

      if(err != 1){
        var data ={
          'booking_id' : pad(serviceId,10) ,
          'date' : date ,
          'time' : time ,
          'reason' : reason
        };
        swalLoading("Submitting request.. Please wait..")
        axios.post('/services/booking/change/date' , data).
        then(function (response) {
          swalSuccess("Request has been submitted.");
          window.setTimeout(window.location.href = '/user/services/history', 2500);
        }).catch(function (error) {
          swalWentWrong(error);
        });
      }


    } ,
    pad : function (value) {
      return pad(value , 10);
    } ,
    initDate : function() {
      function available(date) {
         var current_date = new Date();
          if (date<current_date) {
             return [false,"",""];
          }else{
             return [true, "",""];
          }
       }
      $('#new_service_date').datepicker({ beforeShowDay: available });

    } ,
    getDateDiff : function (date ){
      if(!isFutureDate(date)){
        return 0;
      }else{
        return getDateDiff(  date , this.currentDate   );
      }

    }

  },
  mounted(){
    this.currentDate = getCurrentDate();

  }
})
