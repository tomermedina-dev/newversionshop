Vue.component('nv-component-login' , {
  data : function(){
    return {
      username : "" ,
      password : ""
    }
  } ,
  template : `
  <div class="container nv-login-form " style="width:70%;">
      <label for="username"  >Username</label>
      <div class="form-group">
        <div class="input-group-prepend">
           <span class="input-group-text nv-input-icon-plain"   ><i class="left fa fa-user-circle text-black"aria-hidden="true"></i></span>
           <input v-model="username" type="text" class="left form-control nv-input-custom" id="username" placeholder="Enter your username">
         </div>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <div class="input-group-prepend">
           <span class="input-group-text nv-input-icon-plain"   ><i class="left fa fa-lock text-black"aria-hidden="true"></i></span>
          <input v-model="password" type="password" class="form-control nv-input-custom" id="password" placeholder="Enter your password">
         </div>
      </div>
      <div class="container d-flex justify-content-center">
        <button type="button" v-on:click="submitLogin" class="btn nv-btn-txt-white" name="button">Log in</button>
      </div>
    </div>` ,
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
          axios.post('/admin/login' ,formLogin ).then(function(response) {
            var response = response.data;

            if(response == 1){
              window.location.href = "/admin/dashboard/home";
            }else {
              swalError(response);
            }
          }).catch(function (error) {
            swalWentWrong();
          }).finally(function(response){});
        }
      }
    }

} );
new Vue({el:"#nv-login"});
