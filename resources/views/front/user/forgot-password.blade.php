@extends('front.layout.main')
@section('content')

<div class="container">

    <title>New Version Shop - Forgot Password</title>
    <div class="d-flex justify-content-center" >
      <div class="container "  style="padding:5%;">
        <div class="row ">
          <div  class="nv-container-left col-sm-5 container shadow-lg p-3 mb-5 nv-bg-dark" style="padding:2%;">
              @include('front.user.details')
              <br>
              <!-- <div class="d-flex justify-content-center">
                <img style="float:right;" width="150px" src="{{ asset('images/logo_transpa.png') }}" />
              </div> -->
          </div>
          <div class="nv-container-right col-sm-7 shadow-lg p-3 mb-5 white-bg" id="nv-forgot"  style="padding:2%;">
              <br>
              <div class="d-flex justify-content-center">
                <div class="nv-dot-dark"  ></div>
                <div class="nv-dot-mustard" style="margin-left:-25px;" ></div>
              </div>

              <div class="d-flex justify-content-center ">
                  <h1>Forgot Password</h1>

              </div>

               <div class="">
                 <div class="nv-line-divider d-flex justify-content-center" ><p>To reset your password please enter your contact number below.</p></div>
                 <div class=" d-flex justify-content-center">
                   <div class="nv-mustard-divider" style="width:50px; margin-top:-3.5px;"></div>
                 </div>
               </div>
               <br>

              <div class="d-flex justify-content-center " style="margin-top:20px;">
              <div class="container " style="width:70%;">
                <nv-component-forgot></nv-component-forgot>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
    <script src="{{ asset('front/js/forgot.js') }}" ></script>
@endsection
