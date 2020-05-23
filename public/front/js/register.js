var formRegister = new FormData();
var captcha_val ;
var correctCaptcha = function(response) {captcha_val = response;};
var generatedCode ;
var generateCodeEmail;
var registerEmailErr = "";
var registerPassErr = "";
var registerUsernameErr = "";
new Vue({
   el: '#nv-register' ,
   data :{
     first_name : "" ,
     username : "" ,
     last_name : "" ,
     email : "" ,
     password : "" ,
     confirm_password: "" ,
     contact : "" ,
     address : "" ,
     terms  : "" ,
     code : "" ,
     email_code : ""
   } ,
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
       axios.post('/user/register',formRegister)
       .then(function(response){
         window.location.href = "/cart";
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
       if (!this.code){
         return "Please enter verification code.";
       }
       // if (this.code != generatedCode){
       //   return "Invalid SMS code.";
       // }
       if(this.code_email != generateCodeEmail){
         return "Invalid Email verificaion code.";
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
       if(registerUsernameErr == 1){
         return "Username is already in use , please use a different username.";
       }
       if(registerUsernameErr == 2){
         return "Username must be 6 characters or more.";
       }
     } ,
     validateEmail : function(){
       //alert(this.register_email);

       var formEmail = new FormData();
       formEmail.append('email' , this.email);

         if (this.validateEmailFormat(this.email)) {
               $("#err_email").text("");
                 axios.post("/user/validate-email" , formEmail)
                   .then(function(response){
                     this.return = response.data ;
                     if (this.return == 1){
                       $("#err_email").text('Email address is already in use , please use a different email address.');
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
     validateUsername : function () {
       var formEmail = new FormData();
       formEmail.append('username' , this.username);
       console.log(this.username.length);
         if (this.username.length >= 6 ) {
               $("#err_username").text("");
                 axios.post("/user/validate-username" , formEmail)
                   .then(function(response){
                     this.return = response.data ;
                     if (this.return == 1){
                       $("#err_username").text('Username is already in use , please use a different username.');
                       registerUsernameErr = 1;
                     }else{
                       registerUsernameErr = 0;
                       $("#err_username").text("");
                     }
                   }
                   )
                   .catch(function (error) {
                     console.log(error);
                   }).finally(function (response) {});
          } else {
             registerUsernameErr = 2;
             $("#err_username").text("Username must be 6 characters or more.");
          }
          return false;
     },
     validateEmailFormat : function(email){
       return validateEmailFormat(email);
     } ,
     validatePassword : function(){
         if (this.password.length > 5){
           $("#err_pass").text("");
           registerPassErr = 0;
         }else{
           $("#err_pass").text("Please enter atleast 6 character password.");
           registerPassErr = 1;
         }
     },
     generateCode : function(){
       if (this.contact){
         swalLoading("Sending verificaion code. Please wait.");
         axios.get('/user/activation/generate').then(function(response) {
           swalSuccess("Verification code has been sent.");
           generatedCode = response.data;
           $("#nv-btn-sms-code").text("Re-send SMS verificaion code");
           $("#code").show();
         }).catch(function(error) {
             swalWentWrong();
         }).finally(function (response) {});;
       }else{
         swalError("Please enter your contact number first.");
       }
     } ,
     generateEmailCode : function() {
       if (this.email){
         swalLoading("Sending verificaion code. Please wait.");
         axios.get('/mail/validation/'+this.email).then(function(response) {
           swalSuccess("Verification code has been sent to your email.");
           generateCodeEmail = response.data;
           $("#nv-btn-email-code").text("Re-send Email verificaion code");
           $("#code_email").show();
         }).catch(function(error) {
             swalWentWrong();
         }).finally(function (response) {});;
       }else{
         swalError("Please enter your email address first.");
       }
     }
   }
 });
