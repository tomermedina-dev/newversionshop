$("#nav-login").addClass("active");

Vue.component('nv-component-login' , {
  data : function(){
    return {
      username : "" ,
      password : ""
    }
  } ,
  template : `<div class="container nv-login-form " style="width:70%;">
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
        <div class="d-flex flex-nowrap">
          <div class="order-1 p-2">  <button type="button" v-on:click="submitLogin" class="btn nv-btn-txt-white" name="button">Log Me in</button> </div>
          <div class="order-2 p-2 nv-horizontal-center">
            <div class="custom-control custom-checkbox  ">
              <input v-model="password" type="checkbox" class="custom-control-input" id="customCheck1">
              <!---<label class="custom-control-label" for="customCheck1">Remember Me</label>-->
              <a   href="/forgot"   class="badge text-black"  style="font-size: 1em;cursor:pointer;margin:1%;">Forgot Password?</a>
            </div>
          </div>

        </div>

      </div>
    </div>` ,
    methods : {
      submitLogin : function(){
        const t = this ;
        if(!t.username.trim() || !t.password.trim()){
          swalError("Please enter your username and password")
        }else{
          var formLogin = new FormData();
          formLogin.append('username' , t.username);
          formLogin.append('password' , t.password);
          axios.post('/users/login' ,formLogin ).then(function(response) {
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
      }
    }

} );
new Vue({el:"#nv-login"});
