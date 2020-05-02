var bookingDetails = new FormData();
var bookingForm = new
  Vue({
    el : "#nv-booking-form" ,
    data : {
      first_name : '' ,
      last_name: '' ,
      email : '' ,
      contact : '' ,
      address : '' ,
      unit : '' ,
      date : '' ,
      time : '' ,
      notes : '' ,
      units  : '' ,
      selectedUnit : []
    } ,
    methods : {
      getFieldValue : function () {
        const t = this;
        bookingDetails.append('service_id',pad(serviceId , 10));
        bookingDetails.append('user_id' , userId);
        bookingDetails.append('first_name' , t.first_name);
        bookingDetails.append('last_name' , t.last_name );
        bookingDetails.append('email' ,t.email );
        bookingDetails.append('contact' ,  t.contact);
        bookingDetails.append('address' , t.address);
        bookingDetails.append('unit' , t.selectedUnit );
        bookingDetails.append('date' , t.date );
        bookingDetails.append('time' , t.time);
        bookingDetails.append('notes' , t.notes );
      },
      submitBooking : function () {
        var err ;
        const t = this;

        var enteredDate = $("#service_date").val();
        t.date = enteredDate;
        if(!t.first_name.trim()){
          swalWarning("Please enter your first name");
          err = 1 ;
        }
        if(!t.last_name.trim()){
          swalWarning("Please enter your last name");
          err = 1 ;
        }
        if(!t.email.trim()){
          swalWarning("Please enter your email");
          err = 1 ;
        }
        if(!t.contact.trim()){
          swalWarning("Please enter your contact no.");
          err = 1 ;
        }
        if(!t.address.trim()){
          swalWarning("Please enter your address");
          err = 1 ;
        }
        if(!t.date.trim()){
          swalWarning("Please enter service date");
          err = 1 ;
        }
        if(!t.time.trim()){
          swalWarning("Please enter service time");
          err = 1 ;
        }
        if(t.selectedUnit.length == 0){
          swalWarning("Please select your unit");
          err = 1;
        }
        if(err != 1 ) {
          t.getFieldValue();
          axios.
          post('/services/booking/new',bookingDetails).
          then(function(response) {

          }).catch(function(error) {
            swalWentWrong();
          });
        }

      }
      ,
      setAddress : function() {
        const t = this;
        axios.
        get('/user/address/default/'+userId).
        then(function (response) {
          var responseData = response.data;
          t.address = response.data.address_details
        }).catch(function(error) {
          swalWentWrong();
        });
      } ,
      setUserDetails : function() {
        const t = this;
        axios.
        get('/user/profile/details/'+userId).
        then(function (response) {
          var responseData = response.data;
          t.first_name = responseData.first_name;
          t.last_name = responseData.last_name;
          t.contact = responseData.contact_num;
          t.email = responseData.email;
        }).catch(function(error) {
          console.log(error);
          swalWentWrong();
        });

      }  ,
      setUserUnits : function () {
        const t = this;
        axios.
        get('/user/profile/unit/details/'+userId).
        then(function (response) {
           t.units = response.data;

        }).catch(function(error) {
          console.log(error);
          swalWentWrong();
        });
      } ,
      selectUnit : function (unitId) {
        unitId = pad(unitId , 10);
        const t = this;
        t.selectedUnit = unitId;
      }
    }
  });
bookingForm.setAddress();
bookingForm.setUserDetails();
bookingForm.setUserUnits();
function available(date) {
   var current_date = new Date();
    if (date<current_date) {
       return [false,"",""];
    }else{
       return [true, "",""];
    }
 }
$('#service_date').datepicker({ beforeShowDay: available });
