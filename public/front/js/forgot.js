new Vue({
  el : "#nv-forgot" ,
  data : {
    newPassword : '' ,
    newconfirmPassword : '' ,
    validationCode: ''
  } ,
  methods : {
    submitReset : function () {
      const t = this;
      var err;

      if(!t.newPassword || !t.newconfirmPassword || !t.validationCode){
        swalError("Please populate all fields.");
        err = 1;
      }
      if(t.newPassword != t.newconfirmPassword){
        swalError("Password is not the same.");
        err = 1;
      }
      if(!t.validatePassword()){
        swalError("Please enter atleast 6 character password.");
        err = 1;
      }
      if(!err){
        var data = {
          'password' : t.newPassword ,
          'code' : t.validationCode
        };
        swalLoading("Sending password reset.. Please wait..")
        axios.post('/user/accounts/reset' , data).
        then(function(response) {
          if(response.data == '0'){
            swalError("Invalid validation code.");
          }else{

            Swal.fire({
              showConfirmButton : false ,
              allowEscapeKey : false,
              allowOutsideClick : false ,
              html : `<div class='container'>
                        <div class="d-flex justify-content-center">
                            <i class="far fa-check-circle" style="font-size:5em;"></i>
                        </div>
                        <h1>Your password has been changed.</h1>

                        <a href="/signin" class="btn btn-lg nv-btn-txt-white w-100 text-white" >Sign in now </a>

                      </div>` ,

            });
          }
        }).catch(function(error) {
          swalWentWrong(error);
        });
      }

    } ,
    showPassword : function() {
      var x = document.getElementById("password");
      var y = document.getElementById("confirm_password");
      if (x.type === "password") {
        x.type = "text";
        y.type = "text";
      } else {
        x.type = "password";
        y.type = "password";
      }
    } ,
    validatePassword : function(){
        if (this.newPassword.length < 6){
          swalError("Please enter atleast 6 character password.");
          return false;
        }
        return true;
    } ,

  }
});
