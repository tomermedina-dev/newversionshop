$("#nav-login").addClass("active");

var login = new Vue({
  el:"#nv-login" ,
  data : {
    username : "" ,
    password : ""
  } ,
  methods : {
    submitLogin : function(){
      const t = this ;
      if(!t.username.trim() || !t.password.trim()){
        swalError("Please enter your username and password")
      }else{
        swalLoading("Logging in.. Please wait..")
        var formLogin = new FormData();
        formLogin.append('username' , t.username);
        formLogin.append('password' , t.password);
        axios.post('/user/login' ,formLogin ).then(function(response) {
          var response = response.data;

          if(response == 1){

            window.location.href = '/user/profile';
          }else {
            swalError(response);
          }
        }).catch(function (error) {
          swalWentWrong();
        }).finally(function(response){});
      }
    } ,
    showPassword : function() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    } ,
    forgotPasswordPop : function() {
      Swal.fire({
        showConfirmButton : false ,
        showCloseButton: true,
        allowEscapeKey : false,
        allowOutsideClick : false ,
        html : `<div class='container'>
                  <div class="d-flex justify-content-center">
                    <div class="nv-dot-dark"  ></div>
                    <div class="nv-dot-mustard" style="margin-left:-25px;" ></div>
                  </div>
                  <h3> <i> Forgot Password </i> </h3>
                  <div class="">
                    <div class="nv-line-divider d-flex justify-content-center" ></div>
                    <div class=" d-flex justify-content-center">
                      <div class="nv-mustard-divider" style="width:50px; margin-top:-3.5px;"></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="float-left">Enter your registered email address</label>
                    <input    class="nv-input-custom form-control " id="email_forgot" type="text" >
                  </div>

                  <a onclick="login.submitForgot()" class="btn btn-sm nv-btn-txt-white w-100 text-white" >SUBMIT </a>
                  <br>
                  <div class="nv-error-msg">
                  </div>
                </div>` ,

      });
    } ,
    submitForgot : function() {
      var email = $("#email_forgot").val();
      if(!email.trim()){
        $(".nv-error-msg").append('<br><div class="swal2-validation-message" id="swal2-validation-message" style="display: flex;">Please enter your email address.</div>');
      }else {
        $(".nv-error-msg").empty();

        if (this.validateEmailFormat(email)) {
          $(".nv-error-msg").append('<br><div class="swal2-validation-message" id="swal2-validation-message" style="display: flex;">Validating email. Please wait..</div>');
          var data = {
            'email':email
          };
          axios.post('/user/forgot-password' , data).
          then(function(response) {

            $(".nv-error-msg").empty();
            if(response.data == 0){
                $(".nv-error-msg").append(`<br><div class="swal2-validation-message" id="swal2-validation-message" style="display: flex;">Email address doesn't exists. </div>`);
            }else{
              // swalSuccess("We sent the reset link to your email : " + email);
              window.location.href="/user/accounts/forgot-password/" +email+'/'+ response.data;
            }
          }).catch(function(error) {
            swalWentWrong(error);
          });
        }else {
          $(".nv-error-msg").append('<br><div class="swal2-validation-message" id="swal2-validation-message" style="display: flex;">Please enter valid email address.</div>');
        }
      }
    },
    validateEmailFormat : function(email){
      return validateEmailFormat(email);
    }
  }
});
