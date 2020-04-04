Vue.component('nv-component-forgot' , {
  data : function () {
    return {
      email : ""
    }
  } ,
  template : `<div>
    <div class="form-group">
      <div class="input-group-prepend">
         <input v-model="email" type="text" class="left form-control nv-input-custom" id="username" placeholder="Enter your contact number">
       </div>
    </div>
    <div class="container d-flex justify-content-center">
      <div class="d-flex flex-nowrap">
        <div class="order-1 p-2">
          <button  v-on:click="submitForgot" type="button" class="btn nv-btn-txt-white btn-submit-forgot" name="button">Submit</button>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label>Enter your email</label>
      <div class="input-group-prepend">
         <input v-model="email" type="text" class="left form-control nv-input-custom" id="username" placeholder="Enter your contact number">
       </div>
    </div>
    <div class="form-group">
      <label>Enter verification code</label>
      <div class="input-group-prepend">
         <input v-model="email" type="text" class="left form-control nv-input-custom" id="username" placeholder="Enter your contact number">
       </div>
    </div>
  </div>` ,
  methods : {
    submitForgot : function() {
      const  t = this;
      if(t.email){
          if (validateEmailFormat(t.email)) {
            swalLoading("Validating email.. Please wait");
            var formForgot = new FormData();
            formForgot.append('email' , t.email);
            axios.post("/users/forgot-password" ,formForgot).then(function(response) {
              var data = response.data ;

              if (data == 1){
                swalSuccess("Success")
              }else {
                swalError("Email not found.")
              }
            }).catch(function (error) {}).finally(function (response) {

            });
          }else{
            swalError("Please enter valid email format.");
          }
      }else {
        swalError("Please enter email address");
      }
    }
  }
});
new Vue({el : "#nv-forgot"})
