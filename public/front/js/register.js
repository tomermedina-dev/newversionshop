var formRegister = new FormData();
var captcha_val ;
var correctCaptcha = function(response) {captcha_val = response;};
var generatedCode ;
var generateCodeEmail;
var registerEmailErr = "";
var registerPassErr = "";
var registerUsernameErr = "";
var validationFor = '';
 var chkr = 0 ;
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
     email_code : "" ,
     confirm_email : "" ,
     carBrand : "",
     carModel : "" ,
     carVin : "" ,
     carPlate : ""
   } ,
   methods : {
     next : function () {
       if (this.validateFields()){
         swalWarning(this.validateFields());
       }else{
         $(".page-1").hide();
         setTimeout( $(".page-2").show(), 3000);
       }
     } ,
     previous : function () {
       $(".page-2").hide();
       setTimeout( $(".page-1").show(), 3000);
     },
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
     register : function(){
       if(validationFor != ''){
         if (this.validateFields()){
           swalWarning(this.validateFields());
         }else if(this.validateFieldsFinal()){
           swalWarning(this.validateFieldsFinal());
         }else{
           this.getFields();
           this.submitRegistration();
         }
       }else {
         swalError("Please select validation method.")
       }
     } ,
     submitRegistration : function(){
       swalLoading('Saving registration...');
       axios.post('/user/register',formRegister)
       .then(function(response){
         window.location.href = "/user/profile";
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
       if(this.carModel || this.carBrand || this.carModel || this.carVin){
         formRegister.append('carModel' , t.carModel);
         formRegister.append('carBrand' , t.carBrand);
         formRegister.append('carPlate' , t.carPlate);
         formRegister.append('carVin' , t.carVin);
       }
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
       if(!this.email)
       if (!this.confirm_email){
         return "Please enter email address.";
       }
       if (this.confirm_email != this.email){
         return "Email address is not the same.";
       }
       if (!this.contact){
         return "Please enter your contact number.";
       }
       if (!this.password){
         return "Please enter your password.";
       }
       if(this.password != this.confirm_password || !this.confirm_password){
        return "Those password didn't match.";
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



     },
     validateFieldsFinal : function () {
       var unitValMsg = "Please populate all unit details fields or leave all fields blank.";

       if(this.carBrand.trim() && this.carModel.trim() && this.carVin.trim() && this.carPlate.trim()){
         chkr = 2;
       }
       if(!this.carBrand.trim() && !this.carModel.trim() && !this.carVin.trim() && !this.carPlate.trim()){
         chkr = 2;
       }

       if(chkr == 0 ){
         if(!this.carVin.trim()){
           return unitValMsg ;
         }
         if(!this.carBrand.trim() ){
           return unitValMsg ;
         }
         if(!this.carModel.trim()){
           return unitValMsg ;
         }
         if(!this.carPlate.trim()){
           return unitValMsg ;
         }
       }

       chkr = 0;


       if(validationFor == 'sms'){
         if (!this.code){
           return "Please enter verification code.";
         }
         if (this.code != generatedCode){
           return "Invalid SMS code.";
         }
       }else {
         if(!this.email_code){
           return "Please enter email verificaion code.";
         }
         if(this.email_code != generateCodeEmail){
           return "Invalid Email verificaion code.";
         }
       }



       if (!this.terms){
          return "You must first accept the terms and condition.";
       }
       if(!captcha_val){
         return "Please verify that you are not a robot.";
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
       validationFor = 'sms';
       if (this.contact){
         swalLoading("Sending verificaion code. Please wait.");
         axios.get('/user/activation/generate').then(function(response) {
           swalSuccess("Verification code has been sent.");
           generatedCode = response.data;
           $("#nv-verify").hide();
           $("#nv-btn-sms-code").text("Re-send SMS verificaion code");
           $(".nv-sms-code").show();
           $(".nv-confirm").show();
           $("#nv-btn-signup").css('display' , 'inline-grid');
         }).catch(function(error) {
             swalWentWrong();
         }).finally(function (response) {});;
       }else{
         swalError("Please enter your contact number first.");
       }
     } ,
     generateEmailCode : function() {
       validationFor = 'email';
       if (this.email){
         swalLoading("Sending verificaion code. Please wait.");
         axios.get('/mail/validation/'+this.email).then(function(response) {
           swalSuccess("Verification code has been sent to your email.");
           generateCodeEmail = response.data;
           $("#nv-verify").hide();
           $("#nv-btn-email-code").text("Re-send Email verificaion code");
           $(".nv-email-code").show();
           $(".nv-confirm").show();
            $("#nv-btn-signup").css('display' , 'inline-grid');
         }).catch(function(error) {
             swalWentWrong();
         }).finally(function (response) {});;
       }else{
         swalError("Please enter your email address first.");
       }
     }
   }
 });
