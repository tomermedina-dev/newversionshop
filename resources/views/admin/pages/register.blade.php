<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Version Shop - Employee Registration</title>
    @include('front.includes.resources-header')
  </head>
  <style media="screen">
    .col-sm-6{
      padding: 3px;
    }
  </style>
  <body>
    <div class="container">
      <div class="d-flex justify-content-center" id="employee-register-content">
          <div class="container " style="padding:5%;margin-top:10%;">
              <div class="row" id="nv-login">
                  <div class="nv-container-left col-sm-5 container shadow-lg p-3 mb-5 nv-bg-dark" style="padding:2%;">
                      @include('front.user.details')
                      <br>
                      <div class="d-flex justify-content-center">
                          <a href="/admin/page/login" class="btn nv-btn-mustard" name="button">Go to Admin Login</a>
                      </div>
                  </div>
                  <div class="nv-container-right col-sm-7 shadow-lg p-3 mb-5 white-bg" style="padding:2%;">
                      <br>
                      <div class="d-flex justify-content-center">
                          <div class="nv-dot-dark"></div>
                          <div class="nv-dot-mustard" style="margin-left:-25px;"></div>
                      </div>
                      <br>
                      <br>
                      <div class="d-flex justify-content-center ">
                          <h1>Register</h1>
                      </div>

                      <div class="">
                          <div class="nv-line-divider d-flex justify-content-center"></div>
                          <div class=" d-flex justify-content-center">
                              <div class="nv-mustard-divider" style="width:50px; margin-top:-3.5px;"></div>
                          </div>
                      </div>
                      <br>

                      <div class="d-flex justify-content-center " style="margin-top:20px;">
                          <div class="row">
                              <div class="col-12">
                                  <div class="row">

                                      <div class="col-sm-12">
                                          <div class="form-group">
                                              <input v-model="first_name" type="text" class="form-control nv-input-custom" id="first_name" placeholder="First Name">
                                          </div>
                                          <div class="form-group">
                                              <input v-model="last_name" type="text" class="form-control nv-input-custom" id="last_name" placeholder="Last Name">
                                          </div>
                                          <div class="form-group">
                                              <input v-model="username" type="text" class="form-control nv-input-custom" id="username" placeholder="Username">
                                          </div>
                                      </div>

                                      <div class="col-sm-12">

                                          <!-- <div class="form-group">
                                              <input   v-model="email" type="text" class="form-control nv-input-custom" id="email" placeholder="Email Address">
                                              <small style="color:red;" id="err_email"></small>
                                          </div> -->
                                      </div>

                                      <div class="col-sm-12">
                                          <div class="form-group">
                                              <input v-on:blur="validatePassword" v-model="password" type="password" class="form-control nv-input-custom" id="password" placeholder="Password">
                                              <small style="color:red;" id="err_pass"></small>
                                          </div>
                                          <div class="form-group">
                                              <input v-model="confirm_password" type="password" class="form-control nv-input-custom" id="confirm_password" placeholder="Confirm Password">
                                          </div>
                                          <!-- <div class="form-group">
                                              <input v-model="address" type="text" class="form-control nv-input-custom" id="address" placeholder="Address">
                                          </div>
                                          <div class="form-group">
                                              <input v-model="contact" onkeypress="return isNumber(event)" type="text" class="form-control nv-input-custom" id="contact_no" placeholder="Contact No.">
                                          </div> -->


                                      </div>
                                  </div>
                                  <button v-on:click="register" style="float:right" type="button" class="btn btn-md nv-btn-txt-white" name="button">REGISTER</button>
                              </div>


                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <script src="{{ asset('admin/js/register.js') }}" ></script>
  </body>
@include('front.includes.resources-footer')
</html>
