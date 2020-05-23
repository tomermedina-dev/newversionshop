@extends('front.layout.main')
@section('content')
@php
  $captcha = App\Http\Controllers\Admin\ConfigController::setCaptchaConfig();
@endphp
<div class="container">
<style media="screen">
  .g-recaptcha > div { margin: 0 auto;}
  .hidden_recaptcha { visibility: hidden;}
  .col-sm-6{
    padding: 3px;
  }
</style>
<title>New Version - Register</title>
  <div class="d-flex justify-content-center" id="nv-register">
      <div class="container " style="padding:5%;">
        <div class="row ">
          <div class="nv-container-left  container col-sm-5 shadow-lg p-3 mb-5 nv-bg-dark" style="padding:2%;">
              @include('front.user.details')
              <br>
            <div class="d-flex justify-content-center">
              <a href="/login" class="btn nv-btn-mustard" name="button">Log In</a>
            </div>
          </div>
          <div class="nv-container-right col-sm-7 shadow-lg p-3 mb-5 white-bg" style="padding:2%;">
            <h1>Registration Form</h1>
            <div class="container">
              <h4 class="text-mustard">PERSONAL DETAILS</h4>
              <div class="row">
                <div class="col-12">
                  <div class="row">

                    <div class="col-sm-6">
                      <div class="form-group">
                        <input v-model="first_name" type="text" class="form-control nv-input-custom"  id="first_name" placeholder="First Name">
                      </div>
                      <div class="form-group">
                        <input v-on:blur="validateUsername" v-model="username" type="text" class="form-control nv-input-custom" id="username" placeholder="Username">
                        <small style="color:red;" id="err_username"></small>
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
                        <input v-model="address" type="text" class="form-control nv-input-custom" id="address" placeholder="Address">
                      </div>
                      <div class="form-group">
                        <input v-model="contact" onkeypress="return isNumber(event)" type="text" class="form-control nv-input-custom" id="contact_no" placeholder="Contact No.">
                      </div>
                      <div class="row">
                        <div class="col-sm-3">
                            <a v-on:click="generateCode" id="nv-btn-sms-code" class="badge badge-dark text-white"  style="font-size: 1em;cursor:pointer;margin:1%;">Get SMS verificaion code</a>
                        </div>
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-7">
                          <div class="form-group">
                            <input style="display:none;" v-model="code" onkeypress="return isNumber(event)" type="text" class="form-control nv-input-custom" id="code" placeholder="Enter verification code ">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-3">
                            <a v-on:click="generateEmailCode" id="nv-btn-email-code" class="badge badge-dark text-white"  style="font-size: 1em;cursor:pointer;margin:1%;">Get email verificaion code</a>
                        </div>
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-7">
                          <div class="form-group">
                            <input style="display:none;" v-model="email_code" onkeypress="return isNumber(event)" type="text" class="form-control nv-input-custom" id="code_email" placeholder="Enter email verification code ">
                          </div>
                        </div>
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
                    <div class="g-recaptcha" data-sitekey="{{$captcha}}"  data-callback="correctCaptcha"></div>
                  </div>
                  <div class="col-sm-6">
                      <button v-on:click="register" style="float:right" type="button" class="btn nv-btn-txt-white" name="button">REGISTER</button>
                  </div>
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
    <script src='https://www.google.com/recaptcha/api.js'></script>
<script src="{{ asset('front/js/register.js') }}" ></script>
</div>
@endsection
