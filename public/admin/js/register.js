var formRegister  = new FormData();
new Vue({
  el : "#employee-register-content" ,
  data  : {
    first_name : "" ,
    username : "" ,
    last_name : "" ,
    email : "" ,
    password : "" ,
    confirm_password: "" ,
    contact : "" ,
    address : "" ,
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
      axios.post('/admin/employee/register',formRegister)
      .then(function(response){
        window.location.href = "/admin/dashboard/home";
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
      // if (!this.contact){
      //   return "Please enter your contact number.";
      // }
      //
      //
      // if (!this.address){
      //   return "Please enter your address.";
      // }



      if (registerPassErr == 1){
         return "Please enter atleast 6 character password.";
      }
    } ,
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
  }
})
