@extends('front.layout.main')

@section('content')
<title>New Version - Login</title>
<div class="container">

    <div class="d-flex justify-content-center" >
      <div class="container "  style="padding:5%;">
        <div class="row"  id="nv-login">
          <div  class="nv-container-left col-sm-5 container shadow-lg p-3 mb-5 nv-bg-dark" style="padding:2%;">
              @include('front.user.details')
              <br>
              <div class="d-flex justify-content-center">
                <a href="/register" class="btn nv-btn-mustard" name="button">Have an Account</a>
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
                  <h1>Log In</h1>
              </div>

               <div class="">
                 <div class="nv-line-divider d-flex justify-content-center" ></div>
                 <div class=" d-flex justify-content-center">
                   <div class="nv-mustard-divider" style="width:50px; margin-top:-3.5px;"></div>
                 </div>
               </div>
               <br>

              <div class="d-flex justify-content-center " style="margin-top:20px;">
                <nv-component-login></nv-component-login>
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
