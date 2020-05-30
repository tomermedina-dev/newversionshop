@extends('front.layout.main')
@section('content')

<div class="container">

    <title>New Version Shop - Forgot Password</title>
    <div class="d-flex justify-content-center row" >
      <div class="container mt-5 col-sm-12 col-lg-6"  >
        <div class=" shadow-lg p-3 mb-5 white-bg " id="nv-forgot"  >
            <br>
            <div class="d-flex justify-content-center">
              <div class="nv-dot-dark"  ></div>
              <div class="nv-dot-mustard" style="margin-left:-25px;" ></div>
            </div>

            <div class="d-flex justify-content-center ">
                <h1>Forgot Password</h1>

            </div>

             <div class="">
               <div class="nv-line-divider d-flex justify-content-center" ></div>
               <div class=" d-flex justify-content-center">
                 <div class="nv-mustard-divider" style="width:50px; margin-top:-3.5px;"></div>
               </div>
             </div>
             <br>

            <div class="d-flex justify-content-center " style="margin-top:20px;">
              <div class="container " style="width:70%;">
                <div class="form-group">
                  <label for="">New Password</label>
                  <div class="input-group-prepend">
                     <input  autocomplete="off"   v-model="newPassword" type="password" class="left form-control nv-input-custom" id="password"  placeholder="Enter New Password">
                   </div>
                </div>
                <div class="form-group">
                  <label for="">Confirm New Password</label>
                  <div class="input-group-prepend">
                     <input autocomplete="off"  v-model="newconfirmPassword" type="password" class="left form-control nv-input-custom"  id="confirm_password" placeholder="Re-enter Password">
                   </div>
                </div>
                <div class="custom-control custom-checkbox ">
                     <input v-on:click="showPassword" type="checkbox" class="custom-control-input" id="customCheck1">
                   <label class="custom-control-label" for="customCheck1">Show Password</label>
                </div>
                <div class="form-group mt-3">
                  <p>To reset your password please enter the validation code.</p>
                  <div class="input-group-prepend">
                     <input v-model="validationCode" type="text" class="left form-control nv-input-custom"   placeholder="Enter code">
                   </div>
                </div>
                <button  v-on:click="submitReset" type="button" class="btn nv-btn-txt-white btn-submit-forgot w-100"  name="button">Submit</button>
              </div>
            </div>
        </div>
      </div>
    </div>

  </div>
    <script src="{{ asset('front/js/forgot.js') }}" ></script>
@endsection
