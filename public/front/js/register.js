var formRegister = new FormData();
var captcha_val ;
var correctCaptcha = function(response) {captcha_val = response;};

var registerEmailErr = "";
var registerPassErr = "";
Vue.component('nv-component-register', {
  data: function()  {
    return {
      first_name : "" ,
      username : "" ,
      last_name : "" ,
      email : "" ,
      password : "" ,
      confirm_password: "" ,
      contact : "" ,
      address : "" ,
      terms  : ""
    }
  },
  template: `
  <div class="row">
    <div class="col-12">
      <div class="row">

        <div class="col-sm-6">
          <div class="form-group">
            <input v-model="first_name" type="text" class="form-control nv-input-custom"  id="first_name" placeholder="First Name">
          </div>
          <div class="form-group">
            <input v-model="username" type="text" class="form-control nv-input-custom" id="username" placeholder="Username">
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <input v-model="last_name" type="text" class="form-control nv-input-custom" id="last_name" placeholder="Last Name">
          </div>
          <div class="form-group">
            <input v-on:blur="validateEmail" v-model="email" type="text" class="form-control nv-input-custom" id="email" placeholder="Email Address">
            <small style="color:red;" id="err_email"></small>
          </div>
        </div>

        <div class="col-sm-12">
          <div class="form-group">
            <input v-on:blur="validatePassword" v-model="password" type="password" class="form-control nv-input-custom" id="password" placeholder="Password">
            <small style="color:red;" id="err_pass"></small>
          </div>
          <div class="form-group">
            <input v-model="confirm_password" type="password" class="form-control nv-input-custom" id="confirm_password" placeholder="Confirm Password">
          </div>

          <div class="form-group">
            <input v-model="contact" onkeypress="return isNumber(event)" type="text" class="form-control nv-input-custom" id="contact_no" placeholder="Contact No.">
          </div>
          <div class="form-group">
            <input v-model="address" type="text" class="form-control nv-input-custom" id="address" placeholder="Address">
          </div>
        </div>
      </div>
    </div>
      <div class="col-sm-6">
          <!--live : 6LeucJ0UAAAAABwS_ucAQsf4i2YqEYWhXr4pFVBg-->
          <!--Local : 6LdF3JoUAAAAAEPm-cs3kzNgfzSdrg5Cfu4MQVpK-->
        <div class="custom-control custom-checkbox  ">
          <input  v-model="terms" type="checkbox" class="custom-control-input" id="t_c_flag">
          <label class="custom-control-label" for="t_c_flag">  I agree to the <a href=""> Terms and Condition</a></label>
        </div>
        <input type="text" class="hidden_recaptcha required" name="hidden_recaptcha" id="hidden_recaptcha" required>
        <div class="g-recaptcha" data-sitekey="6LdF3JoUAAAAAEPm-cs3kzNgfzSdrg5Cfu4MQVpK"  data-callback="correctCaptcha"></div>
      </div>
      <div class="col-sm-6">
          <button v-on:click="register" style="float:right" type="button" class="btn nv-btn-txt-white" name="button">REGISTER</button>
      </div>
  </div>` ,
  methods : {
    register : function(){
      if (this.validateFields()){
        swalWarning(this.validateFields());
      }else{
        this.getFields();
        this.submitRegistration();
      }

    } ,
    submitRegistration : function(){
      swalLoading('Sending registration...');
      axios.post('/users/register',formRegister)
      .then(function(response){
        window.location.href = "/validate";
      })
      .catch(function (error) {
        swalWentWrong();
      }).finally(function (response) {});
      formRegister = new FormData();
    } ,
    getFields : function(){
      const t = this ;
      formRegister.append('username' , t.username);
      formRegister.append('password' , t.password);
      formRegister.append('first_name' , t.first_name);
      formRegister.append('last_name' , t.last_name);
      formRegister.append('email' , t.email);
      formRegister.append('contact' , t.contact);
      formRegister.append('address' , t.address);
    },
    validateFields : function() {
      if (!this.first_name){
        return "Please enter your first name.";
      }
      if (!this.last_name){
        return "Please enter your last name.";
      }
      if (!this.username){
        return "Please enter your username.";
      }
      if (!this.password){
        return "Please enter your password.";
      }
      if(this.password != this.confirm_password || !this.confirm_password){
       return "Those password didn't match.";
      }
      if (!this.contact){
        return "Please enter your contact number.";
      }
      if (!this.address){
        return "Please enter your address.";
      }
      if (!this.terms){
         return "You must first accept the terms and condition.";
      }
      if(!captcha_val){
        return "Please verify that you are not a robot.";
      }
      if (registerEmailErr == 1){
       return "That email address is already in use , please use a different email address.";
      }
      if (registerEmailErr == 2){
       return "Please enter valid email.";
      }
      if (registerPassErr == 1){
         return "Please enter atleast 6 character password.";
       }
    } ,
    validateEmail : function(){
      //alert(this.register_email);

      var formEmail = new FormData();
      formEmail.append('email' , this.email);

        if (this.validateEmailFormat(this.email)) {
              $("#err_email").text("");
                axios.post("/users/validate-email" , formEmail)
                  .then(function(response){
                    this.return = response.data ;
                    if (this.return == 1){
                      $("#err_email").text('That email address is already in use , please use a different email address.');
                      registerEmailErr = 1;
                    }else{
                      registerEmailErr = 0;
                      $("#err_email").text("");
                    }

                  }
                  )
                  .catch(function (error) {
                    console.log(error);
                  }).finally(function (response) {});
         } else {
           registerEmailErr = 2;
            $("#err_email").text("Please enter valid email");
         }
         return false;
    } ,
    validateEmailFormat : function(email){
      var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    } ,
    validatePassword : function(){
        if (this.password.length > 5){
          $("#err_pass").text("");
          registerPassErr = 0;
        }else{
          $("#err_pass").text("Please enter atleast 6 character password.");
          registerPassErr = 1;
        }
    }
  }
});
new Vue({ el: '#nv-register' });