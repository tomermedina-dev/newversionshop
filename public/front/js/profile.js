var currentUsername = "";
var errUsername ,errEmail  , errPassword;
var formUpdate = new FormData();
var profileDetails = new Vue({
    el : ".nv-profile-content" ,
    data : {
      profileDetails : [] ,
      addressDetails : [] ,
      unitDetails : [] ,
      first_name : "" ,
      last_name : "" ,
      username : "" ,
      contact : "" ,
      email : ""  ,
      new_password : "" ,
      old_password : "" ,
      errPassword : "" ,
      err : ""  ,
      address : "" ,
      notes : " " ,
      brand : "" ,
      model : "" ,
      plateNumber : "" ,
      vin : ""
    } ,
    methods : {
      loadProfileDetails : function() {
        const t = this;
        axios.
        get('/user/profile/details/'+userId).
        then(function (response) {
          t.profileDetails = response.data;
          t.first_name = t.profileDetails.first_name;
          t.last_name = t.profileDetails.last_name;
          t.username = t.profileDetails.username;
          t.contact = t.profileDetails.contact_num;

          currentUsername = t.username;
        }).catch(function(error) {
          swalWentWrong(error);
        }).finally(function () {

        });
      } ,
      loadAddressDetails : function() {
        const t = this;
        axios.
        get('/user/profile/address/details/'+userId).
        then(function (response) {
          t.addressDetails = response.data;
          if(t.addressDetails.length > 0){
            t.address = t.addressDetails[0].address_details ;
            t.notes = t.addressDetails[0].notes;
          }

        }).catch(function(error) {
          swalWentWrong(error);
        }).finally(function () {

        });
      } ,
      loadUnitsDetails : function() {
        const t = this;
        axios.
        get('/user/profile/unit/details/'+userId).
        then(function (response) {
          t.unitDetails = response.data;
        }).catch(function(error) {
          swalWentWrong(error);
        }).finally(function () {

        });
      },
      updateProfile : function(action) {
        console.log(action);
        const t = this ;
        formUpdate.append('id' , userId);
        formUpdate.append('action' , action);
        if(action == "update-personal"){
          if(errUsername){
            swalError("Username already in use. Please try another.");
            t.err = 1;
          }
          if(!t.first_name.trim()){
            swalError("Please enter first name");
            t.err = 1;
          }
          if(!t.last_name.trim()){
            swalError("Please enter last name");
            t.err = 1;
          }
          if(!t.contact.trim()){
            swalError("Please enter contact number");
            t.err = 1;
          }

          formUpdate.append('username' , t.username);
          formUpdate.append('first_name' , t.first_name);
          formUpdate.append('last_name' , t.last_name);
          formUpdate.append('contact_num' , t.contact);
          if(t.err != 1){
            t.submitChanges();
          }
        }
        if(action == "update-email"){
            if(!t.email.trim()){
              swalError("Please enter email address");
              t.err = 1;
            }
            if(errEmail == 1){
              swalError("That email address is already in use , please use a different email address.");
              t.err = 1;
            }
            if(errEmail == 2){
              swalError("Please enter valid email address.");
              t.err = 1;
            }
            formUpdate.append('email' , t.email);
            if(t.err != 1){
              t.submitChanges();
            }
        }
        if(action == "update-password"){
          formUpdate.append('old_password' , t.old_password);
          formUpdate.append('new_password' , t.new_password);

          if(!t.new_password.trim()){
            swalError("Please enter new password");
            t.err = 1;
          }

          if(!t.old_password.trim()){
            swalError("Please enter old password");
            t.err = 1;
          }

          if(t.err != 1 ){
            t.validateOldPassword();
          }
        }
        if(action == "update-address"){
          formUpdate.append('address' , t.address);
          formUpdate.append('notes' , t.notes == null ? ' '  : t.notes);
          if(!t.address.trim()){
            swalError("Please enter address");
            t.err = 1;
          }
          if(t.err != 1 ){
            t.submitChanges();
            profileDetails.loadAddressDetails();
            $("#editProfileAddress").modal('hide');
          }
        }
      } ,
      validateUsername : function() {
        const t = this ;
        if (currentUsername != t.username){
          axios.
          post('/user/profile/username/validate' , {'username' : t.username}).
          then(function(response) {
            if(response.data == 1){
              $("#err_username").text("Username already in use. Please try another.")
              errUsername = "1" ;
            }else{
              $("#err_username").text("")
              errUsername = "";
            }
          }).catch(function(error) {
            swalWentWrong(error);
          }).finally(function(response){})
        }

      } ,
      validateEmailFormat : function(email){
        return validateEmailFormat(email);
      } ,
      validateEmail : function(){
        //alert(this.register_email);
        const t = this;
        var formEmail = new FormData();
        formEmail.append('email' , t.email);

          if (this.validateEmailFormat(t.email)) {
                $("#err_email").text("");
                  axios.post("/user/validate-email" , formEmail)
                    .then(function(response){
                      this.return = response.data ;
                      if (this.return == 1){
                        $("#err_email").text('That email address is already in use , please use a different email address.');
                        errEmail = 1;
                      }else{
                        errEmail = 0;
                        $("#err_email").text("");
                      }
                    }
                    )
                    .catch(function (error) {
                      console.log(error);
                    }).finally(function (response) {});
           } else {
              errEmail = 2;
              $("#err_email").text("Please enter valid email");
           }
           return false;
      } ,
      validateOldPassword : function() {
        swalLoading("Validating old password.. Please wait..")
        const t = this;
        var formPassword = new FormData();
        formPassword.append('id' , userId);
        formPassword.append('old_password' , t.old_password);
        var validate ;
        axios.
        post("/user/profile/old-password/validate" , formPassword).
        then(function(response) {
          if(response.data == 0){
            swalError("Password dont match.");

          }else{
            t.submitChanges();
          }
        }).catch(function(error) {
          swalWentWrong(error);
        }).finally(function () {});

      } ,
      submitChanges : function() {
        swalLoading("Saving changes.. Please wait.")
        axios.
        post("/user/profile/details/update" , formUpdate).
        then(function(response) {
          swalSuccess("Changes has been saved.")
          profileDetails.loadProfileDetails();
        }).catch(function (error) {
          swalWentWrong(error);
        }).finally(function () {});
        formUpdate = new FormData();
        $("#editProfileDetails").modal('hide');
      } ,
      createNewUnit : function() {
        const t = this;
        var formUnitDetails = new FormData();
        formUnitDetails.append('user_id' , userId);
        formUnitDetails.append('car_brand' , t.brand);
        formUnitDetails.append('model' , t.model);
        formUnitDetails.append('vin' , t.vin);
        formUnitDetails.append('plate_number' , t.plateNumber);
        swalLoading("Saving new unit.. Please wait..")
        if(!t.brand.trim() || !t.model.trim() || !t.vin.trim()  || !t.plateNumber.trim()){
          swalError("Please fill all fields.");
        }else{
          axios.
          post("/user/profile/unit/new" , formUnitDetails).
          then(function(response) {
            swalSuccess("New unit has been added.")
            profileDetails.loadUnitsDetails();
            $("#addProfileUnits").modal('hide');
          }).catch(function(error) {
            swalWentWrong(error);
          }).finally(function(response) {
          });
        }
      },
      deleteUnit : function(unitId) {
          Swal.fire({
            title: 'Are you sure you want to delete this unit?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.value) {
              axios.
              get("/user/profile/unit/delete/"+pad(unitId,10)).
              then(function(response) {
                swalSuccess("Unit has been deleted.")
                profileDetails.loadUnitsDetails();

              }).catch(function(error) {
                swalWentWrong(error);
              }).finally(function(response) {
              });
            }
          })
      }
    }
  });
profileDetails.loadProfileDetails();
profileDetails.loadAddressDetails();
profileDetails.loadUnitsDetails();
setUserFullName();
