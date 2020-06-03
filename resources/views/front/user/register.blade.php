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
  .nv-page{
    height: 586px;
  }
  .nv-sms-code , .nv-email-code , .nv-confirm  {
    display: none;
  }
  #nv-btn-signup{
    display: none;
  }
</style>
<title>New Version - Register</title>
  <div class="d-flex justify-content-center" id="nv-register">
      <div class="container " style="padding:5%;">
        <div class="row ">
          <div class="nv-container-left  container col-sm-5 shadow-lg p-3 mb-5 nv-bg-dark" style="padding:2%;">
              <div style="margin-top: 25%;">
                @include('front.user.details')
              </div>
              <br>
            <div class="d-flex justify-content-center">
              <a href="/login" class="btn nv-btn-mustard w-50" name="button">Log In</a>
            </div>
          </div>
          <div class="nv-container-right col-sm-7 shadow-lg p-3 mb-5 white-bg" style="padding:2%;">
            <div class="container">

              <!-- <h4 class="text-mustard">PERSONAL DETAILS</h4> -->
              <div class="nv-page page-1">
                <h1>Registration Form</h1>
                <div class="row ">
                  <div class="col-12">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <input v-model="first_name" type="text" class="form-control nv-input-custom"  id="first_name" placeholder="First Name">
                        </div>
                        <div class="form-group">
                          <input v-model="last_name" type="text" class="form-control nv-input-custom" id="last_name" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                          <input v-on:blur="validateUsername" v-model="username" type="text" class="form-control nv-input-custom" id="username" placeholder="Username">
                          <small style="color:red;" id="err_username"></small>
                        </div>
                        <div class="form-group">
                          <input v-on:blur="validateEmail" v-model="email" type="text" class="form-control nv-input-custom" id="email" placeholder="Email Address">
                          <small style="color:red;" id="err_email"></small>
                        </div>
                        <div class="form-group">
                          <input v-model="confirm_email" type="text" class="form-control nv-input-custom" id="confirm_email" placeholder="Confirm Email Address">
                        </div>
                      </div>
                      <div class="col-sm-12 ">
                        <div class="form-group">
                          <input v-model="contact" onkeypress="return isNumber(event)" type="text" class="form-control nv-input-custom" id="contact_no" placeholder="Contact No.">
                        </div>
                        <div class="form-group">
                          <input autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" v-on:blur="validatePassword" v-model="password" type="password" class="form-control nv-input-custom" id="password" placeholder="Password">
                          <small style="color:red;" id="err_pass"></small>
                        </div>
                        <div class="form-group">
                          <input autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" v-model="confirm_password" type="password" class="form-control nv-input-custom" id="confirm_password" placeholder="Confirm Password">
                        </div>
                        <div class="custom-control custom-checkbox ">
                            <input v-on:click="showPassword" type="checkbox" class="custom-control-input" id="customCheck1">
                           <label class="custom-control-label" for="customCheck1">Show Password</label>
                        </div>
                        <div class="form-group" style="display:none;">
                          <input v-model="address" type="text" class="form-control nv-input-custom" id="address" placeholder="Address">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div style="position:absolute;bottom:15px;">
                    <a style="width:200px !important;font-size:1.2em;" v-on:click="next" class="btn nv-btn-txt-white btn-sm text-white "  >
                      Next
                    </a>
                </div>
              </div>

              <div class="nv-page page-2" style="display:none;">
                <h1>Registration Form</h1>
                <h4 class="font-weight-bold">Unit Details (Optional)</h4>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Manufacturer</label>
                      <input  v-model="carBrand" type="text" class="form-control nv-input-custom"   placeholder="Manufacturer">
                    </div>
                    <div class="form-group">
                      <label>Model</label>
                      <input  v-model="carModel" type="text" class="form-control nv-input-custom"   placeholder="Manufacturer">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>VIN</label>
                      <input  v-model="carVin" type="text" class="form-control nv-input-custom"   placeholder="Manufacturer">
                    </div>
                    <div class="form-group">
                      <label>Plate number</label>
                      <input  v-model="carPlate" type="text" class="form-control nv-input-custom"   placeholder="Manufacturer">
                    </div>
                  </div>
                </div>


                <h4 class="font-weight-bold">Validate Registration</h4>
                <div class="row mt-1" id="nv-verify">
                  <h4>Verify using </h4>
                  <a v-on:click="generateCode" id="nv-btn-sms-code" class="ml-3 badge badge-dark text-white"  style="font-size: 1em;cursor:pointer;margin:1%;">SMS verificaion code</a>
                  <h4 class="ml-3">Or</h4>
                  <a v-on:click="generateEmailCode" id="nv-btn-email-code" class=" ml-3 badge badge-dark text-white"  style="font-size: 1em;cursor:pointer;margin:1%;">Email verificaion code</a>
                </div>

                  <!--live : 6LeucJ0UAAAAABwS_ucAQsf4i2YqEYWhXr4pFVBg-->
                  <!--Local : 6LdF3JoUAAAAAEPm-cs3kzNgfzSdrg5Cfu4MQVpK-->

                  <div class="form-group nv-sms-code">
                    <a v-on:click="generateCode" id="nv-btn-sms-code" class="mb-3 badge badge-dark text-white"  style="font-size: 1em;cursor:pointer;">Re-send SMS verificaion code</a>
                    <input v-model="code" onkeypress="return isNumber(event)" type="text" class="form-control nv-input-custom" id="code" placeholder="Enter SMS verification code ">
                  </div>
                  <div class="form-group nv-email-code">
                    <a v-on:click="generateEmailCode" id="nv-btn-email-code" class="mb-3 badge badge-dark text-white"  style="font-size: 1em;cursor:pointer;">Re-send Email verificaion code</a>
                    <input  v-model="email_code" onkeypress="return isNumber(event)" type="text" class="form-control nv-input-custom" id="code_email" placeholder="Enter email verification code ">
                  </div>
                  <div class="mt-3 nv-confirm">
                    <div class="custom-control custom-checkbox float-left">
                      <input  v-model="terms" type="checkbox" class="custom-control-input" id="t_c_flag">
                      <label class="custom-control-label" for="t_c_flag">  I agree to the <a href=""> Terms and Condition</a></label>
                    </div>
                    <div class="float-left">
                      <input type="text" class="hidden_recaptcha required" name="hidden_recaptcha" id="hidden_recaptcha" required>
                      <div class="g-recaptcha" data-sitekey="{{$captcha}}"  data-callback="correctCaptcha" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;float:left !important;"></div>
                    </div>
                  </div>

                <div style="position:absolute;bottom:15px;align-content:center">
                    <a style="width:200px !important;font-size:1.2em;" v-on:click="previous" class="btn nv-btn-txt-white btn-sm text-white "   >Previous</a>
                    <a style="width:200px !important;font-size:1.2em;" v-on:click="register" class="btn nv-btn-mustard btn-sm text-white" id="nv-btn-signup">Sign up</a>
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
