@extends('front.layout.main')

@section('content')
<title>New Version - Sign in </title>
<div class="container">

    <div class="d-flex justify-content-center" >
      <div class="container "  style="padding:5%;">
        <div class="row"  id="nv-login">
          <div  class="nv-container-left col-sm-5 container shadow-lg p-3 mb-5 nv-bg-dark" style="padding:2%;">
              @include('front.user.details')
              <br>
              <div class="d-flex justify-content-center">
                <a href="/register" class="btn nv-btn-mustard" name="button">Sign up</a>
              </div>

              <!-- <div class="d-flex justify-content-center">
                <img style="float:right;" width="150px" src="{{ asset('images/logo_transpa.png') }}" />
              </div> -->
            </div>
          <div class="nv-container-right col-sm-7 shadow-lg p-3 mb-5 white-bg" style="padding:2%;">
              <br>
              <div class="d-flex justify-content-center">
                <div class="nv-dot-dark"  ></div>
                <div class="nv-dot-mustard" style="margin-left:-25px;" ></div>
              </div>
              <br>
              <br>
              <div class="d-flex justify-content-center ">
                  <h1>Sign in</h1>
              </div>

               <div class="">
                 <div class="nv-line-divider d-flex justify-content-center" ></div>
                 <div class=" d-flex justify-content-center">
                   <div class="nv-mustard-divider" style="width:50px; margin-top:-3.5px;"></div>
                 </div>
               </div>
               <br>

              <div class="d-flex justify-content-center " style="margin-top:20px;">
                <div class="container nv-login-form " style="width:85%;">
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
                        <input  v-on:keyup.enter="submitLogin" v-model="password" type="password" class="form-control nv-input-custom" id="password" placeholder="Enter your password">
                       </div>
                    </div>
                    <div class="custom-control custom-checkbox ">
                         <input v-on:click="showPassword" type="checkbox" class="custom-control-input" id="customCheck1">
                       <label class="custom-control-label" for="customCheck1">Show Password</label>
                    </div>
                    <div class="row mt-2">
                      <div class="col-lg-8 col-sm-12">
                        <button type="button" v-on:click="submitLogin" class="btn btn-md nv-btn-txt-white w-100 float-left" name="button">Enter</button>
                      </div>
                      <div class="col-lg-4">
                      <a  v-on:click="forgotPasswordPop"  class="badge text-black float-right"  style="font-size: 1em;cursor:pointer;margin:1%;">Forgot Password?</a>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    <script src="{{ asset('front/js/login.js') }}" ></script>

</div>
<style media="screen">
  .nv-footer {
    margin-top: 0 !important;
  }
</style>
@endsection
